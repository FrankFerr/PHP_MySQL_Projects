<?php
    /*
     * - include(filePath/fileName) == include "filePath/fileName": inserisce un
     * determinato file nella posizione in cui viene chiamata include(). Nell'esempio
     * il form creato in test.html verrà rappresentato tra i primi due paragrafi. 
     * 
     * - include_once(filePath/fileName) == include_once "filePath/fileName": controlla
     * se il file è stato già incluso una volta, sempre con include_once(), in modo
     * da non includerlo di nuovo. Ha le stesse funzionalità di include
     * 
     * - require(filePath/fileName) == require "filePath/fileName": al contrario di
     * include(), che se non trova il file da inserire lo script continua lo stesso,
     * con require() l'esecuzione si blocca
     * 
     * - require_once(filePath/fileName) == require_once "filePath/fileName": lo stesso
     * di require() ma si accerta di includere il file una sola volta
     */

    echo '<body style="font-family:Verdana">';

    echo <<<TEST
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis modi velit architecto odit<br>
    nemo quas nostrum commodi itaque. Enim praesentium maxime voluptas laboriosam molestias ad neque<br>
    quasi incidunt. Nostrum recusandae cupiditate, et ut aperiam, quo, culpa eius dolor nihil minus<br>
    quaerat voluptas itaque ab at. Mollitia illum vitae quo corporis.</p><br><br>
    TEST;
    
    include "test.html";
    include_once "prova.php";

    echo <<<TEST
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis modi velit architecto odit<br>
    nemo quas nostrum commodi itaque. Enim praesentium maxime voluptas laboriosam molestias ad neque<br>
    quasi incidunt. Nostrum recusandae cupiditate, et ut aperiam, quo, culpa eius dolor nihil minus<br>
    quaerat voluptas itaque ab at. Mollitia illum vitae quo corporis.</p><br><br>
    TEST;
    
    include "test.html";
    include_once "prova.php";

    echo <<<TEST
    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nobis modi velit architecto odit<br>
    nemo quas nostrum commodi itaque. Enim praesentium maxime voluptas laboriosam molestias ad neque<br>
    quasi incidunt. Nostrum recusandae cupiditate, et ut aperiam, quo, culpa eius dolor nihil minus<br>
    quaerat voluptas itaque ab at. Mollitia illum vitae quo corporis.</p><br><br>
    TEST;
    
?>