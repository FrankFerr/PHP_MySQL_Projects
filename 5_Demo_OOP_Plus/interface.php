<?php
    echo '<heaf><style>body,pre{font-family:Verdana}</style></head>';

    interface iMyInterface
    {
        const PI = 3.14;

        function test($num);
    }

    interface iMyInterface2
    {
        function test2($str);
    }

    class DemoInterface implements iMyInterface, iMyInterface2
    {
        function test($num) { return $num * iMyInterface::PI; }

        function test2($str)
        {
            $array = explode(" ", $str);
            echo "<pre>".print_r($array, true)."</pre>";
        }
    }

    $di = new DemoInterface();

    echo "result: {$di->test(100)}<br><br>";
    
    $di->test2("Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla earum nisi officiis sint ut quibusdam tenetur non provident sed aut!");
?>
