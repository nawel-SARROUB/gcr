<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
?>

<form name = "formHistMed" id = "formHistMed" method="post" action='index.php?action=77'>
    <div class="carre">
        <h1> Historique médicaments </h1>

        <?php
        if (isset($_REQUEST['hidLab'])) {
            $num = $_REQUEST['hidLab'];
        } else {
            $num = NULL;
        }
        echo formSelectDepuisRecordset('Laboratoire : ', 'lstLab', 'listLab', getListLabo(), $num, 10);
        echo formBoutonSubmit("SubmitLab", "SubmitLab", "OK", 1);?><br>
    
        <?php
        if (isset($_REQUEST['lstLab'])) {
            $resultat = getListeMedoc($_REQUEST['lstLab']);
            if (isset($_REQUEST['lstMedoc'])) {
                $num = $_REQUEST['lstMedoc'];
            } else {
                $num = NULL;
            }
            echo formSelectDepuisRecordset('Médicament : ', 'lstMedoc', 'listMedoc', getListeMedic($_REQUEST['hidLab']), $num, 11);
            echo formBoutonSubmit("SubmitMedoc", "SubmitMedoc", "OK", 2);}?><br>
            
        <?php
        
//            getHistoMedic($_REQUEST['lstMedoc'])->FetchMode(PDO::FETCH_ASSOC);
            $ligne = getHistoMedic($_REQUEST['lstMedoc']);
            

            echo formTextArea('titre', 'nomMedoc', 'MEDICAMENT :', $ligne['MED_NOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'nomPra', 'NOM DU PRATICIEN :', $ligne['PRA_NOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre',  'prenomPra', 'PRENOM DU PRATICIEN :', $ligne['PRA_PRENOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'visNom', 'NOM DU VISITEUR :', $ligne['VIS_NOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'visPrenom', 'PRENOM DU VISITEUR :', $ligne['VIS_PRENOM'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'date', 'LE :', $ligne['OFF_DATE'],50,3,220,6, TRUE, FALSE);
            echo formTextArea('titre', 'qte', 'NOMBRE QTE :', $ligne['OFF_QTE'],50,3,220,6, TRUE, FALSE);
            
        ?>
    </div>
</form>    

<?php
require_once'./Include/pied.inc.php';
?>