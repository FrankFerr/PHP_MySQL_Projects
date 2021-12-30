<?php
    echo '<body style="font-family:Verdana">';

    setlocale(LC_ALL, 'ita');

    $value = 10 ** 2;
    $value2 = pow(10, 2);

    echo "\$value = $value<br>\$value2 = $value2<br>";
    echo "5 elevato a 3 = ".pow(5, 3)."<br>";

    echo "data: ".date("l d/m/Y G:i")."<br>".strftime("%A %d %B %Y", time())."<br>"; // formato data --> Monday 27/09/2021 11:57

    echo "strupper(\"Hello World\"): " . strtoupper("Hello World") . "<br>";
  
    echo "<br><br>";

    /*
     *  USER DEFINED FUNCTION
     */

    $today = displayDate();

    echo "today date: $today<br>";

    function displayDate()
    {
        return date("l d/m/Y G:i");
    }

    echo "<br><br>";

    /*
     *  RETURNING MULTIPLE VALUE WITH list()
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
     *  PASSING ARGUMENT (by value & by ref)
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

    
    //by reference

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
     *  MORE DEFAULT ARGUMENT
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
?>