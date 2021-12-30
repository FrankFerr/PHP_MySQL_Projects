<?php
    echo '<head><style>body{font-family:Verdana}</style></head>';

    require_once "Employee.php";
    require_once "Programmer.php";

    //QUI DI SEGUITO CI SONO ALCUNE FUNZIONI PER LA GESTIONE ED IL LAVORO CON LE CLASSI

    //controlla se la classe passata come argomento esiste, restituisce true o false
    echo "class_exists(\"Employee\"): ". (class_exists("Employee") ? "true" : "false") ."<br>";
    echo "class_exists(\"Developer\"): ". (class_exists("Developer") ? "true" : "false") ."<br><br>";


    //get_class() restituisce il nome della classe a cui appartiene l'oggetto
    //passato come argomento, se non è un oggeto restituisce false
    $emp1 = new Employee("Francesco Ferrante");
    $prog1 = new Programmer("Marco Rossi", "Java SE Dev.", 25000);

    echo 'get_class($emp1): '.get_class($emp1).'<br>';
    echo 'get_class($prog1): '.get_class($prog1).'<br><br>';


    //get_class_methods() ritorna un array di stringhe contenente il nome dei
    //metodi della classe passata come argomento (stringa o un oggetto di quella classe)
    //se la funzione viene chiamata al di fuori della classe vengono presi solo
    //i metodi pubblici, mentre se viene chiamato dall'oggetto (quindi dichiarato nella
    //classe passando come argomento $this) li restituisce tutti
    $methods = get_class_methods("Employee");
    foreach($methods as $method)
    {
        echo $method."<br>";
    }

    echo "<br>";

    $methods = $emp1->getMethods();
    foreach($methods as $method)
    {
        echo $method."<br>";
    }

    echo "<br><br>";


    //get_class_vars() ritorna le informazioni sulle proprietà della classe passata
    //come argomento (stringa) in un array associativo in cui chiave => valore si 
    //traduce in nomeProprietà => valoreProprietà, conterranno il valore di default.
    //Ha le stesse regole di visibilità di get_class_methods().
    $vars = $emp1->getVars();

    foreach($vars as $varName => $varValue)
    {
        echo "$varName: $varValue<br>";
    }

    echo "<br><br>";


    //get_declared_classes() ritorna un array di stringhe contenente il nome di tutte
    //le classi dichiarate nello script corrente anche quelle predefinite del PHP (162)
    $classes = get_declared_classes();
    foreach($classes as $class)
    {
        echo "$class<br>";
    }

    echo "<br>";


    //get_object_vars() ritorna le informazioni sulle proprietà di un oggetto specifico
    //passato come argomento, tranne quelle statiche, come un array associativo con 
    //chiave => valore tradotte in nomeProprietà => valoreProprietà. Ha le stesse regole
    //di visibilità di get_class_methods()
    $vars = $emp1->getObjVars();

    foreach($vars as $varName => $varValue)
    {
        echo "$varName: $varValue<br>";
    }

    echo "<br>";
    

    //get_parent_class() ritorna una stringa con il nome della superclasse dell'oggetto
    //passato come argomento. Se è un oggetto della classe base viene restituito false
    echo "get_parent_class(\$emp1): ".get_parent_class($emp1)."<br>";
    echo "get_parent_class(\$prog1): ".get_parent_class($prog1)."<br><br>";


    //is_a() ritorna true o false se l'oggetto, o la stringa con il nome di una classe,
    //passato come primo argomento appartiene o è un "figlio" della classe passata come
    //secondo argomento (come stringa). E' come instanceof.
    echo 'is_a($prog1, "Employee"): '.(is_a($prog1, "Employee") ? "yes" : "no")."<br>";
    echo 'is_a($prog1, "Developer"): '.(is_a($prog1, "Developer") ? "yes" : "no")."<br><br>";


    //is_subclass_of() ritorna true o false se un oggetto, o il nome di una classe passato
    //come stringa, (primo argomento) appartiene/è una sottoclasse della classe passata come
    //secondo argomento
    echo 'is_subclass_of($prog1, "Employee"): '.
        (is_subclass_of($prog1, "Employee") ? "yes" : "no")."<br><br>";

    
    //method_exists() ritorna true o false se un oggetto, o il nome di una classe passato
    //come stringa, (primo argomento) ha il metodo che viene passato come secondo argomento
    echo 'method_exists($emp1, "getName"): '.(method_exists($emp1, "getName") ? "yes" : "no")
    ."<br>";
    echo 'method_exists($emp1, "getWage"): '.(method_exists($emp1, "getWage") ? "yes" : "no")
    ."<br><br>";
?>