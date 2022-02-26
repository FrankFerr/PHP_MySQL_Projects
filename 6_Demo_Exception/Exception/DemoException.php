<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    $file = fopen("test.txt", "r");

    try
    {
        if(!fwrite($file, "Adding a new contact")) throw new Exception("Errore nella scrittura sul file");
    }
    catch(Exception $exc)
    {
        echo "Error (file: ".$exc->getFile()." at line: ".$exc->getLine().") ".$exc->getMessage();

    }
    finally
    {
        fclose($file);
        echo '<br><br>File chiuso nel blocco "finally"<br>';
    }

?>