<?php session_start();
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	include('menu.php');}
	include('connexionbdd.php'); 
$verif1 = $_COOKIE['typevoyage'];
$verif2 = $_COOKIE['lieudepart'];
if(empty($verif1) AND empty($verif2)) {
	header('Location:index.php');
}
?>
<center>
	<div class="partiedecouvrir">
		<h4>Recherche ...</h4><br><br>
	
<?php $typevoyage = $_COOKIE['typevoyage']; 
		$lieudepart = $_COOKIE['lieudepart'];
		$lieuarrive = $_COOKIE['lieuarrive'];
		$datedepart = $_COOKIE['datedepart'];
		$classevoyage = $_COOKIE['classevoyage'];
		if($typevoyage =="Aller-simple") {
			echo $typevoyage.'<br>'.$lieudepart.'<br>'.$lieuarrive.'<br>'.$datedepart.'<br>'.$classevoyage;
			$reponse = $bdd->prepare('SELECT * FROM listevols WHERE typevoyage = ? AND lieudepart = ? AND lieuarrive = ? AND datedepart = ? AND classevoyage = ?');
			$reponse->execute(
			array($typevoyage,$lieudepart, $lieuarrive, $datedepart, $classevoyage));
			$existant = $reponse->rowCount();
			if($existant !=0) {
				echo '</div><br>
				<div class="partiedecouvrir">'.$existant.' résultat(s)<br><br>';
				echo '<center><table class="affichagevols">
						<tr>
							<td class="etiquette">Type de voyage</td><td class="etiquette">Aéroport de départ</td><td class="etiquette">Aéroport d\'arrivé</td><td class="etiquette">Date Aller</td><td class="etiquette">Classe</td><td class="etiquette">Disponibilité</td>
						</tr>
						';
				while($donnees = $reponse->fetch()) {
				echo '
						<tr>
							<td class="afficher2">'.$donnees['typevoyage'].'</td><td class="afficher2">'.$donnees['lieudepart'].'</td><td class="afficher2">'.$donnees['lieuarrive'].'</td><td class="afficher2">'.$donnees['datedepart'].'</td><td class="afficher2">'.$donnees['classevoyage'].'</td>
							<form action="reserver.php" method="post"><td class="afficher2"><input name="ok" type="submit" value="Réserver"></td></form>
						</tr><br>';
					setcookie('idreservationchoisis', $donnees['id'], time() + 5000);
			}
			echo '</table></center><br><br>';
			}
			else {
				echo '<div class="erreur" style="margin-top:90px;color:red">Aucun vol trouvé avec ces critères renseignés.</div><br><br><br><br><br><a class="bouttonretour" href="index.php">Retour</a>';
			}
		}
		if($typevoyage =="Aller-retour") {
			$dateretour = $_COOKIE['dateretour'];
			echo $typevoyage.'<br>'.$lieudepart.'<br>'.$lieuarrive.'<br>'.$datedepart.'<br>'.$dateretour.'<br>'.$classevoyage;
			$reponse = $bdd->prepare('SELECT * FROM listevols WHERE typevoyage = ? AND lieudepart = ? AND lieuarrive = ? AND datedepart = ? AND dateretour = ? AND classevoyage = ?');
			$reponse->execute(
			array($typevoyage,$lieudepart, $lieuarrive, $datedepart,$dateretour, $classevoyage));
			$existant = $reponse->rowCount();
			if($existant !=0) {
				echo '</div><br><br><div class="partiedecouvrir">'.$existant.' résultat(s)<br><br>';
				echo '<center><table class="affichagevols" style="color:#F76161;;">
						<tr>
							<td class="etiquette">Type de voyage</td><td class="etiquette">Aéroport de départ</td><td class="etiquette">Aéroport d\'arrivé</td><td class="etiquette">Date Aller</td><td class="etiquette">Date Retour</td><td class="etiquette">Classe</td><td class="etiquette">Disponibilité</td>
						</tr>
						';
				while($donnees = $reponse->fetch()) {
				echo '
						<tr>
							<td class="afficher2">'.$donnees['typevoyage'].'</td><td class="afficher2">'.$donnees['lieudepart'].'</td><td class="afficher2">'.$donnees['lieuarrive'].'</td><td class="afficher2">'.$donnees['datedepart'].'</td><td class="afficher2">'.$donnees['dateretour'].'</td><td class="afficher2">'.$donnees['classevoyage'].'</td>
							<form action="reserver.php" method="post"><td class="afficher2"><input name="ok" type="submit" value="Réserver"></td></form>
						</tr><br>';
						setcookie('idreservationchoisis', $donnees['id'], time() + 5000);
				}
			echo '</table></center><br><br>';
			
			}
			else {
				echo '<div class="erreur" style="margin-top:100px;color:red">Aucun vol trouvé avec ces critères renseignés.</div><br><br><br><br><br><a class="bouttonretour" href="index.php">Retour</a>';
			}
		}		
?>
	</div>
</center>		
<?php include('footer.php'); ?>
</body>
</html>

