<?php
    session_start();

    $sidUser = "";


    $correctUser = "admin";
    $correctPass = "admin";
    $correctId = 1234;

    //CONTROLLO SE SONO STATI RIEMPITI TUTTI I CAMPI
    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['id']))
    {
        /*
            PER RICORDARE L'USERNAME UTILIZZARE I COOKIE E NON LE SESSIONI
        */
        if(isset($_POST['remember']))
        {
            $_SESSION['user'] = $_POST['user'];
            $_SESSION['remUser'] = true;
        }
        else
        {
            if(isset($_SESSION['user'])) $_SESSION['user'] = "";

            $_SESSION['remUser'] = false;
        }

        // CONTROLLO SE I DATI SONO CORRETTI
        if($_POST['user'] == $correctUser && $_POST['pass'] == $correctPass && $_POST['id'] == $correctId)
        {
            // //LO REINDIRIZZO
            // header("location: Ferrari/index.html");
            echo "<h1>{".isset($_POST['login'])."}</h1>";
            exit;
        }
        else //IN CASO DI DATI ERRATI
        {
            echo "<p style=\"color:red\">Nome utente, password o ID errato</p>";
        }
    }

    // SE CI SONO PRENDO I DATI IN $_SESSION PER INSERIRLI NELLA PAGINA
    if(isset($_SESSION['user']))
    {
        $sidUser = $_SESSION['user'];
    }

    //PAGINA HTML PER IL LOGIN
    echo <<< HTML
    <html>
        <head>
            <title>Test session</title>
            <style>
                body{font-family:Verdana}
            </style>
        </head>
        <body>
            <form action="testSession.php" method="POST" name="login">
                <label>Username</label>
                <p><input type="text" value="$sidUser" name="user" /></p>
                <label>Password</label>
                <p><input type="password" value="" name="pass" /></p>
                <label>ID number</label>
                <p><input type="number" value="" name="id" /></p>
    HTML;

    if(isset($_SESSION['remUser']) && $_SESSION['remUser']) echo '<input type="checkbox" name="remember" value="user" checked />';
    else echo '<input type="checkbox" name="remember" value="user" />';

    echo <<< HTML
                <label for="remember">Remember username</label>
                <p><input type="submit" value="Submit!" /></p>
            </form>
        </body>
    </html>
    HTML;

?>