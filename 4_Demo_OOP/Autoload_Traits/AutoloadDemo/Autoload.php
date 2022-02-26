<?php

    spl_autoload_register(
        function ($class) { 
            //i namespace vengono indicati con il backslash mentre le cartelle con lo
            //slash, quindi bisogna cambiarli prima di passare il nome della classe al
            //require_once
            require_once "../../../".str_replace('\\', '/', $class).".class.php";
        }
    );

?>