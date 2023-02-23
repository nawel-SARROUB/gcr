<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
require_once './formChoixFamilleMedicaments.php';
?>

<form name="formListeMedoc" method="post" action='index.php?action=17'>
    <div class="carre">
        <?php
//        if (isset($_REQUEST['lstFam'])) {
//            $resultat = getListeMedoc($_REQUEST['lstFam']);
            if (isset($_REQUEST['lstMed'])) {
                $num = $_REQUEST['lstMed'];
            } else {
                $num = NULL;
            }
            echo formSelectDepuisRecordset('Médicament : ', 'lstMed', 'listMedicament', getListeMedoc($_REQUEST['lstFam']), $num, 10);
            echo formBoutonSubmit("SubmitMed", "SubmitMed", "OK", 2);
            echo formInputHidden('hidFam', 'hidFam', $_REQUEST['lstFam']);
//        }
        ?>
    </div>
</form>
<?php
require_once'./Include/pied.inc.php';
?>