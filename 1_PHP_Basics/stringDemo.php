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


    //HEREDOC Syntax, serve per scivere grandi quantità di testo anche multilinea senza concatenare le stringhe
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

    //NOWDOC Syntax, serve per scivere grandi quantità di testo anche multilinea senza concatenare le stringhe
    //segue le regole dell'uso degli apici singoli, ovvero le sequenze di escape e le variabili non vengono valutate
    //la parola chiave dopo i tre segni del minore la scegliamo noi e deve essere racchiusa da singoli apici, quella
    //di chiusura si deve trovare su una nuova linea
    echo 'NOWDOC<br>';

    $nomeStazione = "Roma Termini";

    echo <<<'TESTO'
    <p>Rome's central train station, known as $nomeStazione</p>
    TESTO;
?>