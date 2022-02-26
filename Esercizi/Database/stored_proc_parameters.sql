/*
    CI SONO TRE TIPI DI PARAMETRI IN SQL:
  
    - IN -> parametro in input che verrà sostituito ad un placeholder nella query
    - OUT -> variabile in output che conterrà il valore restituito dalla query
    - INOUT -> si comporta sia come IN che come OUT

*/

/* <------------------------ IN e OUT PARAMETER ------------------------------>*/

DELIMITER //

/*
i parametri vengono scritti tra parentesi nell'istruzione 'CREATE PROCEDURE' con
quest'ordine -> (tipo_parametro nome_parametro tipo_valore, ...)
*/
CREATE PROCEDURE ParamINeOUT(IN nome_var VARCHAR(20), OUT count_var INT)

/* con 'COUNT(*) INTO count_var' memorizziamo il valore del conteggio in count_var
*/
SELECT COUNT(*) INTO count_var FROM User WHERE nome LIKE nome_var; //

DELIMITER ;

/* per richiamare la funzione si usa sempre CALL, in questo caso con 'F%' voglio 
cercare tutti i nomi (perchè dopo WHERE ho scelto la colonna 'nome') che iniziano
per F e il conteggio me lo memorizzerà nella variabile 'nome_count'*/
CALL ParamINeOUT('F%', nome_count);

/* per stampare il valore della variabile si usa 'SELECT @nome_variabile'*/
SELECT @nome_count;



/* <------------------------ INOUT PARAMETER ------------------------------>*/

/* con 'SET nome_variabile = valore;' si istanzia una nuova variabile (serve solo 
per l'esempio non è indispensabile) */
SET @num = 10;

DELIMITER //

CREATE PROCEDURE ParamINeOUT(INOUT parameter INT)
    SET parameter = parameter + 10; //

DELIMITER ;


/* per chiamare una funzione con una variabile già esistente si usa la '@'*/
CALL ParamINOUT(@num);

SELECT @num;