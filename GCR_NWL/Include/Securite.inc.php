<?php

session_start();

function valideInfosCompteUtilisateur($codeVisiteur, $motDePasse){
    $motDePasseHash = md5($motDePasse);
    if (existeCompteVisiteur($codeVisiteur, $motDePasseHash)){
        return True;
    }
    else {
        return False;
    }
}

function existeCompteVisiteur($codeVisiteur, $mdp) {
    $connexion = SGBDConnect();
    $requete = $connexion->prepare('select 1 from VISITEUR where VIS_CODE = :code and VIS_PASSE = :passe');
    $requete->bindParam(':code', $codeVisiteur, PDO::PARAM_STR);
    $requete->bindParam(':passe', $mdp, PDO::PARAM_STR);
    $requete->execute();
    return $requete->rowCount();
}


function ouvreSessionUtilisateur($utilisateur) {
    $_SESSION['UtilId'] = $utilisateur;
    $infoUser = afficheInfoUser($utilisateur);
    $_SESSION['nomUser'] = $infoUser[0];
    $_SESSION['pnomUser'] = $infoUser[1];
    $_SESSION['jobUser'] = $infoUser[2];
    $_SESSION['regUser'] = $infoUser[3];
    
}

function estSessionUtilisateurOuverte() {
    if (isset($_SESSION['UtilId'])) {
        return True;
    }
}
function fermeSessionUtilisateur() {
    session_destroy();
}
?>