<!-- 
Day --- ---
d -> Day of the month, 2 digits with leading zeros 01 to 31
D -> A textual representation of a day, three letters	Mon through Sun
j -> Day of the month without leading zeros  1 to 31
l (lowercase 'L') -> A full textual representation of the day of the week	Sunday through Saturday
N -> ISO 8601 numeric representation of the day of the week	1 (for Monday) through 7 (for Sunday)
S -> English ordinal suffix for the day of the month, 2 characters	st, nd, rd or th. Works well with j
w -> Numeric representation of the day of the week	0 (for Sunday) through 6 (for Saturday)
z -> The day of the year (starting from 0)	0 through 365

Week	---	---
W -> ISO 8601 week number of year, weeks starting on Monday	Example: 42 (the 42nd week in the year)

Month	---	---
F -> A full textual representation of a month, such as January or March	January through December
m -> Numeric representation of a month, with leading zeros	01 through 12
M -> A short textual representation of a month, three letters	Jan through Dec
n -> Numeric representation of a month, without leading zeros	1 through 12
t -> Number of days in the given month	28 through 31

Year	---	---
L -> Whether it's a leap year	1 if it is a leap year, 0 otherwise.
o -> ISO 8601 week-numbering year. This has the same value as Y, except that if the ISO week number (W) belongs to the previous or next year, that year is used instead.	Examples: 1999 or 2003
Y -> A full numeric representation of a year, 4 digits	Examples: 1999 or 2003
y -> A two digit representation of a year	Examples: 99 or 03

Time	---	---
a -> Lowercase Ante meridiem and Post meridiem	am or pm
A -> Uppercase Ante meridiem and Post meridiem	AM or PM
B -> Swatch Internet time	000 through 999
g -> 12-hour format of an hour without leading zeros	1 through 12
G -> 24-hour format of an hour without leading zeros	0 through 23
h -> 12-hour format of an hour with leading zeros	01 through 12
H -> 24-hour format of an hour with leading zeros	00 through 23
i -> Minutes with leading zeros	00 to 59
s -> Seconds with leading zeros	00 through 59
u -> Microseconds. Note that date() will always generate 000000 since it takes an int parameter, whereas DateTime::format() does support microseconds if DateTime was created with microseconds.	Example: 654321
v -> Milliseconds. Same note applies as for u.	Example: 654

Timezone	---	---
e -> Timezone identifier	Examples: UTC, GMT, Atlantic/Azores
I (capital i) -> Whether or not the date is in daylight saving time	1 if Daylight Saving Time, 0 otherwise.
O -> Difference to Greenwich time (GMT) without colon between hours and minutes	Example: +0200
P -> Difference to Greenwich time (GMT) with colon between hours and minutes	Example: +02:00
p -> The same as P, but returns Z instead of +00:00	Example: +02:00
T -> Timezone abbreviation, if known; otherwise the GMT offset.	Examples: EST, MDT, +05
Z -> Timezone offset in seconds. The offset for timezones west of UTC is always negative, and for those east of UTC is always positive.	-43200 through 50400

Full Date/Time	---	---
c -> ISO 8601 date	2004-02-12T15:19:21+00:00
r -> » RFC 2822 formatted date	Example: Thu, 21 Dec 2000 16:01:07 +0200
U -> Seconds since the Unix Epoch (January 1 1970 00:00:00 GMT)	See also time()
-->
<head><style>*{font-family: 'Gill Sans', 'Gill Sans MT';font-size: 1.2rem;}</style></head>

<?php

    echo 'Esempio date():<br><br>';
    echo date('d-m-Y l / H:i:s');

    echo '<br><br><hr><br>';


    echo 'Esempio date() con una costante che indica un determinato formato:<br><br>';
    echo date(DATE_RSS);

    echo '<br><br><hr><br>';


    echo 'Esempio date() con timestamp:<br><br>';
    //il secondo argomentosta a significare, in secondi, il tempo trascorso
    //dalla 'Unix Epoc' (01/01/1970 - 00:00:00)
    echo date('d-m-Y l / H:i:s', 5);

    echo '<br><br><hr><br>';


    echo 'Esempio date() con timestamp 2:<br><br>';
    //time() restituisce i secondi passati dalla 'Epoca Unix' (01/01/1970 - 00:00:00) 
    //al momento della chiamata della funzione e gli viene aggiunto 3600 secondi (1 ora)
    echo date('d-m-Y l / H:i:s', time() + 3600);

    echo '<br><br><hr><br>';

    //ESEMPIO ---------------------------------------------------->

    try
    {
        $PDOconn = new PDO('mysql:host=localhost;dbname=phptest', 'francesco', 'kekko9719', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
    catch(PDOException $exc)
    {
        $exc->getMessage();
    }

    $nome = 'Francesco';
    $cognome = 'Ferrante';
    $iscrizione = time();

    //INSERISCO UN NUOVO UTENTE MEMORIZZANDO ANCHE IL MOMENTO DELLA REGISTRAZIONE
    //CON UN TIMESTAMP (Secondi passati dalla 'Epoca Unix' ad una determinata data)

    /*
    $st = $PDOconn->query("INSERT INTO User(nome, cognome, sign_up) VALUES ('$nome', '$cognome', $iscrizione)");

    if(!$st)
        echo '<br>Errore nell\'inserimento<br>';
    else
        echo '<br>Inserimento avvenuto con successo<br>';
    */

    $st = $PDOconn->query('SELECT * FROM User');

    if($st->rowCount() > 0)
    {
        $records = $st->fetchAll();

        foreach($records as $record)
        {
            $iscrizione = date('d-m-Y H:i:s', $record['sign_up']);

            echo "Nome: {$record['nome']}<br>Cognome: {$record['cognome']}<br>Iscrizione: $iscrizione";
        }
    }

?>