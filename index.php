<?php session_start();
if(isset($_POST['envoyer'])) {
	$typevoyage = $_POST['typevoyage'];
	$lieudepart = $_POST['depart'];
	$lieuarrive = $_POST['arrive'];
	$datedepart = $_POST['datedepart'];
	$dateretour = $_POST['dateretour'];
	$classevoyage = $_POST['classevoyage'];
	if($typevoyage =="Aller-simple") {
		if(!empty($typevoyage) AND !empty($lieudepart) AND !empty($lieuarrive) AND !empty($datedepart) AND empty($dateretour) AND !empty($classevoyage)) {
			setcookie('typevoyage', $typevoyage, time() + 5000);
			setcookie('lieudepart', $lieudepart, time() + 5000);
			setcookie('lieuarrive', $lieuarrive, time() + 5000);
			setcookie('datedepart', $datedepart, time() + 5000);
			setcookie('classevoyage', $classevoyage, time() + 5000);
		header('Location:recherche.php');
		}
		else{
			echo '<div class="erreur">Des éléments sont manquants pour effectuer la recherche.</div>';
		}
	}
	if($typevoyage =="Aller-retour") {
		if(!empty($typevoyage) AND !empty($lieudepart) AND !empty($lieuarrive) AND !empty($datedepart) AND !empty($dateretour) AND !empty($classevoyage)) {
			setcookie('typevoyage', $typevoyage, time() + 5000);
			setcookie('lieudepart', $lieudepart, time() + 5000);
			setcookie('lieuarrive', $lieuarrive, time() + 5000);
			setcookie('datedepart', $datedepart, time() + 5000);
			setcookie('dateretour', $dateretour, time() + 5000);
			setcookie('classevoyage', $classevoyage, time() + 5000);
		header('Location:recherche.php');
		}
		else{
			echo '<div class="erreur">Des éléments sont manquants pour effectuer la recherche.</div>';
		}
	}
}
?>
<!DOCTYPE html>
<html lang="FR-fr">
	<head>
		<title>KB.Travel Agency </title>
		<meta charset="utf-8" name="viewport" content="width=device-width, initial-scare=1">
		<link rel="stylesheet" type="text/css" href="global.css"/>
		
	</head>
	
	<body style="background-image: url('img/background.jpg');">		
			<?php if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) { echo '
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
			else{ echo '
			<div class="menu">
				<ul>
					<a href="index.php"><li style="float:left;"><img src="img/logo.png"></li></a>
					<a href="connexion.php"><li style="float:right;margin-right:5px;">Se connecter</li></a>
					<a href="inscription.php"><li style="float:right;">S\'inscrire</li></a><br><br><br>
					<a href="index.php" style="border-left:220px solid rgba(52, 94, 137, 1);"><li><img src="img/Icones/avion.png" style="padding-right:7px" />Réservez votre billet</li></a>
					<a href="decouvrir.php"><li>Découvrir</li></a>
					<a href="destinations.php"><li>Nos destinations</li></a>
					<a href="actualite.php"><li>Fil d\'actualité</li></a>

				</ul>
			</div><br><br><br>';}?>
		<script type="text/javascript">
			function afficher(etat)
			{   
				document.getElementById("cache").style.visibility=etat;   
				document.getElementById("cache2").style.visibility=etat;   
			}
		</script>
		<center>
			<div class="title">
				<h4>Avec KB Travel Agency, réservez votre billet en ligne ou annuler en toute simplicité !</h4>	
			</div>
		</center><br><br><br><br>
			<div class="partiea">
				<form action="" method="post">
				<center><h4 style="margin-left:-60px;">Réservation de billets en ligne </h4></center><br><br>
					<label><b>Aller simple</b></label><input type="radio" value="Aller-simple" name="typevoyage" onclick="afficher('hidden');">
					
					<label style="padding-left:40px" ><b>Aller-retour</b></label><input type="radio" value="Aller-retour" name="typevoyage" onclick="afficher('visible');" checked>
					<br><br>
					<label>Départ de</label><select name="depart" class="select" size="1">
												<OPTION value="Beauvais">Beauvais
												<OPTION value="Charles de Gaulle" selected="selected">Paris - Charles De Gaulle
												<OPTION value="Orly">Paris - Orly
											</select>

					<label style="margin-left:50px;">Date Aller</label><input name="datedepart" type="date" min="2018-03-21" max="2018-07-10"><br><br>
					<label>Arrivée à</label><select name="arrive" class="select" size="1">
												<OPTION value="Alger">Alger - Houari Boumédiène
												<OPTION value="Berlin">Berlin - Willy-Brandt
												<OPTION value="Berne">Berne - Aéroport International
												<OPTION value="Bruxelles">Bruxelles - Bruxelles-National
												<OPTION value="Buenos Aires">Buenos Aires - Ezeiza
												<OPTION value="New York">New York - Aéroport John F. Kennedy
												<OPTION value="La Paz">La Paz - El Alto
												<OPTION value="Lisbonne">Lisbonne - Humberto Delgado
												<OPTION value="londres" selected="selected">Londres - London City Airport
												<OPTION value="Madrid" selected="selected">Madrid - Adolfo-Suarez
												<OPTION value="Marrakech">Marrakech - Menara
												<OPTION value="Rome">Rome - Leonardo Da Vinci
												<OPTION value="Tunis">Tunis - Carthage
												<OPTION value="Vienne">Vienne - Vienne-Schwechat
												<OPTION value="Yamassoukrou">Yamoussoukro - Aéroport international
											</select>
											
					<label style="margin-left:50px;" id="cache">Date Retour</label><input name="dateretour" type="date" id="cache2" min="2018-03-21" max="2018-07-10"><br><br>
					<label>Classe</label><SELECT name="classevoyage" class="select" size="1">
										<OPTION value="Economique" selected="selected">Economique
										<OPTION value="Premium">Premium €
										<OPTION value="Business">Business € €
										<OPTION value="Premièreclasse">1ère classe € € €
										</select><input type="submit" name="envoyer" value="Rechercher">
					</form>
			</div><br><br><br>
			<center>
				<div class="partiedecouvrir" style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:13px;">
						<center>
								<br><span><b>KB Travel Agency</b></span> est en cours de développement et vous offrira dans quelques mois un service 100% sûr et fonctionnel.<br>
								Une recherche de vols rapide et à jour, c'est notre objectif que nous tentons de mettre en oeuvre. <br><br>
								Le site comportera plusieurs fonctionnements qui sont listés sous-dessous:<br><br>
								- Recherche avancée de vols enregistrés dans une base de donnée<br>
								- Mise en place d'un système de membres "Visiteur" et "Administrateur"(connexion, inscription)<br>
								- Création d'une file d'actualité partagée par les membres enregistrées<br>
								- <br><br>
								A voir
						</center>			
				</div>
			</center>
<?php include('footer.php'); ?>
	</body>
</html>
