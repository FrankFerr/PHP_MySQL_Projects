<?php

    define("HOSTNAME", "localhost");
    define("USERNAME", "admin");
    define("PASSWORD", "admin");
    define("DATABASE", "MySite");

    function connectToDb()
    {
        // connessione al database
        $mysqli = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);

        // controllo errori connessione
        if($mysqli->connect_errno)
            exit(messageHtml("Some error occurred", "there are some problem with login, please try later", "index.html"));
        else
            return $mysqli;
    }

    function validationInput(string $data)
    {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    function logFile(string $msg)
    {
        if(!($fh = fopen("log/log.txt", "a")))
        {
            return false;
        }

        fwrite($fh, $msg."\n");

        fclose($fh);
    }

    function messageHtml(string $title, string $msg, string $destinazione)
    {
        echo '<head><link rel="stylesheet" href="css/messageHtml.css?ts='.time().'&quot"></head>';
        
        echo <<<HTML
        <body>
        <div  id="boxGrande">
        <h2>$title</h2>
        <div id="boxInputFile">
            <p>$msg</p>    
        </div>
        <div id="boxReturnBtn">
            <a href="$destinazione"><button id="returnBtn"><- Return</button></a>
        </div>
        </div>
        </body>
        HTML;
    }
?>