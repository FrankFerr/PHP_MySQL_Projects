<?php
    echo '<head><style>body,pre{font-family:Verdana}</style></head>';

    /*
                                                Perl's REGULAR EXPRESSIONS

        Sono una sequenza di caratteri (pattern) utili per descrivere che tipo di parole cerchiamo in un testo.
        Le RegEx (regular expressions) vengono usate per effettuare qualsiasi operazione di ricerca e sostituzione
        sulle stringhe.

        esempio: /food/ -> food è il pattern mentre i due forward slashes (/) sono i delimitatori (come se fossero gli 
        apici per delimitare le stringhe).

        Se si deve usare "/" nel pattern bisogna usare la sequenza di escape per far capire che è solo un carattere e
        non un delimitatore ad esempio --> /http:\/\/somedomain.com\//, anche se questa forma è corretta è possibile 
        inserire un diverso delimitatore per rendere il pattern più leggibile --> #http://somedomain.com/#

        Invece di cercare una parola intera possiamo fare in modo che il pattern combaci con diverse parole grazie a
        dei caratteri speciali:

        - /fo+/ --> l'uso del carattere "+" sta ad indicare ogni parola che inizia per 'f' ed ha una o più 'o', a questo
          pattern combaceranno parole tipo fool, food, found etc...

        - / fo* / --> l'uso del carattere "*" sta ad indicare ogni parola che inizia per 'f' ed ha zero o più 'o',
          a questo pattern combaceranno parole come le precedenti "fool, food, found" ma anche "fast, fine"

        - /fo{2, 4}/ --> l'uso delle parentesi graffe ci permette di dare un limite ai caratteri che si possono trovare
          dopo la 'f', in questo caso ({2, 4}) dopo la 'f' ci possono essere dalle 2 alle 4 'o', verranno prese in
          considerazione parole come foot, foosball, fooool mentre found o foooool verranno saltate


        MODIFICATORI

        i modificatori apportano delle "modifiche" nel comportamento del pattern alcuni più usati sono:

            - i --> la ricerca del pattern è case-insensitive
            - m --> tratta la stringa come su più linee
            - s --> tratta la stringa come su una linea ignorando il carattere new-line
            - x --> ignora gli spazi e i commenti nelle regex a meno che non si usi una sequenza di escape
            - U --> ferma la ricerca del pattern nella stringa al primo riscontro. (normalmente cerca fino alla fine)

        I modificatori si inseriscono dopo il delimitatore finale.
        esempio: /cmd/i --> effettuerà una ricerca case-insensitive, quindi combaceranno cmd, Cmd, CMD, cMD...


        METACARATTERI

        i metacaratteri sono caratteri o sequenze di caratteri che hanno un significato speciale che viene
        applicato ai caratteri che vengono prima:

            - \A --> combacia all'inizio della stringa
            - \b --> combacia all'inizio o alla fine della stringa a seconda di dove si inserisce
            - \B --> non deve combiaciare l'inizio o la fine a seconda di dove si inserisce
            - \d --> combacia con un carattere numerico
            - \D --> combacia con un carattere non numerico
            - \s --> combacia con il carattere spazio
            - \S --> non combacia con il carattere spazio
            - [] --> racchiude una classe di caratteri
            - () --> racchiude un gruppo di caratteri o l'inizio e la fine di un subpattern
            - $ --> combacia alla fine della linea
            - ^ --> combacia all'inizio della stringa o di ogni linea (in caso di multilinea)
            - . --> combacia con ogni carattere tranne il newline
            - \w --> combacia con ogni stringa contenente caratteri alfanumerici e underscore
            - \W --> non combacia con caratteri alfanumerici e underscore

        alcuni esempi:
        
        - /sa\b/ --> combacerà solo con parole che finiscono in 'sa' (lisa, pisa..., ma non sabbia, sarno)
        - /\blinux\b/i --> effettuerà una ricerca case-insensitive della parola linux perchè abbiamo usato il
                           metacarattere \b all'inizio ed alla fine
        - /sa\B/i --> combacerà con parole (caase-insensitive) che non finiscono per 'sa' (sabbia, Sara --> ok,
                      Melissa --> no)
        - /\$\d+/ --> usando la sequenza di escape il dollaro verrà considerato un carattere normale, quindi
                      combacerà con stringhe contenenti il simbolo del dollaro ed una o più cifre grazie al 
                      segno '+', altrimenti veniva considerata una cifra


                                        PHP's REGULAR EXPRESSIONS
        Il php offre nove funzioni da usare con le RegEx del Perl: preg_filter(), preg_grep(), preg_match(),
        preg_match_all(), preg_quote(), preg_replace(), preg_replace_callback(), preg_replace_callback_array()
        and preg_split().
     */


    //PREG_MATCH() 

    $string = "The greatest word processor ever created is Vim! Oh Vim, how I love thee!";
    //cerca la parola "vim" (case-insensitive) in $string restituendo vero o falso. Si ferma alla prima occorrenza
    if(preg_match("/\bvim\b/i", $string)) echo "Trovato con preg_match()<br>"; 

    /* cerca la parola "vim" (case-insensitive) in $string inserendo nella prima posizione libera dell'array
    ($match) la parola che combacia con il pattern, mentre con PREG_OFFSET_CAPTURE ogni elemento dell'array
    $match conterrà un altro array dove nella prima posizione si trova la parola che combacia e nella seconda
    viene aggiunto la posizione in cui si trova nella stringa.
    $match e PREG_OFFSET_CAPTURE sono opzionali, la ricerca si ferma alla prima occorrenza */
    preg_match("/\bvim\b/i", $string, $match, PREG_OFFSET_CAPTURE); 
    echo "<br><pre>".print_r($match, true)."</pre><br>";


    //PREG_MATCH_ALL()

    echo "preg_match_all(): <br><br>";
    $string = "Name: <b>Francesco Ferrante</b><br>Title: <b>PHP Guru</b>";

    /* 
    cerca qualsiasi parola che si trovi tra "<b>" e "</b>", con la lettera U la ricerca terminerà alla prima
    occorrenza per riniziare da dove si è interrotto. Nell'esempio se non avessimo usato la U la parola che 
    avrebbe trovato iniziava dal "<b>" prima di "Francesco" e sarebbe finita al "</b>" dopo guru, mentre con
    U la ricerca si fermerà al "</b>" dopo "Ferrante" per poi ricercare un altra parola. Nell'array che si 
    trova in $match[0] troveremo tutte le parole che combaciano col pattern. preg_match_all() ritorna un intero
    che indica il numero di riscontri trovati oppure false
    Quarto argomento (opzionale) per descrivere in che ordine viene popolato l'array:
    - PREG_PATTERN_ORDER -> default, ordina l'array inserendo nella posizione 0 un array con le occorrenze del
    pattern intero, nella posizione 1 un array con le occorrenze dei caratteri del pattern interni alle parentesi
    e così via
    - PREG_SET_ORDER -> il contrario di PREG_PATTERN_ORDER, in posizione 0 l'array con le occorrenze delle
    parentesi più interne e così via con le altre posizioni
    - PREG_OFFSET_CAPTURE -> segue l'ordine di default ma insieme alla parola viene aggiunto anche la posizione */
    $numMatch = preg_match_all("/<b>(.*)<\/b>/U", $string, $match);
    printf("%d MATCH:<br>%d -> %s<br>%d -> %s<br>",$numMatch, 0, $match[0][0], 1, $match[0][1]);

    $numMatch = preg_match_all("/<b>(.*)<\/b>/U", $string, $match, PREG_OFFSET_CAPTURE);
    echo "<br><br>$numMatch MATCH:<br><pre>".print_r($match[0], true)."</pre>";

    //PREG_GREP()

    /* effettua una ricerca tra il pattern e gli elementi di un array. Ritorna un array con indice numerico
       di tutte le parole che combaciano, l'indice del nuovo array non parte da zero ma ogni elemento avrà lo
       stesso indice dell'array di input. Per risolvere questo problema è possibile usare la funzione array_values()
       che ritorna un array di tutti i valori dell'array passato come argomento partendo da 0.
       Il terzo argomento (opzionale) ha come unico valore PREG_GREP_INVERT grzie al quale possiavo invertire il
       funzionamento della funzione memorizzando gli elementi che non combaciano col pattern */
    $array = ["pomodoro", "carote", "zucchine", "peperone"];
    $match = array_values(preg_grep("/^p/", $array));
    echo "preg_grep()<br><pre>".print_r($match, true)."</pre>";

    // PREG_QUOTE()

    /* restituisce una stringa in cui, partendo dalla stringa di input, viene inserito un backslach prima dei 
    caratteri considerati speciali per le regular expressions ($ ^ * ( ) + = { } [ ] | \\ : < >.).*/
    $string = "Tickets for the fight are going for $500. ";
    echo "<br>".preg_quote($string)."<br>";

    // PREG_REPLACE()

    echo "<br>- preg_replace()<br>";

    $string = "this is a link for https://google.com/";
    echo "<br>string: $string<br>";
