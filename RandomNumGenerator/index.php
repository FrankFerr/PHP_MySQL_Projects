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

    <form action="rolling_dice.php" method="post">

        <?php
            session_start();

            $number = 1;
            $type = 4;
            $optionValue = [4 => 'D4', 6 => 'D6', 8 => 'D8', 10 => 'D10', 12 => 'D12', 20 => 'D20'];

            if(isset($_SESSION['number']) && isset($_SESSION['type']))
            {
                $number = $_SESSION['number'];
                $type = $_SESSION['type'];
            }

            echo <<< HTML
            <label>Insert number of dice</label>
            <input type="number" name="diceNum" value="$number" />
            <br><br>
            <label>Select a type of dice</label>
            <select id="type" name="diceType">
            HTML;

            foreach($optionValue as $key => $value)
            {
                if($key == $type) 
                    echo "<option value=$key selected>$value</option>";
                else 
                    echo "<option value=$key>$value</option>";
            }

            echo "</select><br><br>";
        ?>

        <input type="submit" value="Roll dice!">
    </form>
</body>

</html>