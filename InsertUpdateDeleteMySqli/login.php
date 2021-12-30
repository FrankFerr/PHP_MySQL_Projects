<?php
    session_start();

    require_once('utility.php');
    spl_autoload_register(function ($class) { require_once "classes/$class.class.php"; });

    $errorMsg = false;

    //recupero username dai cookie
    if(isset($_COOKIE['username'])) $rUsername = $_COOKIE['username'];
    else $rUsername = "";

    //se è stato fatto il logout elimina la sessione per impedire
    //di riaccedere senza autenticarsi
    if(isset($_GET['logout']) && $_GET['logout'])
    {
        session_unset();
        session_destroy();
    }

    //controlla se è stato premuto il bottone per il login
    if(isset($_POST['login']))
    {
        //conessione al database
        $mysqli = connectToDb();

        //recupero e sanificazione input dal form
        $user = $mysqli->real_escape_string(validationInput($_POST['username']));
        $pass = validationInput($_POST['password']);

        
        //se la casella remember username è spuntata si salva l'username nei cookie
        //se non è spuntata imposta una stringa vuota e l'eliminazione del cookie a browser chiuso
        isset($_POST['rememberUser']) ? setcookie("username", $user, time() + 86400) : setcookie("username", "", 0);


        //query per recuperare i dati collegati a quell'username
        $query = "SELECT * FROM customers WHERE username='$user'";
        $result = $mysqli->query($query);

        $mysqli->close();

        //controlla se è stato trovato quell'username nel database
        if(isset($result->num_rows) && $result->num_rows != 0)
        {
            //recupero dei dati dal database come array
            $customer = $result->fetch_array(MYSQLI_ASSOC);

            //controlla se la password è corretta
            if(password_verify($pass, $customer['password']))
            {
                //controlla se è un account attivo, se non lo è viene reindirizzato ad un reminder dell'attivazione
                if(!$customer['user_active'])
                {
                    messageHtml("Account inactive", "Your account isn't active, please check your email and click on link in the message for activation", "index.html");
                    
                    exit;
                }
                //altrimenti viene istanziato un oggetto con i suoi dati e viene reindirizzato al negozio
                else
                {
                    $_SESSION['customer'] = new Customer($customer['firstname'], $customer['lastname'], $customer['username'], $customer['email'], $customer['id'], $customer['user_active'], "customer");

                    header("location: negozio.php");
                    
                    exit;
                }
            }
        }
        
        //se, cercando di effettuare il login, l'esecuzione del codice è arrivata fino a questo punto c'è un errore nell'username o password, quindi viene settata a true per visualizzare un messaggio nella pagina
        $errorMsg = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Exercise</title>
    <link rel="stylesheet" href="css/login.css?ts=<?=time()?>&quot">
</head>
<body>
    <div id="navbarLogin">
        <a id="logo" href="index.html">
            <h2 id="logoh2">MySite</h2>
        </a>

        <h1 id="titoloPagina">LOGIN</h1>
        
        <button id="loginBtn" onclick='document.location="login.php"'>Login</button>
        <button id="registrationBtn" onclick='document.location="registration.php"'>Registration</button>
        
    </div>
    
        <div id="boxGrande">
            <h2 id="titoloForm">Authentication</h2>

            <form action="login.php" method="POST">
                
                <div id="boxUsername">
                    <label for="user">Username:</label>
                    <input class="input" type="text" name="username" placeholder="Insert username" <?php echo "value='$rUsername'"; ?> required/>
                </div>

                <br>
                
                <div id="boxPassword">
                    <label for="pass">Password:</label>
                    <input class="input" type="password" name="password" placeholder="Insert password" value="" required/>
                </div>

                <div id="boxRemember">
                    <input id="rememberUser" type="checkbox" name="rememberUser" <?php !empty($rUsername) ? print 'checked' : print '' ?>/>
                    <label for="rememberUser">Remember username</label>
                </div>

                <?php if($errorMsg) echo "<span><p>Invalid username or password</p></span>"; ?>

                <div id="boxLoginBtn">
                    <input class="input" type="submit" name="login" value="Log in"/>
                </div>

            </form>

        </div>
    
</body>
</html>