/* 
    sostituisce in $subject le parole che combaciano con $pattern con $replacement. il quarto argomento $limit
    impone il limite di sostituzioni da fare ed il quinto argomento &$count tiene il conto di quante sostituzioni
    sono state fatte. */
    $newString = preg_replace("#https://(.*)/#", "<a href=\"\${0}\">\${0}</a>", $string);
    echo "<br>newString: $newString";

    /* nelle posizioni di $pattern e $replacement è possibile passare degli array che ad ogni occorrenza passeranno
    all'elemento successivo */
    $string = "Nel 2010 l'azienda ha visto un crollo delle vendite ed ha chiuso.";
    $patterns = array("/crollo/", "/chiuso/");
    $replacements = array("aumento", "festeggiato");

    $newString = preg_replace($patterns, $replacements, $string);

    echo "<br><br>- preg_replace() con array:<br><br>string: $string<br>";
    echo "<br>newString: $newString";

    // PREG_FILTER()

    /* preg_filter() si comporta come preg_replace() ma ritorna solo gli elementi che hanno subito una modifica,
    mentre preg_replace() li restituisce tutti.  */
    $subject = array('1', 'a', '2', 'b', '3', 'A', 'B', '4'); 
    $pattern = array('/\d/', '/[a-z]/', '/[1a]/'); 
    $replace = array('A:$0', 'B:$0', 'C:$0'); 

    echo "<br><br>".print_r($subject,true);

    echo "<br>preg_filter returns<br>";
    print_r(preg_filter($pattern, $replace, $subject)); 

    echo "<br>preg_replace returns<br>";
    print_r(preg_replace($pattern, $replace, $subject)); 

    // PREG_REPLACE_CALLBACK()

    /* funziona allo stesso modo di preg_replace() ma al posto di una stringa come $replacement è possibile passargli
    una funzione per adattarla alle nostre esigenze. Nell'esempio ogni acronimo viene racchiuso tra parentesi e
    preceduto dal nome intero nella funzione acronym() definita prima e passata come secondo argomento */
    function acronym($matches)
    {
      $acronym = array(
        "WWW" => "World Wide Web",
        "IRS" => "Internal Revenue Service",
        "PDF" => "Portable Document Format"
      );

      if(isset($acronym[$matches[1]]))
        return $acronym[$matches[1]]." (".$matches[1].")";
      else
        return $matches[1];
    }

    $string = "The <acronym>IRS</acronym> offers tax forms in <acronym>PDF</acronym> format on the <acronym>WWW</acronym>.";
    $newString = preg_replace_callback("/<acronym>(.*)<\/acronym>/U", 'acronym', $string);

    echo "<br><br>preg_replace_callback()<br><br>";
    echo $string."<br>".$newString;

    //PREG_SPLIT()

    /* si comporta come la funzione explode() ma al posto del carattere separatore possiamo passare una RegEx */
    $delimitedText = "Jason+++Gilmore+++++++++++Columbus+++OH";
    $fields = preg_split("/\++/", $delimitedText);

    echo "<br><br>preg_split():<br><br>";
    foreach($fields as $field) echo $field."<br />";
?>