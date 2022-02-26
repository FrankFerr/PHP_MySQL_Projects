<?php

//FORM FUNCTION ------------------------------------------------->

function form()
{
    $status = [
        'send' => false,
        'error' => false,
        'message' => '',
        'messageUpload' => '',
    ];


    if(isset($_POST['submit']))
    {
        $status['send'] = true;

        upload($status);


        //CONTROLLO NOME
        //FILTER_SANITIZE_STRING è deprecato, usare al suo posto htmlspecialchars()
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        if(strlen($nome) == 0)
        {
            $status['error'] = true;
            $status['message'] .= 'Devi inserire un nome valido<br>';
        }
        
        //CONTROLLO EMAIL
        if(!filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))
        {
            $status['error'] = true;
            $status['message'] .= 'Email non valida<br>';
        }

        //CONTROLLO NUMERO CAMERE

        $opzioni['options'] = ['min_range' => 1, 'max_range' => 3];

        if(!filter_input(INPUT_POST, 'camere', FILTER_VALIDATE_INT, $opzioni))
        {
            $status['error'] = true;
            $status['message'] .= 'E\' necessario indicare il numero di camere da 1 a 3<br>';
        }


        //CONTROLLO RADIO BUTTON
        if(!filter_has_var(INPUT_POST, 'sesso'))
        {
            $status['error'] = true;
            $status['message'] .= 'E\' necessario scegliere il sesso<br>';
        }
        elseif($_POST['sesso'] !== 'm' && $_POST['email'] !== 'f')
        {
            $status['error'] = true;
            $status['message'] .= 'Il valore inserito per il sesso non è valido<br>';
        }


        //CONTROLLO CHECKBOX
        define('VALORI', ['pc', 'notebook', 'tablet', 'smartphone']);

        if(filter_has_var(INPUT_POST, 'dispositivi'))
        {
            $dispositivi = $_POST['dispositivi'];

            echo 'Hai scelto: ';
            foreach($dispositivi as $dispositivo)
            {
                //da PHP 8.1 il filtro FILTER_SANITIZE_STRING è deprecato.
                //Usare la funzione htmlspecialchars()
                $dispositivo = htmlspecialchars($dispositivo);

                if(in_array($dispositivo, VALORI))
                {
                    echo "$dispositivo ";
                }
            }
        }

    }

    if($status['send'] && $status['error'])
    {
        $status['message'] = "<p id='error'>" . $status['message'] . "</p>";
    }
    elseif($status['send'] && !$status['error'])
    {
        $status['message'] = "<p id='success'>Form inviato con successo<br><br>Grazie per averci contattato</p>";
    }


    return $status;
}

//UPLOAD FUNCTION ------------------------------------------------->

function upload(&$status)
{    
    define('FORMATI_ACCETTATI', ['.doc', '.docx', '.pdf']);
    define('SIZE_MAX', 300000);
    define('UPLOAD_DIR', 'upload/');

    $name = $_FILES['allegato']['name'];
    $tmp_folder = $_FILES['allegato']['tmp_name'];
    $error = $_FILES['allegato']['error'];
    $size = $_FILES['allegato']['size'];
    $ext = strrchr($name, '.');


    //CONTROLLO CARICAMENTO FILE (ERRORE)
    if($error === UPLOAD_ERR_NO_FILE)
    {
        $status['error'] = true;
        $status['messageUpload'] = '<p id=\'error\'>Non è stato caricato nessun file</p>';

        return;
    }

    //CONTROLLO CARICAMENTO FILE (OK)
    if($error === UPLOAD_ERR_OK)
    {
        //CONTROLLO FORMATO
        if(!in_array($ext, FORMATI_ACCETTATI))
        {
            $status['error'] = true;
            $status['messageUpload'] = "<p id='error'>Il formato del $ext non è accettato</p>";

            return;
        }

        //CONTROLLO GRANDEZZA
        if($size > SIZE_MAX)
        {
            $status['error'] = true;
            $status['messageUpload'] = '<p id=\'error\'>La dimanesione massima è di 300KB</p>';

            return;
        }

        //CONTROLLO TRASFERIMENTO
        if(move_uploaded_file($tmp_folder, UPLOAD_DIR.'up_file'.$ext))
        {
            $status['messageUpload'] = '<p id=\'success\'>file caricato con successo</p>';
        }
        else
        {
            $status['error'] = true;
            $status['messageUpload'] = '<p id=\'error\'>errore nel caricamento del file</p>';
        }
    }
    else
    {
        $status['error'] = true;
        $status['messageUpload'] = "<p id='error'>errore n°$error</p>";
    }
}


?>