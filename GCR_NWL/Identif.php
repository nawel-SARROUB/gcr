<?php 
require_once './Include/entete2.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
require_once './Include/Securite.inc.php';

if (!(isset($_REQUEST["identifiant"]))){
    $_REQUEST["identifiant"] = "";
}
if (!(isset($_REQUEST["password"]))){
    $_REQUEST["password"] = "";
}
?>

<fieldset>
    <legend>Identifiez-vous</legend>
    <form name="frmIdentification" method="POST" action="index.php?action=6">
        <?php
        echo formInputIdentifiant('label', 'identifiant', 'Identifiant :', 60, 30, 'zone', $_REQUEST["identifiant"], TRUE);
        echo formInputPassword('label', 'password', 'Mot de passe :', 60, 30, 'zone', $_REQUEST["password"], TRUE);
        echo formBoutonSubmit("SubmitLog", "SubmitLog", "Valider", 2);


        if (valideInfosCompteUtilisateur($_REQUEST["identifiant"], $_REQUEST["password"])) 
        {
            ouvreSessionUtilisateur($_REQUEST["identifiant"]);
            header("location: index.php?action=7");
            exit();
        } else {
        if ($_REQUEST["identifiant"] != "") {
            echo "<p class=\"erreur\" >Utilisateur et/ou mot de passe invalide(s)</p>";
        }
    }
    ?>
     </form>
</fieldset>B22H2jy
