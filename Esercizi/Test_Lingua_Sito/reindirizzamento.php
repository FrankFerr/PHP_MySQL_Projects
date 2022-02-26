<?php

    define('WEBSITE_LANG', ['it', 'en', 'fr']);
    const DEFAULT_LANG = 'en';

    // echo $_SERVER['HTTP_ACCEPT_LANGUAGE'];

    /*questo piccolo script controlla la lingua preferita del browser e se
      è disponibile la pagina in quella lingua allora viene visualizata dall'utente
      altrimenti se non c'è tra le lingue disponibili gli viene mandata la lingua
      di default
    */
    if(isset($_POST['hidden']))
    {
        $browser_lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
        $requested_lang = substr($browser_lang, 0, 2);
        
        if(in_array($requested_lang, WEBSITE_LANG))
        {
            header('location: '.$requested_lang.'/index.php');
        }
        else
        {
            header('location: '.DEFAULT_LANG.'/index.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TEST LINGUAGGIO SITO</title>
</head>
<body>
    
    <form action="reindirizzamento.php" method="post">
        <input type="hidden" name="hidden" value='ok'>
        <input type="submit" value="Vai al sito!">
    </form>

</body>
</html>