<?php
    //utilizzando i singoli apici il testo viene stampato così com'è senza valutare variabili e\o sequenze di escape
    echo '<body style="font-family:Verdana">';
    // echo "<body style=\"font-family: Verdana;\">";

    $num1 = "10";
    $num2 = "20";

    echo "<h2>Test Stringhe</h2>";

    echo '$num1 = "10";<br>$num2 = "20";<br><br>';
    echo "\$num1 + \$num2 = " . $num1 + $num2 ."<br>";
    echo "\$num1 . \$num2 = " . $num1 . $num2 ."<br>";

    echo "<br><hr><br>";


    //HEREDOC Syntax ------------------------------------------------------------->

    //serve per scivere grandi quantità di testo anche multilinea senza concatenare le stringhe
    //segue le regole dell'uso dei doppi apici, ovvero le sequenze di escape e levariabili vengono valutate
    //la parola chiave dopo i tre segni del minore la scegliamo noi e quella di chiusura si deve trovare su
    //una nuova linea

    echo 'HEREDOC<br>';

    $website = "https://www.rfi.it/it/stazioni/roma-termini.html";

    $romaTermini = <<<TESTO
    <p>Rome's central train station, known as <a href = "$website">Roma
    Termini</a>, was built in 1867. Because it had fallen into severe
    disrepair in the late 20th century, the government knew that considerable
    resources were required to rehabilitate the station prior to the 50-year
    <i>Giubileo</i>.</p>
    TESTO;

    echo $romaTermini;

    echo '<br><br>';

    //NOWDOC Syntax --------------------------------------------------------------------->

    //serve per scivere grandi quantità di testo anche multilinea senza concatenare le stringhe
    //segue le regole dell'uso degli apici singoli, ovvero le sequenze di escape e le variabili non vengono valutate
    //la parola chiave dopo i tre segni del minore la scegliamo noi e deve essere racchiusa da singoli apici, quella
    //di chiusura si deve trovare su una nuova linea
    echo 'NOWDOC<br>';

    $nomeStazione = "Roma Termini";

    echo <<<'TESTO'
    <p>Rome's central train station, known as $nomeStazione</p>
    TESTO;

    echo "<br>";


    //LUNGHEZZA STRINGHE ---------------------------------------------------------->
    $str = "abc";
    $str2 = "aòc";

    //Quando utilizziamo le parentesi quadre per accedere ai caratteri di una stringa in realtà
    //stiamo accedendo ai sui bytes, infatti in str2 la 'c' la troviamo all'indice numero 3 perchè
    //il carattere 'ò' occupa 2 bytes e non 1 come i caratteri normali

    echo "str[0]: $str[0], str[1]: $str[1], str[2]: $str[2]<br>";
    echo "strlen(\$str): ".strlen($str)."<br>"; // -> 3
    echo "mb_strlen(\$str): ".mb_strlen($str)."<br><br>"; // -> 3

    echo "str2[0]: $str2[0], str2[1]: $str2[1], str2[2]: $str2[2], str2[3]: $str2[3]<br>";

    //la funzione strlen() ci restituisce la grandezza di una stringa in bytes, ecco perchè ci restituisce 4 (1 byte per 'a', 2 bytes per 'ò', 1 bytes per 'c')
    echo "strlen(\$str2): ".strlen($str2)."<br>"; // -> 4

    //mentre con la funzione mb_strlen() ci verrà restituito il numero dei caratteri, quindi 3
    echo "mb_strlen(\$str2): ".mb_strlen($str2)."<br>"; // -> 3


    echo "<br>";
    

    //CONVERTIRE GLI '\n' IN '<br>' ----------------------------------------------->
    $str3 = "Riga di esempio separata\nin due linee dal newline";
    
    echo "\$str3: $str3<br>";

    //la funzione nl2br() converte i '\n' in '<br>' nella stringa passata come parametro
    echo nl2br($str3);
?>