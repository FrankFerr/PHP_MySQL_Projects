<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    spl_autoload_register(function ($class) { require_once("../Classes/$class.class.php"); });
    // require_once "Namespace/Class/Book.class.php";
    use Books\Book as Book;

    $book1 = new Book("First", 1234567890);

    $book2 = $book1;
    $book2->setTitle("Second");
    $book2->setCopies(20);

    echo "book1<br><br>$book1<br><br>book2<br><br>$book2<br>";

    echo "<hr><br>";
    echo '$book2 = clone $book1<br><br>';

    $book1 = new Book("First", 1234567890);

    $book2 = clone $book1;
    $book2->setTitle("Second");
    $book2->setCopies(20);

    echo "book1<br><br>$book1<br><br>book2<br><br>$book2<br>";

    echo "<br><hr><br>";
    
    echo 'after __clone(){ $this->setTitle("Cloned Book"); }<br><br>$book2 = clone $book1<br><br>';

    $book1 = new Book("First", 1234567890);
    $book1->setCopies(20);

    $book2 = clone $book1;

    echo "book1<br><br>$book1<br><br>book2<br><br>$book2<br>";

    echo "<hr><br>";
    //---------------------------------------------------------------------------
?>