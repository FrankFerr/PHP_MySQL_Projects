<?php
    /* 
     * crea una tabella (array di array) contenente i pagamenti mensili, con interesse, di
     * un prestito utilizzando la ricorsione
     * 
     * PARAMS:
     * 
     * - $balance --> totale del prestito da ripagare, (diminuirà del pagamento principale ad ogni ricorsione)
     * 
     * - $monthlyInterest --> interesse mensile aggiunto al pagamento principale
     * 
     * - $periodicPayment --> pagamento mensile con interesse
     * 
     * - $paymentNumber (default 1) --> indica il numero dei pagamenti totali, parte da 1. (aumenterà di 1 ad ogni ricorsione)
     * 
     * RETURN:
     * 
     * - un array nel quale ogni posizione contiene un altro array con le seguenti informazioni
     *      row[0] -> numero pagamento,
     *      row[1] -> bilancio dopo ogni pagamento,
     *      row[2] -> pagamento mensile con interesse,
     *      row[3] -> pagamento mensile senza interesse,
     *      row[4] -> interesse
     */ 

    function loanPaymentTable($balance, $monthlyInterest, $periodicPayment, $paymentNumber = 1)
    {
        static $table = array();

        //valore, in denaro, dell'interesse
        $paymentInterest = round($balance * $monthlyInterest, 2);

        //calcolo del pagamento principale (pagamento mensile senza interesse)
        $paymentPrincipal = round($periodicPayment - $paymentInterest, 2);

        //nouvo totale del bilancio dopo un pagamento
        $newBalance = round($balance - $paymentPrincipal, 2);

        //azzera il bilancio se è minore del pagamento principale
        if($newBalance < $paymentPrincipal)
        {
            $newBalance = 0;
        }

        //aggiunta delle informazioni nella tabella
        $table[] = [
            $paymentNumber,
            number_format($balance, 2, ",", "."),
            number_format($periodicPayment, 2, ",", "."),
            number_format($paymentPrincipal, 2, ",", "."),
            number_format($paymentInterest, 2, ",", "."),
        ];

        //se il bilancio è maggiore di zero si deve registrare un nuovo pagamento
        if($newBalance > 0)
        {
            $paymentNumber++;
            loanPaymentTable($newBalance, $monthlyInterest, $periodicPayment, $paymentNumber);
        }

        return $table;
    }
?>