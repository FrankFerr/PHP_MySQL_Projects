<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.1rem;}</style></head>


<?php

    //metodi per controllare il contenuto della cartella

    //<---------------------------- MODO PROCEDURALE ----------------------->

    //scandir() ritorna un array con tutti i file presenti nella
    // cartella passata come argomento
    $folder = scandir(__DIR__);

    echo '<pre>'.print_r($folder, true).'</pre>';

    echo '<br><br>';

    foreach($folder as $item)
    {
        if($item == '.' || $item == '..') continue;

        //is_dir() e is_file() controllano rispettivamente se quel determinato
        //elemento nell'array ritornato da scandir() sia una cartella o un file
        //ritornando true o false
        if(is_dir($item)) echo "<p><strong>$item</strong></p>";
        if(is_file($item)) echo "<p>$item</p>";

    }

    echo "<br><hr><br>";

    //<------------------------------ OBJECT ORIENTED --------------------------->
    $folder = new DirectoryIterator(__DIR__);

    foreach($folder as $item)
    {
        if($item->getBasename() == '.' || $item->getBasename() == '..') continue;

        if($item->isDir()) echo "<p><strong>$item ".date('d-m-Y H:i:s', $item->getCTime())."</strong></p>";

        if($item->isFile()) echo "<p>{$item->getFilename()} | <strong>extension</strong>: {$item->getExtension()} <strong>creation date</strong>: ".date('d-m-Y H:i:s', $item->getCTime())."</p>";
    }
?>