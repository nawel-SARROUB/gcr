<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
?>
<form name="formLabo" method="post" action="index.php?action=77">
    <div class="carre">
    <h1> Historique médicaments </h1>


        <?php
            if (isset($_REQUEST['lstLab'])) {
                $num = $_REQUEST['lstLab'];
            } else {
                $num = NULL;
                }
            echo formSelectDepuisRecordset('Laboratoire : ', 'lstLab', 'listLab', getListLabo() , $num, 10);
            echo formBoutonSubmit("SubmitLab", "SubmitLab", "OK", 1);
        ?>
    </div>
</form>
