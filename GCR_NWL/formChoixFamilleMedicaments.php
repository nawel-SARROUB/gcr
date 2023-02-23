<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
?>
<form name="formChoixFamilleMedicaments" method="post" action="index.php?action=16">
    <div class="carre">
    <h1> Pharmacopée </h1>


        <?php
            if (isset($_REQUEST['lstFam'])) {
                $num = $_REQUEST['lstFam'];
            } else {
                $num = NULL;
                }
            echo formSelectDepuisRecordset('Famille : ', 'lstFam', 'listFamille',getListeFamille() , $num, 10);
            echo formBoutonSubmit("SubmitFam", "SubmitFam", "OK", 1);
        ?>
    </div>
</form>
