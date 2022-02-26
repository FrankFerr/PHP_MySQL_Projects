<form action=<?php echo $_SERVER['SCRIPT_NAME']; ?> method="post" enctype="multipart/form-data">

    <p id='asterisco'>* I campi contrassegnati dall'asterisco sono obbligatori</p>

    <div id='divnome'>
        <input id='nome' name='nome' type="text" placeholder="Nome *" /> <br>
    </div>

    <div id='divemail'>
        <input id='email' name='email' type="text" placeholder="Email *" /> <br>
    </div>

    <br>

    <div id='divcamere'>
        <label for="camere">* Numero di camere da prenotare: </label>
        <input type="number" min='1' max='3' name="camere" id="camere" >
    </div>

    <div id='divsesso'>
        <p id='psesso'>* Sesso </p>

        <input type="radio" name="sesso" id="maschio" value='m'>
        <label for="maschio">Maschio</label>

        <input type="radio" name="sesso" id="femmina" value='f'>
        <label for="femmina">Femmina</label>
    </div>

    <div id="divdispositivi">
        <p id="pdispositivi">* Dispositivi posseduti </p>

        <input type="checkbox" name="dispositivi[]" id="pc" value='pc'>
        <label for="pc">PC Desktop</label>

        <input type="checkbox" name="dispositivi[]" id="notebook" value='notebook'>
        <label for="notebook">Notebook</label>

        <input type="checkbox" name="dispositivi[]" id="tablet" value='tablet'>
        <label for="tablet">Tablet</label>

        <input type="checkbox" name="dispositivi[]" id="smartphone" value='smartphone'>
        <label for="smartphone">Smartphone</label>
    </div>

    <div id='divallegato'>
        <input type="file" name="allegato" id="allegato">
    </div><br>

    <input id='submit' type="submit" value="Invia" name='submit'>
    <input type="reset" value="Cancella" id='cancella'>
    <br><br>

</form>