(function(){
    var $searchProduct = $('.searchProduct');
    var $deleteAllButton = $('.delete');
    var $possibilityToRemove = $('.removeOrder');

    /* update current basket */
    $('.card').on("click", function(){
        var $name = $(this).find(".name-pr").text();
        var $price = $(this).find(".price-pr").text();

        var $quantity = $(this).find(".quantity-pr").text();

        if($quantity != "FINISHED"){  //BUG at first click on finished quantity card 
            $quantity = parseInt($quantity);

            let $currentBasket = $('.ordersTable');
    
            if($quantity != 0){
                $currentBasket.append(`<tr> 
                                        <td style='color:grey;'>${$name}</td> 
                                        <td style='color:grey;'>1</td> 
                                        <td style='color:grey;'>${$price}€</td> 
                                    </tr>`);
    
                /* insert input fields */
                $('.counted').append(`<input type='hidden' class='product' name='product[]' value='${$(this).find(".name-pr").attr("data")}'/>`);
                
                if($quantity-1 != 0)
                    $(this).find(".quantity-pr").html($quantity-1);
                else {
                    $(this).find(".quantity-pr").html("FINISHED");
                    $(this).find(".quantity-pr").attr("style", "color:red;");
                }
            }
        }

    });

    /* filtered search by product name, this is an element that stay into searchBar */
    function filteredText($actualText){
        var $linesName = $('.name-pr');

        $linesName.each(function(){
            var found = 'false';
            
            $(this).each(function(){
               if($(this).text().toLowerCase().indexOf($actualText.toLowerCase()) >= 0)
                found = 'true'; 
            });

            if(found == 'true')
                $(this).closest('.card').show();
            else
                $(this).closest('.card').hide();
        })
    }

    $searchProduct.on('keyup', function() {
        var $actualText = $(this).val().toLowerCase();
        filteredText($actualText);
    });

    /* throw all way */
    $deleteAllButton.on('click', function(){
        let $currentBasket = $('.ordersTable');
        $currentBasket.remove();

        let $currentBasketForm = $('.counted').children('.product');
        $currentBasketForm.remove();

        $('.counted').before(" <table class='ordersTable'> <tr> <td>Name</td> <td>Quantity</td> <td>Price</td> </tr> </table> ");

        //refresh into value attribute of quantity-pr!!! and next update on database next PAYMENT
        $('.quantity-pr').each(function(){
            $(this).html($(this).attr("name"));
            if( $(this).attr("name") != "FINISHED" )
                $(this).removeAttr("style");
         });
    });

    /* remove single order */
    $possibilityToRemove.on("click", function(){
        $.ajax({
            url: '/users/removeOrder/{order}',
            type: 'GET',
            data: {
                'cod_order': $(this).attr('name')
            },
            success: function(){
                location.reload();
                console.log("success remove order");
            },
            error: function(){
                console.log("error remove order");
            }
        });
    });

})();