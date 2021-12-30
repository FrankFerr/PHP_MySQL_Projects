<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require "Class/Book.class.php";
    require "Class/Employee.class.php";

    //I namespace possono essere annidati e per farlo bisogna separare il nome di ogni namespace con il "\" (backslash),
    //ad esempio in "Employee.class.php" il namespace è "Facility\Staff", e per accedere ad una classe o funzione bisogna
    //anteporre alla chiamata il namespace nel quale si trova (vedi riga 14 e 15). Spesso può capitare che i namespace 
    //siano troppo lunghi quindi per minimizzare i problemi dello scriverli tutti si possono usare degli alias usando 
    //le parole chiavi "use" e "as" --> use NamespaceCompleto as Alias (vedi riga 12, prova a riga 16)
    use Facility\Staff as Member;

    $b1 = new Books\Book("First", 1020150151);
    $emp = new Facility\Staff\Employee("Francesco Ferrante");
    $emp2 = new Member\Employee("Marco Rossi");

    echo $b1."<br><br>".$emp."<br><br>".$emp2;

?>