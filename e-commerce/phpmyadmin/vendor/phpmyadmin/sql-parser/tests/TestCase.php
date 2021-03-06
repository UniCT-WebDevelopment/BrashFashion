<?php
/**
 * Bootstrap for tests.
 */
declare(strict_types=1);

namespace PhpMyAdmin\SqlParser\Tests;

use PhpMyAdmin\SqlParser\Exceptions\LexerException;
use PhpMyAdmin\SqlParser\Exceptions\ParserException;
use PhpMyAdmin\SqlParser\Lexer;
use PhpMyAdmin\SqlParser\Parser;
use PhpMyAdmin\SqlParser\TokensList;
use PhpMyAdmin\SqlParser\Context;
use PHPUnit\Framework\TestCase as BaseTestCase;
use function file_get_contents;
use function unserialize;

$GLOBALS['lang'] = 'en';

/**
 * Implements useful methods for testing.
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * Gets the token list generated by lexing this query.
     *
     * @param string $query the query to be lexed
     *
     * @return TokensList
     */
    public function getTokensList($query)
    {
        $lexer = new Lexer($query);

        return $lexer->list;
    }

    /**
     * Gets the errors as an array.
     *
     * @param Lexer|Parser $obj object containing the errors
     *
     * @return array
     */
    public function getErrorsAsArray($obj)
    {
        $ret = [];
        /** @var LexerException|ParserException $err */
        foreach ($obj->errors as $err) {
            $ret[] = $obj instanceof Lexer
                ? [
                    $err->getMessage(),
                    $err->ch,
                    $err->pos,
                    $err->getCode(),
                ]
                : [
                    $err->getMessage(),
                    $err->token,
                    $err->getCode(),
                ];
        }

        return $ret;
    }

    /**
     * Gets test's input and expected output.
     *
     * @param string $name the name of the test
     *
     * @return array
     */
    public function getData($name)
    {
        /*
         * The unrestricted unserialize() is needed here as we do have
         * serialized objects in the tests. There should be no security risk as
         * the test data comes with the repository.
         */
        $data = unserialize(file_get_contents('tests/data/' . $name . '.out'));
        $data['query'] = file_get_contents('tests/data/' . $name . '.in');

        return $data;
    }

    /**
     * Runs a test.
     *
     * @param string $name the name of the test
     */
    public function runParserTest($name)
    {
        /**
         * Test's data.
         *
         * @var array
         */
        $data = $this->getData($name);

        if (strpos($name, '/ansi/') !== false) {
            // set mode if appropriate
            Context::setMode('ANSI_QUOTES');
        }

        // Lexer.
        $lexer = new Lexer($data['query']);
        $lexerErrors = $this->getErrorsAsArray($lexer);
        $lexer->errors = [];

        // Parser.
        $parser = empty($data['parser']) ? null : new Parser($lexer->list);
        $parserErrors = [];
        if ($parser !== null) {
            $parserErrors = $this->getErrorsAsArray($parser);
            $parser->errors = [];
        }

        // Testing objects.
        $this->assertEquals($data['lexer'], $lexer);
        $this->assertEquals($data['parser'], $parser);

        // Testing errors.
        $this->assertEquals($data['errors']['parser'], $parserErrors);
        $this->assertEquals($data['errors']['lexer'], $lexerErrors);

        // reset mode after test run
        Context::setMode();
    }
}
