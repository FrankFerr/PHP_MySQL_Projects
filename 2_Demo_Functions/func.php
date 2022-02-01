<?php
    echo '<body style="font-family:Verdana">';

    //usando setlocale si può settare il linguaggio del sistema. Ad esempio 
    //decide in che lingua visualizzare i giorni della settimana
    setlocale(LC_ALL, 'ita');

    $value = 10 ** 2;
    $value2 = pow(10, 2);

    echo "\$value = $value<br>\$value2 = $value2<br>";
    echo "5 elevato a 3 = ".pow(5, 3)."<br><br>";

    echo "date('l d/m/Y G:i'): ".date("l d/m/Y G:i")."<br>";
    echo 'strftime("%A %d %B %Y", time()): '.strftime("%A %d %B %Y", time())."<br><br>"; // formato data --> Monday 27/09/2021 11:57

    echo "strupper(\"Hello World\"): " . strtoupper("Hello World") . "<br>";
  
    echo "<br><br>";

    /*
     *  USER DEFINED FUNCTION ------------------------------------>
     */

    $today = displayDate();

    echo "today date: $today<br>";

    function displayDate()
    {
        return date("l d/m/Y G:i");
    }

    echo "<br><br>";

    /*
     *  RETURNING MULTIPLE VALUE WITH list() ---------------------------------->
     */

    function retrieveData()
    {
        $user[] = "Jason Gilmore";
        $user[] = "jason@example.com";
        $user[] = "English";

        return $user;
    }

    list($name, $email, $language) = retrieveData();

    echo "Jason's info<br>name: $name<br>email: $email<br>language: $language<br>";

    echo "<br><br>";


    /*
     *  PASSING ARGUMENT (by value & by ref) ------------------------------------->
     */

    //by value

    define("TAX", 22);

    function calculateSalesTax($price, $tax = 22.0) // --> default argument
    {
        return $price + ($tax / 100 * $price);
    }

    $price = 10;
    $total = calculateSalesTax($price, TAX);
    echo "Total of $price with TAX: ", $total, "<br>";

    
    //by reference ------------------------------------------------->

    function refCalculateSalesTax(&$price, &$tax = 22.0)
    {
        $total = $price + ($tax / 100 * $price);
        $price = 0;
        return $total;
    }

    $price2 = 22.50;
    $tax2 = 18;
    $total2 = refCalculateSalesTax($price2, $tax2);

    echo "Total of $price2 with TAX: ", $total2, "<br>";

    echo "<br><br>";


    /*
     *  MORE DEFAULT ARGUMENT -------------------------------------------->
     */

    function totalPrice($price1, $price2 = 0, $price3 = 0)
    {
        echo "\$price1 = $price1 |\$price2 $price2 |\$price3 $price3<br>";
        return $price1 + $price2 + $price3;
    }

    echo "Total of two products is ".totalPrice(10, 4)."<br>";
    echo "<br><br>";


    /*
     *                          da PHP 5 --> objects, interfaces, callable o arrays
     *  TYPE DECLARATIONS
     *                          da PHP 7 --> anche i tipi scalari (numeri e stringhe)
     */

    function calculateSalesTaxTyped(float $price3, float $tax = 22) : float
    {
        $total = $price3 + ($tax / 100 * $price3);
        return $total;
    }

    $product = 22.0;
    $tot = calculateSalesTaxTyped($product);

    echo "Total of product with tax: $tot<br>";

    echo '<br><br>';

    //--------------------------------------------------------------------------->

    //Esempio con più argomenti (PRE PHP 5.6)
    //in php 5.6 e precedenti per gestire funzioni con argomenti variabili
    //si lasciano le parentesi vuote e si utilizzano alcune funzioni specifiche
    function somma56()
    {
        echo 'argomenti variabili in php 5.6<br>';

        //func_num_args() mi restituisce il numero di argomenti passato
        echo 'sono stati passati '.func_num_args().' argomenti alla funzione<br>';

        //considerando la lista di argomenti passati come un array, grazie a 
        //func_get_arg($pos) si può accedere all'argomento nella posizione richiesta
        echo 'elementi 2 e 4: '.func_get_arg(1).' | '.func_get_arg(3).'<br>';

        //considerando la lista di argomenti passati come un array, grazie a 
        //func_get_args() possiamo ottenere quell'array
        $arr = func_get_args();
        echo 'primo elemento dell\'array di argomenti: '.$arr[0].'<br><br>';

        return ;
    }


    //Esempio con più argomenti (POST PHP 5.6)
    //da php 7 è possibile usare una sintassi più semplice -> ...$argomenti (il
    //nome della variabile è a scelta dell'utente)
    function somma7(...$argomenti)
    {
        echo 'argomenti variabili in php 7<br>';

        echo 'sono stati passati '.count($argomenti).' argomenti alla funzione<br>';
        echo 'elementi 2 e 4: '.$argomenti[1].' | '.$argomenti[3].'<br>';
    }

    //------------------------------------------------------------------------->

    echo somma56(12, 3.5, 5, 8).'<br>';
    echo somma7(12, 3.5, 5, 8).'<br>';

?>