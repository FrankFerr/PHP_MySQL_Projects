<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dice Rolling</title>
    <style>
        body {
            font-family: Verdana;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Roll Dice Generator</h1>
    <br>

    <?php
        session_start();

        if($_POST['diceNum'] < 1)
        {
            session_unset();
            die("Devi inserire un numero maggiore o uguale a 1");
        }

        $diceNum = (int) $_POST['diceNum'];
        $diceType = (int) $_POST['diceType'];

        $_SESSION['number'] = $diceNum;
        $_SESSION['type'] = $diceType;

        echo <<< HTML
        <p>Number of dice rolled: $diceNum</p>
        <p>Type of dice: D$diceType</p>
        HTML;

        $diceNumbers = array();

        for($i = 0; $i < $diceNum; $i++)
        {
            $diceNumbers[] = rand(1, $diceType);
        }

        echo "<p>Number of dice rolled: ";
        foreach($diceNumbers as $num)
        {
            echo "$num ";
        }

        echo "<p>Total <strong>".array_sum($diceNumbers)."</strong><br><br>";

        echo '<a href="index.php"><input type="submit" value="Return"></a>';
        echo <<< HTML
        <form method="POST" action="rolling_dice.php">
            <input type="hidden" name="diceNum" value="$diceNum" />
            <input type="hidden" name="diceType" value="$diceType" />
            <input type="submit" value="Re-roll!" />
        </form>
        HTML;

    ?>

</body>
</html>