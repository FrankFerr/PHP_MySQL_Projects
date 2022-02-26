<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once "class.php";

    //con la parola chiave 'new' si instanzia un oggetto chiamando il costruttore
    //di quella classe [__construct()]
    $frank = new Employee("Francesco Ferrante", "PHP Programmer");
    $frank->wage = 18500;

    echo "{$frank->sayHello()}<br>";
    printf("wage: %s€", number_format($frank->wage, 2, ",", "."));    

    $frank->city = "Naples";
    echo "<br>city: $frank->city";

    echo "<br>età: $frank->eta";

    echo "<br><br>";

    echo var_dump($frank)."<br><br>";

    
    $emp2 = new Employee("Antonio", "PHP Programmer");
    $emp2->wage = 18500;

    //QUANDO UN OGGETTO VIENE DISTRUTTO, VIENE RICHIAMATO IL METODO __desctruct(), SE E' STATO DEFINITO
    //un oggetto normalmente viene distrutto, non alla fine dello script ma,
    //alla fine del caricamento della pagina infatti l'oggetto $frank stamperà
    //stamperà a video il messaggio dopo il tag h1.
    //Con la funzione unset() possiamo eliminare esplicitamente l'oggetto (richiamando
    //prima il metodo __destruct()).
    unset($emp2);
    

    $frank->metodoInesistente(10, 20, 'Francesco');
?>

<h1>Hello World</h1>