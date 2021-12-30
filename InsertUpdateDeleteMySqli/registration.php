<?php
    require_once "utility.php";

    //variabili per tenere traccia degli errori
    $errorUser = false;
    $errorEmail = false;

    //controlla se è stato premuto 'Sign Up!' per registrarsi
    if(isset($_POST['signup']))
    {
        //connessione al databse
        $mysqli = connectToDb();

        //recupero e sanificazione di tutte le informazioni inserite
        $first = $mysqli->real_escape_string(validationInput($_POST['firstname']));
        $last = $mysqli->real_escape_string(validationInput($_POST['lastname']));
        $user = $mysqli->real_escape_string(validationInput($_POST['username']));
        $pass = $mysqli->real_escape_string(validationInput($_POST['password']));
        $email = $mysqli->real_escape_string(validationInput($_POST['email']));


        //query per controllare se l'username esiste già
        $query = "SELECT username FROM customers WHERE username='$user'";
        $resUser = $mysqli->query($query);

        //se è già stato trovato un username setta la variabile errorUser a true
        if(isset($resUser->num_rows) && $resUser->num_rows >= 1) $errorUser = true;


        //query per controllare se l'email esiste già
        $query = "SELECT email FROM customers WHERE email='$email'";
        $resEmail = $mysqli->query($query);

        //se è già stato trovato un'email setta la variabile errorEmail a true
        if(isset($resEmail->num_rows) && $resEmail->num_rows >= 1) $errorEmail = true;


        //se username e email non esistono registra l'utente, altrimenti vengono mostrati messaggi di errore a schermo
        if(!$errorUser && !$errorEmail)
        {
            //hash della password da memorizzare nel database
            $pass = password_hash($pass, PASSWORD_DEFAULT);

            //hash dell'username da inviare via email per l'attivazione dell'account
            $hashVerify = password_hash($user, PASSWORD_DEFAULT);

            //query per l'inserimento dati nuovo utente nel database
            $query = "INSERT INTO customers (firstname, lastname, username, password, email) VALUES ('$first', '$last', '$user', '$pass', '$email')";

            //se la query va a buon fine viene inviata l'email di attivazione dell'account e viene reindirizzato ad una pagina con l'avviso per l'utente
            if($mysqli->query($query))
            {
                $mysqli->close();

                $to = $email;
                $subject = "Account Activation";
                $message = "Thanks for registrationg to my site, please click on the link below to activate your account.\n\nlink: http://localhost/Projects/InsertUpdateDeleteMySqli/activation.php?email=$email&verify=$hashVerify";

                mail($to, $subject, $message);

                messageHtml("Registration almost completed", "It was sent an email with a link to activate your account, please check your email and click on link.", "index.html");
                exit;
            }
            //se non va a buon fine viene mostrato un messaggio che invita a riprovare più tardi
            else
            {
                $mysqli->close();
                messageHtml("Registration error", "There are some problem with site, please try again later", "index.html");
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/registration.css?ts=<?=time()?>&quot">
    <title>Registration User</title>
</head>
<body>
    <div id="navbarLogin">
        <a id="logo" href="index.html">
            <h2 id="logoh2">MySite</h2>
        </a>

        <h1 id="titoloPagina">REGISTRATION</h1>
        
        <button id="loginBtn" onclick='document.location="login.php"'>Login</button>
        <button id="registrationBtn" onclick='document.location="registration.php"'>Registration</button>
        
    </div>

        <div id="boxRegForm">
            <h2 id="title">Registration user</h2>

            <form method="post" action="registration.php">
                <div id="boxFirstname" class="boxInput">
                    <label for="firstname">Firstname: </label>
                    <input class="input" type="text" placeholder="Enter your first name" pattern="[a-zA-Z]{3, 22}" size="30" name="firstname" required/>
                    <p id="hintFirst">No digits or special character</p>
                </div>
    
                <div id="boxLastname" class="boxInput">
                    <label for="lastname">Lastname: </label>
                    <input class="input" type="text" placeholder="Enter your last name" size="30" pattern="[a-zA-Z]{3, 22}" name="lastname" required/>
                    <p id="hintLast">No digits or special character</p>
                </div>
    
                <div id="boxUsername" class="boxInput">
                    <label for="username">Username: </label>
                    <input class="input" type="text" placeholder="Enter username" size="30" name="username" required/>
                    <?php if($errorUser) echo "<span><p>This username already exists</p></span>"; ?>
                </div>
    
                <div id="boxPassword" class="boxInput">
                    <label for="password">Password: </label>
                    <input class="input" type="password" placeholder="Enter password"  pattern="[a-zA-Z0-9]{5,18}" size="30" name="password" required/>
                    <p id="hintPassword">Uppercase letter, lowercase letter, digits (min 5 max 18 characters)</p>
                </div>
    
                <div id="boxEmail" class="boxInput">
                    <label for="email">Email: </label>
                    <input class="input" type="email" placeholder="Enter your email" size="30" name="email" required/>
                    <?php if($errorEmail) echo "<span><p>This email already exists</p></span>"; ?>
                </div>

                <div class="boxInput">
                    <input id="submit" class="input" type="submit" name="signup" value="Sign Up!"/>
                </div>
            </form>
        </div>

</body>
</html>