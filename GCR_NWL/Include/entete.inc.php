<?php
require_once './Include/Securite.inc.php';
require_once './Include/SourcesDonnees.inc.php';
?>
<html lang="fr">

<head>
    <meta charset= "UTF-8"/>
    <link href="Styles/gcr2.css" rel="stylesheet" >
    <title>GCR Gestion des comptes rendus de visite </title>
</head>
<body>
    <div class="haut">
        <h1><img src="Images\logo.jpg" width="100" height="60"/>Gestion des comptes rendus des visites</h1>
    </div>    
    <div class="gauche">
        
        <p id="InfosUtil"> Bonjour,
<!--            Louis Villechalane <br>
            Visiteur<br> Region Bretagne-->
          <?php 
//               echo $_SESSION["nomUser"]
//               . ' ' . $_SESSION["pnomUser"] .'<br>'
//               . $_SESSION["jobUser"]. "<br>"
//               . $_SESSION["regUser"];
          
          echo $_SESSION['UtilId'];
          ?>
        </p>

        <h2>Outils</h2>
            <ul><li>Comptes-Rendus
                <li>
                    <ul>
                        <li><a href="index.php?action=45" >Nouveaux</a></li>
                        <li>Consulter</li>
                    </ul>        
                </li>
            </ul>
       
        <ul><li>Consulter
            <li>
                <ul>
                    <li><a href="index.php?action=15" >Medicaments</a></li>
                    <li><a href="index.php?action=30" >Praticiens</a></li>
                    <li><a href="index.php?action=55" >Autres visiteurs</a></li>
                    <li><a href="index.php?action=66" >Historique Médicaments</a></li>
                </ul>
            </li>    
            <li><a href="index.php?action=99">Fermer la session</a></li>
        </ul>
    </div>
    
    </body>
    <div class="droite">
       