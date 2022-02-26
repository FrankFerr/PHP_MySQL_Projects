<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require "Class/Book.class.php";
    require "Class/Employee.class.php";
    require 'Class/Statistiche.class.php';

    $stats = Statistiche::getObj();

    //I namespace possono essere annidati e per farlo bisogna separare il nome di ogni namespace con il "\" (backslash),
    //ad esempio in "Employee.class.php" il namespace è "Facility\Staff", e per accedere ad una classe o funzione bisogna
    //anteporre alla chiamata il namespace nel quale si trova (vedi riga 21 e 25). Spesso può capitare che i namespace 
    //siano troppo lunghi quindi per minimizzare i problemi dello scriverli tutti si possono usare degli alias usando 
    //le parole chiavi "use" e "as" --> use NamespaceCompleto as Alias (vedi riga 12, prova a riga 16)
    use Facility\Staff as Worker;
    $emp2 = new Worker\Employee("Marco Rossi");

    $stats->addStats(get_class($emp2), Worker\Employee::getNumEmployee());

    //qualified name -> quando specifichiamo i namespace 
    $b1 = new Books\Book("First", 1020150151);
    $stats->addStats(get_class($b1), Books\Book::getCopies());


    //fully qualified name -> quando specifichiamo tutti i namespace compreso il global
    //che viene indicato con uno "slash" all'inizio dei namespace
    $emp = new \Facility\Staff\Employee("Francesco Ferrante");
    $stats->addStats(get_class($emp), Worker\Employee::getNumEmployee());


    echo $b1."<br><br>".$emp."<br><br>".$emp2;

    echo "<br><hr><br>Statistiche<br><br>{$stats->getStats()}<br>";
?>