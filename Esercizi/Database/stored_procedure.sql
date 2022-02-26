/* Le stored procedure sono sono delle 'funzioni' richiamabili dal
database che eseguono istruzioni sql */


/*<-------------------------- MEMORIZZARE UNA SINGOLA ISTRUZIONE --------------------------> */

/* con DELIMITER posso cambiare il carattere terminatore in questo caso lo cambio
da ';' a '//' (la scelta di '//' è puramente casuale) */
DELIMITER //

/* con l'istruzione 'CREATE PROCEDURE nome_funzione()' diamo un nome alla funzione
e da qui possiamo scrivere l'istruzione da memorizzare */
CREATE PROCEDURE getall()

/* istruzione sql da memorizzare + terminatore alla fine */
SELECT * FROM table1; //

/*
è possibile scrivere tutto su un unica riga

'CREATE PROCEDURE getall() SELECT * FROM table1; //'
*/


/* come prima usiamo 'DELIMITER' per cambiare il terminatore dell'istruzione
in questo caso lo facciamo ritornare al ';' */
DELIMITER ;

/* usare 'CALL nome_funzione();' per richiamarla */
CALL getall();



/*<------------------------------ MEMORIZZARE PIU' ISTRUZIONI --------------------------------> */

DELIMITER //

CREATE PROCEDURE getall()

/* con 'BEGIN' delimitiamo l'inizio del blocco di istruzioni */
BEGIN

/* istruzioni sql da memorizzare senza il nuovo terminatore ('//') alla fine */
SELECT * FROM table1;
SELECT * FROM table2;
altre istruzioni...;

/* con 'END' delimitiamo il blocco di istruzioni, non bisogna dimenticarsi di inserire
il carattere terminatore */
END//

/*
è possibile scrivere tutto su un unica riga

'CREATE PROCEDURE getall() BEGIN SELECT * FROM table1; ... ... ... END//'

ma è consigliato l'approccio in esempio dato che è più ordinato
*/

DELIMITER ;

CALL getall();