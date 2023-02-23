<?php

function SGBDConnect() {
    try {
        $connexion = new PDO('mysql:host=localhost;dbname=gsb', 'root', '');
        $connexion->query('SET NAMES UTF8');
    } catch (PDOException $e) {
        echo 'Erreur !: ' . $e->getMessage() . '<br />';
        exit();
    }
    return $connexion;
}

function getlistePraticiens() {
//    on peut rajt dollar connexion ca change rien
    $sql = 'select PRA_NUM, concat(PRA_NOM,\' \',PRA_PRENOM) '
            . 'From praticien '
            . 'order by PRA_NOM ,PRA_PRENOM';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getPraticienInformations($numPraticien) {
    $sql = 'SELECT PRA_NOM, PRA_PRENOM, PRA_ADRESSE, PRA_COEF, TYP_LIEU, concat(PRA_CP,\' \',PRA_VILLE)'
            . ' FROM praticien'
            . ' INNER JOIN type_praticien on praticien.pra_type = type_praticien.typ_code'
            . ' WHERE praticien.PRA_NUM ="' . $numPraticien . '"';
    $info = SGBDConnect()->query($sql);
    return $info;
}

function getListeFamille() {
    $sql = 'SELECT FAM_CODE, FAM_LIBELLE'
            . ' From FAMILLE'
            . ' Order by FAM_LIBELLE';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getListeMedoc($codeFamille) {
    $sql = 'SELECT MED_CODE, MED_NOM '
            . ' From MEDICAMENT m inner join famille f on m.med_famille = f.fam_code'
            . ' where f.fam_code = \'' . $codeFamille . '\''
            . ' Order by MED_NOM';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getInfoMedoc($codeMedoc) {
    $sql = 'SELECT MED_NOM, MED_COMPO, MED_EFFETS, MED_CONTREINDIC, MED_LABO'
            . ' From MEDICAMENT'
            . ' INNER JOIN laboratoire on medicament.MED_LABO = laboratoire.LAB_CODE '
            . ' WHERE medicament.MED_CODE="' . $codeMedoc . '"';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getIdUser($utilisateur) {
    $sql = 'SELECT vis_nom, vis_prenom, vis_adresse, vis_cp, vis_ville, vis_datemb, vis_lab'
            . ' FROM visiteur WHERE vis_code =' . $utilisateur . '"';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function afficheInfoUser($UtilId) {
    $sql = '"SELECT VIS_PRENOM, VIS_NOM, TRA_ROLE, REG_NOM'
            . ' FROM VISITEUR'
            . ' INNER JOIN TRAVAIL ON VISITEUR.VIS_CODE = TRAVAIL.TRA_VIS'
            . ' INNER JOIN REGION ON  TRAVAIL.TRA_REG = REGION.REG_CODE'
            . ' WHERE TRA_VIS =' . $UtilId . '"';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getListLabo() {
    $sql = 'SELECT LAB_CODE, LAB_NOM'
            . ' FROM LABORATOIRE'
            . ' ORDER BY LAB_NOM' ;
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getListeMedic($codeLabo) {
    $sql = 'SELECT MED_CODE, MED_NOM'
            . ' FROM MEDICAMENT M INNER JOIN LABORATOIRE L ON M.MED_LABO = L.LAB_CODE'
            . ' WHERE L.LAB_CODE = \'' . $codeLabo . '\''
            . ' ORDER BY MED_NOM';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}

function getHistoMedic($codeMedic) {
    $sql = 'SELECT PRA_NOM, PRA_PRENOM, VIS_NOM, VIS_PRENOM, OFF_DATE, OFF_QTE, MED_NOM'
            . ' FROM OFFRE O INNER join MEDICAMENT M ON O.OFF_MED = M.MED_CODE'
            . ' INNER JOIN PRATICIEN P ON P.PRA_NUM = O.OFF_PRA'
            . ' INNER JOIN VISITEUR ON VIS_CODE = OFF_VIS'
            . ' WHERE med_Code =' . $codeMedic . '"'
            . ' ORDER BY OFF_DATE DESC';
    $resultat = SGBDConnect()->query($sql);
    return $resultat;
}
?>