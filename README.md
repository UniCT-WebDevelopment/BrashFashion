# Brash Fashion
E' un sito di e-commerce adibito alla moda, si utilizza principalmente il framework Laravel, nel quale tramite l'aggiunta di altri framework come bootstrap, jquery e js permette agli utenti di visionare ed effettuare gli acquisti nel carrello di particolari articoli di abbigliamento. 
Si può dunque filtrare, cercare particolari articoli tramite la barra di ricerca presente nella sezione articoli. Lo staff si occupa di gestire lo stato dell'ordine, inserire articoli e visionarli dopo l'inserimento. L'utente dopo aver effettuato l'iscrizione al sito ha possibilità di: visionare e filtrare gli articoli disponibili nel sito, ottenere la ricevuta dell'acquisto quando l'ordine è stato approvato o eliminare l'acquisto se l'ordine non è stato approvato.

# Come effettuare il deployment
Per poter utilizzare il sito occorre avere nella macchina locale un web server ad esempio Apache, nel quale viene hostato il sito che vogliamo utilizzare. Il DBMS utilizzato è MySql, nel file "env.php" (presente all'interno di ogni progetto Laravel) si inserisce il nome del database con il quale il sito s'interfaccerà, occorre infatti creare un database con lo stesso nome che si inserisce nel file nominato precedentemente. In questo passaggio tramite

```
php artisan migrate
``` 

si installeranno automaticamente le tabelle che servono per l'interazione con il sito.

# Struttura sito e-commerce
La gestione del sito web avviene tramite le componenti offerte da Laravel sulla base del design pattern MVC.

## Controller
Sono presenti attualmente nel progetto 5 controllers, essi si trovano all'interno di App/Http/Controllers. Essi sono:

- **MainsController**: si occupa della gestione iniziale di accesso al sito e di uscita dal sito.
- **OrdersController**: si occupa del salvataggio dell'ordine del cliente dopo che quest'ultimo ha effettuato il pagamento.
- **ProductsController**: si occupa del salvataggio e della visualizzazione dei prodotti presenti all'interno del sito.
- **StaffsController**: si occupa della gestione dello stato degli ordini e della visualizzazione della pagina amministratore (staff).
- **UsersController**: si occupa della gestione della visualizzazione della pagina utente, della visualizzazione della ricevuta dell'ordine approvato e dell'annullamento dello stato dell'ordine se non è approvato.

## Model
All'interno della cartella App di Laravel sono presenti 6 Model che permettono la gestione delle tabelle nel database:

- Main
- Order
- Order_detail
- Product
- Staff
- User

## Views
Le view presenti in Laravel vengono inseriti nel percorso "resources/views" e permettono la gestione delle pagine da visualizzare durante la navigazione nel sito. Sono presenti dunque:

- **resources/views/staff**: all'interno è presente una pagina che mostra la gestione possibile da parte di un membro dello staff
- **resources/views/staff**: all'interno è presente una pagina che mostra la gestione possibile da parte di un utente e la visualizzazione della ricevuta dell'ordine, se in stato di approvato
- **resources/views/**: all'interno è presente la pagina principale

# Licenza
Brash Fashio è un open-source, rilasciato sotto licenzia MIT.

# Brash Fashion - Contatti
Per qualsiasi chiarimento tecnico sul progetto, contattare all'email: jeremysapienza.98@gmail.com
 
