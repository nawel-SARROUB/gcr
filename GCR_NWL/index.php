<?php

require_once './Include/Securite.inc.php';
    if (!isset($_REQUEST['action'])) {
        $_REQUEST['action'] = 5;
    }
    switch ($_REQUEST['action']) {
        case 5:
            require_once './Identif.php';
            break;

        case 6:
            require_once './Identif.php';
            break;

        case 7:
            require_once './Include/entete.inc.php';
            break;

        case 15:
            require_once './formChoixFamilleMedicaments.php';
            break;

        case 16:
            require_once './formChoixMedoc.php';
            break;

        case 17:
            require_once './formMedicament.php';
            break;

        case 30:
            require_once './formPRATICIEN.php';
            break;

        case 45:
            require_once './formRAPPORT_VISITE.php';
            break;

        case 55:
            require_once './formVISITEUR.php';
            break;
        
        case 66:
            require_once './formLabo.php';
            break;
        
        case 77:
            require_once './formMedLab.php';
            break;
        
        case 88:
            require_once './formHistMed.php';
            break;

        case 99:
            fermeSessionUtilisateur();
            require_once './Identif.php';
            break;
    }
?>