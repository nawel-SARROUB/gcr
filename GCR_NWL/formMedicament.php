<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
?>

<form name = "formChoixFamilleMedicaments" id = "formChoixFamilleMedicament" method="post" action='index.php?action=16'>
    <div class="carre">
        <h1> Pharmacopée </h1>

        <?php
        if (isset($_REQUEST['hidFam'])) {
            $num = $_REQUEST['hidFam'];
        } else {
            $num = NULL;
        }
        echo formSelectDepuisRecordset('Famille : ', 'lstFam', 'listFamille', getListeFamille(), $num, 10);
        echo formBoutonSubmit("SubmitFam", "SubmitFam", "OK", 1);?><br>
</form>

<form name = "formChoixMedoc" id = "formChoixMedoc" method="post" action='index.php?action=16'>
        <?php
        if (isset($_REQUEST['lstFam'])) {
            $resultat = getListeMedoc($_REQUEST['lstFam']);
            if (isset($_REQUEST['lstMed'])) {
                $num = $_REQUEST['lstMed'];
            } else {
                $num = NULL;
            }
            echo formSelectDepuisRecordset('Médicament : ', 'lstMed', 'listMedicament', getListeMedoc($_REQUEST['hidFam']), $num, 11);
            echo formBoutonSubmit("SubmitMed", "SubmitMed", "OK", 2);}?><br>
</form>


        <?php
        
            getInfoMedoc($_REQUEST['lstMed'])->setFetchMode(PDO::FETCH_ASSOC);
            $ligne = getInfoMedoc($_REQUEST['lstMed'])->fetch();
            

            echo formTextArea('titre', 'nomCommercial', 'NOM COMMERCIAL :', $ligne['MED_NOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre',  'composition', 'COMPOSITION :', $ligne['MED_COMPO'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'effets', 'EFFETS :', $ligne['MED_EFFETS'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'contreindic', 'CONTRE INDIC. :', $ligne['MED_CONTREINDIC'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'labo', 'LABO :', $ligne['MED_LABO'],50,3,220,6, TRUE, FALSE);
        ?>
    </div>
    

<?php
require_once'./Include/pied.inc.php';
?>