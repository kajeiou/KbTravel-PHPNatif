<?php if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) { 
	echo '<!DOCTYPE html>

<html lang="FR-fr">
	<head>
		<title>KB.Travel Agency </title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scare=1">
		<link rel="stylesheet" type="text/css" href="global.css"/>
		
	</head>
	
	<body>		
			<div class="menu">
				<ul>
					<a href="index.php"><li style="float:left;"><img src="img/logo.png"></li></a>
					<a href="deconnexion.php"><li style="float:right;margin-right:20px;"><img src="img/Icones/deconnexion.png" height="25px" width="25px">Déconnexion</li></a>
					<a href="mesparametres.php"><li style="float:right;"><img src="img/Icones/parametre.png" height="25px" width="25px" style="padding-right:5px">Mes paramètres</li></a>
					<a href="membres.php"><li style="float:right;"><img src="img/Icones/membres.png" height="25px" width="25px" style="padding-right:5px">Nos membres</li></a>
					<a href="mesreservations.php"><li style="float:right;"><img src="img/Icones/valide.ico" height="25px" width="25px" style="padding-right:5px">Mes réservations</li></a>
					<a href="monprofil.php"><li style="float:right;"><img src="img/Icones/profil.png" height="25px" width="25px" style="padding-right:5px">Mon profil - '.$_SESSION['utilisateur'].'</li></a><br><br><br>
					<a href="index.php" style="border-left:220px solid rgba(52, 94, 137, 1);"><li><img src="img/Icones/avion.png" style="padding-right:7px" />Réservez votre billet</li></a>
					<a href="decouvrir.php"><li>Découvrir</li></a>
					<a href="destinations.php"><li>Nos destinations</li></a>
					<a href="actualite.php"><li>Fil d\'actualité</li></a>

				</ul>
</div><br><br><br>';}
else{
	header('Location: index.php');}
?>
			