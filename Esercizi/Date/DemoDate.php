<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    echo date_default_timezone_get();
    echo date('h-i-s a').'<br><br>';

    date_default_timezone_set('Europe/Rome');

    echo date_default_timezone_get();
    echo date('h-i-s a').'<br>';
?>