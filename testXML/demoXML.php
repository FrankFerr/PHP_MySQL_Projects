<?php
    echo '<head><style>body,pre{font-family:Verdana}</style></head>';

    $xml = simplexml_load_file("Letter.xml") or die("Errore nel caricamento del file xml");

    echo "<br>xml:<br><pre>".print_r($xml, true)."</pre>";

    echo "<br><br>letter<br><br>from: {$xml->from}<br>to: {$xml->to}<br>";

    echo "<br><hr><br>";

    $xml2 = simplexml_load_file("alunni.xml") or die('Errore nel caricamento del file xml');
    echo "<br>xml:<br><pre>".print_r($xml2, true)."</pre>";

    echo "<br>xml alunno 1:<br><pre>".print_r($xml2->scuola->alunno[1], true)."</pre>";
    echo "<br><br>insegnante 2<br>nome: {$xml2->scuola->insegnante[2]->nome}, età: {$xml2->scuola->insegnante[2]->eta}<br>";

    echo "<br>\$xml2->scuola->alunno type:".gettype($xml2->scuola->alunno)."<br>\$xml2->scuola->alunno class: ".get_class($xml2->scuola->alunno)."<br>";

?>