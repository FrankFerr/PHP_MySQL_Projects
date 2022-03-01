<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    //con strtotime() possiamo tradurre una data in formato stringa nel
    //suo relativo timestamp.

    //se passiamo la stringa 'now' abbiamo lo stesso funzionamento della
    //funzione time()
    echo strtotime('now').' '.time().'<br><br>';

    //inserimento data in formato stringa
    echo strtotime('19 june 1997').' '.mktime(0, 0, 0, 6, 19, 1997).'<br><br>';

    //inserimento data con parole chiave come 'next Monday' che restituisce
    //il timestamp relativo al prossimo lunedì
    echo strtotime('next Monday').' '.mktime(0, 0, 0, 2, 28, 2022).'<br><br>';

    //con questa sintassi possiamo aggiungere, al timestamp corrente, dei giorni mesi ore minuti... 
    echo strtotime('+2 day 2 hours').' -> '.date('d-m-Y H:i:s', strtotime('+2 day 2 hours')).'<br><br>';
?>