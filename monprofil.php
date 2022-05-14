<?php session_start(); include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
	$requete = $bdd->prepare('SELECT * FROM membres where utilisateur = :utilisateur');
	$requete->execute(array(':utilisateur' => $_SESSION['utilisateur']));
	$resultat = $requete->fetch();
	echo '<center>
			<div class="partiedecouvrir">
				<h4>Mon profil</h4>
			</div><br>
			<br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5); color:rgba(52, 94, 137, 1);">
				<div><center><img src="img/avatar.png" height="170px" width="170px" style=""></center></div><br><br>
				<div style="width:70%;vertical-align: top; background-color:rgba(52, 94, 137, 0.8);color: #fefefe; padding-top:30px;padding-bottom:25px;border-radius:4px;">
					<label><b>Nom d\'utilisateur:</b></label>'.$resultat['utilisateur'].'<br><br>
					<label><b>Nom de famille:</b></label>'.$resultat['nom'].'<br><br>
					<label><b>Prénom:</b></label>'.$resultat['prenom'].'<br><br>
					<label><b>Email:</b></label>'.$resultat['email'].'<br><br>
					<label><b>Date d\'inscription:</b></label>'.$resultat['dateinscription'].'<br><br><br>
					<a href="mesparametres.php"><input type="submit" value="Modifier mon profil"></a>
				</div>
			</div><br>
			
		</center>';include('footer.php');
		echo '</body>
</html>';
}
else {
	header('Location:index.php');}
	?>