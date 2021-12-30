<?php
    echo '<head><style>body, pre{font-family:Verdana;}</style></head>';

    /*
    *   array_reverse() ritorna una copia dell'array passato come argomento ordinato al contrario
    *   settando il secondo parametro a true viene mantenuto il valore della chiave che aveva un
    *   determinato valore prima dell'ordinamento
    */

    $carBrands = ["Honda", "Cheverolet",  "Toyota", "Chrysler", "Ford"];

    echo "\$carBrands: <br><pre>".print_r($carBrands, true)."</pre><br>";
    echo "\$carBrands reverse: <br><pre>".print_r(array_reverse($carBrands), true)."</pre><br>";
    echo "\$carBrands reverse with preserved value of key: <br><pre>".print_r(array_reverse($carBrands, true), true)."</pre><br>";

    echo "<br><hr><br>";

    /*
    *   array_flip() restituisce la copia dell'array passato come argomento con la coppia key\value invertita
    */

    echo "\$carBrands: <br><pre>".print_r($carBrands, true)."</pre><br>";
    echo "\$carBrands flipped: <br><pre>".print_r(array_flip($carBrands), true)."</pre><br>";

    echo "<br><hr><br>";


    /*
    *   sort() e ksort() ordinano rispettivamente i valori e le chiavi dell'array passato come argomento e restituisce
    *   true in caso di successo, altrimenti false. L'ordinamento viene eseguito in base al flag passato come secondo
    *   argomento (di default SORT_REGULAR)
    *   
    *   flag:
    *   
    *   SORT_REGULAR --> ordina gli elementi (key/value) in base al loro valore ASCII
    *   SORT_NUMERIC --> ordina gli elementi (key/value) numericamente, utile con gli int e float
    *   SORT_STRING --> ordina gli elementi (key/value) in modo naturale (vedi natsort() più giù)
    *
    *   la funzione sort() non preserva una eventuale chiave associativa, in quel caso per preservarla esiste la funzoine asort()
    */

    $numArray = [rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50)];
    $strnum = ["cinque" => 5, "dieci" => 10, "sei" => 6, "due" => 2, "quattro" => 4];

    echo "\$carBrands: <br><pre>".print_r($carBrands, true)."</pre><br>";
    sort($carBrands);
    echo "\$carBrands sorted: <br><pre>".print_r($carBrands, true)."</pre><br>";

    echo "\$numArray: <br><pre>".print_r($numArray, true)."</pre><br>";
    sort($numArray, SORT_NUMERIC);
    echo "\$numArray sorted: <br><pre>".print_r($numArray, true)."</pre><br>";

    
    echo "\$strnum: <br><pre>".print_r($strnum, true)."</pre><br>";
    asort($strnum);
    echo "\$strnum sorted: <br><pre>".print_r($strnum, true)."</pre><br>";
    
    echo "<br><hr><br>";

    /*
    *   rsort()/krsort() e arsort() ordinano gli elementi come sort()/ksort() e asort() ma in ordine decrescente
    */

    $numArray = [rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50), rand(0, 50)];
    $numArray2 = $numArray;

    echo "\$numArray: <br><pre>".print_r($numArray, true)."</pre><br>";
    rsort($numArray, SORT_NUMERIC);
    echo "\$numArray reverse sorted: <br><pre>".print_r($numArray, true)."</pre><br>";

    arsort($numArray2, SORT_NUMERIC);
    echo "\$numArray2 reverse sorted with preserved key: <br><pre>".print_r($numArray2, true)."</pre><br>";

    echo "<br><hr><br>";

    /*
    *   natsort() ordina gli elementi in modo naturale, ad esempio una serie di immagini contenente nel nome
    *   un numero progressivo con la normale funzione sort() verrebbero ordinati in base alla precedenza dei
    *   caratteri ["picture1.jpg", "picture10.jpg", "picture2.jpg", "picture20.jpg"], mentre con natsort()
    *   verrebbero ordinate come farebbe chiunque ["picture1.jpg", "picture2.jpg", "picture10.jpg", "picture20.jpg"]
    *
    *   Per nomi di immagini con case diverso (vedi $image3) utilizzando natsort() avremmo dei problemi in quanto
    *   è case-sensitive, in questo caso si può usare natcasesort() in quanto è case-insensitive
    */

    $image = ["picture1.jpg", "picture20.jpg", "picture2.jpg", "picture10.jpg"];
    $image2 = $image;
    $image3 = ["picture1.jpg", "picture20.jpg", "picture2.JPG", "PICTURE10.jpg"];

    echo "image: ".print_r($image, true)."<br>";
    sort($image);
    natsort($image2);
    natcasesort($image3);
    echo "image sort():<br><pre>".print_r($image, true)."</pre><br>";
    echo "image2 natsort():<br><pre>".print_r($image2, true)."</pre><br>";
    echo "image3 natsort():<br><pre>".print_r($image3, true)."</pre><br>";

    echo "<br><hr><br>";

    /*
    *   usort() ordina i valori dell'array passato come argomento in base al criterio definito dall'utente nella
    *   funzione passata come secondo argomento. La funzione deve avere due parametri e ritornare -num, 0, +num 
    *   rispettivamente se il primo valore è minore, uguale o maggiore del secondo
    *
    *   Nell'esempio per ordinare le date avremmo dei problemi utilizzanto sort() o natsort() quindi conviene 
    *   creare una funzione noi
    */

    $dates = array('10-10-2011', '2-17-2010', '2-16-2011', '1-01-2013', '10-10-2012');

    echo "date prima di sort(): <br><pre>".print_r($dates, true)."</pre><br>";
    sort($dates);
    echo "date dopo di sort(): <br><pre>".print_r($dates, true)."</pre><br>";
    usort($dates, "dateComp");
    echo "date dopo di usort(): <br><pre>".print_r($dates, true)."</pre><br>";

    function dateComp($d1, $d2)
    {
        //se le due date sono uguali non fare niente
        if($d1 == $d2) return 0;

        //divido le datew in tre variabili diverse
        list($d1month, $d1day, $d1year) = explode('-', $d1);
        list($d2month, $d2day, $d2year) = explode('-', $d2);

        //mi assicuro che il giorno e il mese abbiano lo 0 davanti in caso servisse
        $d1day = str_pad($d1day, 2, "0", STR_PAD_LEFT);
        $d1month = str_pad($d1month, 2, "0", STR_PAD_LEFT);
        $d2day = str_pad($d2day, 2, "0", STR_PAD_LEFT);
        $d2month = str_pad($d2month, 2, "0", STR_PAD_LEFT);

        //le ricompongo in modo uguale
        $d1 = $d1year.$d1month.$d1day;
        $d2 = $d2year.$d2month.$d2day;

        // faccio una compareazione con l'operatore "spaceship"
        return ($d1 <=> $d2);
    }

?>