<?php
require_once './Include/entete.inc.php';
require_once './Include/SourcesDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';
$resultat = getlistePraticiens();

?>
<html>
<head>
	<title>formulaire VISITEUR</title>
</head>
<body>
<div name="haut"></div>
<div name="droite">
<div name="bas">
    <form name="formVISITEUR" method="post" action="recupVISITEUR.php">
		<h1> Visiteurs </h1>
		<select name="lstDept" class="titre"><option value="">Département</option><option value="01">Ain</option></select>
		<select name="lstVisiteur" class="zone"><option value="a131">Villechalane</option></select>
		<label class="titre">NOM :</label><input type="text" size="25" name="VIS_NOM" class="zone" />
		<label class="titre">PRENOM :</label><input type="text" size="50" name="Vis_PRENOM" class="zone" />
		<label class="titre">ADRESSE :</label><input type="text" size="50" name="VIS_ADRESSE" class="zone" />
		<label class="titre">CP :</label><input type="text" size="5" name="VIS_CP" class="zone" />
		<label class="titre">VILLE :</label><input type="text" size="30" name="VIS_VILLE" class="zone" />
		<label class="titre">SECTEUR :</label><input type="text" size="1" name="SEC_CODE" class="zone" />
		<label class="titre">&nbsp;</label><input class="zone"type="button" value="<"></input><input class="zone"type="button" value=">"></input>
    </form>
</div>
</div>
</body>
</html>