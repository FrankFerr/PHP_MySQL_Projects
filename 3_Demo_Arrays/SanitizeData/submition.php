<?php
    echo '<head><style>body, pre{font-family:Verdana;}</style></head>';

    function sanitizeData(&$value, $key)
    {
        $value = strip_tags($value);
    }

    if(array_Walk($_POST['keyword'], "sanitizeData"))
    {
        echo "dati sanificati correttamente<br>";
        echo "<pre>".print_r($_POST['keyword'], true)."</pre>";
    }

?>