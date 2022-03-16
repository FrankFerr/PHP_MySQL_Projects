<?php

function prova($num){
    if($num === 0){
        return false;
    }
    elseif ($num === 1) {
        return ['francesco', 'Marco', 'Nicola'];
    }
}


if(prova(1) == true){
    echo 'dentro l\'if';
}

?>