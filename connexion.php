<?php 
	session_start();
include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	header('Location:index.php');
}
if(isset($_POST['envoyer'])) {
		if(!empty($_POST['saisieuser']) and !empty($_POST['saisiemdp']))
		{
			$saisieuser= htmlspecialchars($_POST['saisieuser']);
			$saisiemdp= htmlspecialchars($_POST['saisiemdp']);
			$reponse = $bdd->prepare('SELECT * FROM membres WHERE utilisateur = ? AND motdepasse = ?');
			$reponse->execute(
			array($saisieuser,$saisiemdp));
			$existant = $reponse->rowCount();
			if($existant == 1) {
				$_SESSION['utilisateur'] = $saisieuser;
				$_SESSION['motdepasse'] = $saisiemdp;
				$resultat = $reponse->fetch();
				$_SESSION['idmembre'] = $resultat['id'];
				if(isset($_COOKIE['idreservationchoisis'])) {
					header("refresh:4;url=reserver.php");
					echo '<div class="erreur2">Vous vous êtes connecté avec succès, vous êtes redirigé à votre dernière activité...</div>';
				}
				if(empty($_COOKIE['idreservationchoisis'])) {
					header("refresh:4;url=index.php");
				echo '<div class="erreur2">Vous vous êtes connecté avec succès, vous êtes redirigé dans 3 secondes...</div>';
				}
			}
			else{
				echo '<div class="erreur">Les identifiants que vous avez renseignés sont incorrectes.</div>';
			}	
		}
		else{
			echo '<div class="erreur">Veuillez remplir tous les champs du formulaire.</div>';
		}
}
	include('menu.php');
?>
		<center>
			<div class="partiedecouvrir">
				<h4>Espace réservé aux membres</h4>
			</div><br><br><br>
			<div class="partiedecouvrir">
				<br><br>
				<form action="" method="post" class="authentification">
				<b>
					<label>Utilisateur</label><input type="text" minlength="5" size="5" maxlength="14" name="saisieuser" /><br><br>
					<label>Mot de Passe</label><input type="password" minlength="5" size="5" maxlength="15" name="saisiemdp" /><br>
					<br><br>
					<input type="submit" name="envoyer" value="Se connecter"/>
				</b>
				</form>
			</div><br>
			<div class="partiedecouvrir">
				<h4>Rejoignez les 0 membres actuellement connectés.</h4>
			</div><br>
		</center>
		<?php include('footer.php'); ?>
	</body>
</html>