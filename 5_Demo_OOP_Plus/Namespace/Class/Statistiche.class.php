<?php

final class Statistiche
{
    private static $singleton;
    private $statistiche;

    
    //Costruttore
    private function __construct() { $this->statistiche = array(); }


    //Acquisizione del singleton
    public static function getObj()
    {
        if(Statistiche::$singleton === null)
        {
            Statistiche::$singleton = new Statistiche();
        }

        return Statistiche::$singleton;
    }



    //Aggiunge all'array delle statistiche una coppia key->oggetto | valore->vendite
    public function addStats(string $associative_key, int $value)
    {
        $this->statistiche[$associative_key] = $value;
    }


    //ritorna una stringa formattata contenente tutte le statistiche
    public function getStats() : string
    {
        $result = '';

        $keys = array_keys($this->statistiche);
        $values = array_values($this->statistiche);

        for($i = 0; ($i < count($keys)) && ($i < count($values)); $i++)
        {
            $result .= sprintf('%s: %d<br>', str_pad($keys[$i], 20, ' ', STR_PAD_LEFT), str_pad($values[$i], 8, ' ', STR_PAD_RIGHT));
        }
        echo '<br>';

        return $result;

    }
}

?>