<?php
    echo '<body style="font-family:Verdana">';

    define('KM_TO_MILES', 0.6214);

    /*
     *  FOR LOOP
     */

    echo 'FOR loop<br><br>';

    for($kilometers = 1; $kilometers <= 5; $kilometers++){
        printf('%d kilometers are %.4f miles<br>', $kilometers, $kilometers * KM_TO_MILES);
    }

    echo '<br><hr><br>';

    /*
     *  FOREACH LOOP
     */

    echo 'FOREACH loop<br><br>';

    $links = array("www.apress.com","www.php.net","www.apache.org");

    echo 'Online resource<br>';
    foreach($links as $link){
        echo "$link<br>";
    }

    echo '<br><br>';

    echo 'FOREACH loop (key/value pair)<br><br>';

    $links = array( "The Apache Web Server" => "www.apache.org",
                    "Apress" => "www.apress.com",
                    "The PHP Scripting Language" => "www.php.net");


    echo "Online resource<br>";
    foreach($links as $title => $link){
        echo "<a href=\"http://$link\">$title</a><br>";
    }

    echo '<br><hr><br>';

  
    /*
     *  BREAK STATEMENT
     */
    echo 'BREAK Statement<br><br>';

    $primes = array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47);

    for($try = 1;; $try++)
    {

        $randomNum = rand(1, 50);
        
        if(in_array($randomNum, $primes))
        {
            printf("Numero primo: %d, tentativo: %d<br>", $randomNum, $try);
            break;
        }
        else
        {
            printf("%d non è un numero primo<br>", $randomNum);
        }
    }

?>