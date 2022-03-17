<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    $arr = ['a' => 10, 'b' => 20, 'c' => 30];
    $json = json_encode($arr);

?>

<script>
    var jsonObj = <?php echo $json ?>;
    console.log(jsonObj.a + " " + jsonObj.b + " " + jsonObj.c);

    for(var i in jsonObj)
    {
        console.log(i + " " + jsonObj[i]);
    }
</script>