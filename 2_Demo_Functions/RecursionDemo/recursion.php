<?php
    require_once("recursionFunc.php");

    $balance = 10000.00;
    $interestRate = 0.0575; // --> 5,75%
    $monthlyInterest = $interestRate / 12;
    $termLength = 5;
    $paymentsPerYear = 12;

    $totalPayments = $termLength * $paymentsPerYear;

    // Determine interest component of periodic payment
    $intCalc = 1 + $interestRate / $paymentsPerYear;

    // Determine periodic payment (non c'è nessun errore, bug delle estensioni di vs code)
    $periodicPayment = $balance * pow($intCalc, $totalPayments) * ($intCalc - 1) /(pow($intCalc,$totalPayments) - 1);

    $periodicPayment = round($periodicPayment, 2);

    $rows = loanPaymentTable($balance, $monthlyInterest, $periodicPayment);

    echo <<<TABLE
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
            }
            td{
                text-align:center;
            }
        </style>
    </head>
    <body style="font-family:Verdana">
    <table style="border: 1px solid black">
        <tr>
            <th>Payment Number</th>
            <th>Balance</th>
            <th>Periodic Payment</th>
            <th>Principal Payment</th>
            <th>Interest</th>
        </tr>
    TABLE;

    foreach($rows as $row)
    {
        // printf("<tr><td>%d</td>", $row[0]);
        // printf("<td>$%s</td>", $row[1]);
        // printf("<td>$%s</td>", $row[2]);
        // printf("<td>$%s</td>", $row[3]);
        // printf("<td>$%s</td></tr>", $row[4]);
        echo "<tr><td>$row[0]</td>";
        echo "<td>$$row[1]</td>";
        echo "<td>$$row[2]</td>";
        echo "<td>$$row[3]</td>";
        echo "<td>$$row[4]</td></tr>";
    }

    echo "</table>";
?>