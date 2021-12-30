<?php
    echo '<body style="font-family:Verdana">';

    $numArr[] = 10;
    $numArr[] = 20;
    $numArr[] = 30;

    echo <<<TEXT
    \$numArr[] = 10;<br>
    \$numArr[] = 20;<br>
    \$numArr[] = 30;<br><br>
    \$numArr[1]: $numArr[1];<br><br>
    TEXT;

    //---------------------------------------

    $city['MI'] = "Milano";
    $city['RM'] = "Roma";
    $city['NA'] = "Napoli";
    // $city[] = 'BO' => 'Bologna'; --> Errore

    echo <<<TEXT
    \$city['MI'] = "Milano";<br>
    \$city['RM'] = "Roma";<br>
    \$city['NA'] = "Napoli";<br><br>

    \$city['MI']: $city[RM];<br><br>
    TEXT;

    //------------------------------------------

    function personInfo()
    {
        return ["Francesco Ferrante", "ferrante@gmail.com", "19/06/1997"];
    }

    echo "personInfo()[1]: ".personInfo()[1]."<br><br>";
    
    //------------------------------------------------

    $states = ["Florida"];

    echo '$states = ["Florida"];<br>is_array($states): ';
    is_array($states) ? print "TRUE" : print "FALSE"
?>