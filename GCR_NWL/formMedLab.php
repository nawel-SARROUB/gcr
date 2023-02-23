<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
require_once './formLabo.php';
?>

<form name="formMedLab" method="post" action='index.php?action=88'>
    <div class="carre">
        <?php
//        if (isset($_REQUEST['lstFam'])) {
//            $resultat = getListeMedoc($_REQUEST['lstFam']);
            if (isset($_REQUEST['lstMedoc'])) {
                $num = $_REQUEST['lstMedoc'];
            } else {
                $num = NULL;
            }
            echo formSelectDepuisRecordset('Médicament : ', 'lstMedoc', 'listMedoc', getListeMedic($_REQUEST['lstLab']), $num, 10);
            echo formBoutonSubmit("SubmitMedoc", "SubmitMedoc", "OK", 2);
            echo formInputHidden('hidLab', 'hidLab', $_REQUEST['lstLab']);
//        }
        ?>
    </div>
</form>
<?php
require_once'./Include/pied.inc.php';
?>