<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once "Employee.php";
    require_once "Programmer.php";

    $emp1 = new Employee("Francesco Ferrante");
    $emp2 = new Employee("123510");
    $emp3 = new Employee("Marco");

    echo "$emp1<br>$emp2<br>$emp3<br><br>";

    echo "<hr><br>";

    $prog1 = new Programmer("Ferrante Francesco", "PHP & MySql Dev.", 22000);

    echo $prog1;

    echo "<br><br>Employee total: ".Employee::getNumEmployee();

    echo "<br><hr><br>";


    //la keyword instanceof ci aiuta a determinare la classe di provenienza di un oggetto
    //utilizzo --> $oggetto instanceof NomeClasse, il nome della classe va messo senza virgolette
    //restituisce TRUE o FALSE
    echo "\$emp1 instanceof Employee: ".($emp1 instanceof Employee ? "Yes" : "Nope")."<br>";
    echo "\$prog1 instanceof Employee: ".($prog1 instanceof Employee ? "Yes" : "Nope")."<br><br>";

    switch(true)
    {
        case $emp1 instanceof Programmer:
            echo 'switch case instanceof Programmer<br>';
            break;

        case $emp1 instanceof Employee:
            echo 'switch case instanceof Employee<br>';
            break;
    
    }

?>