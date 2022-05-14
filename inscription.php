<?php session_start();
include('connexionbdd.php');  
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	header('Location:index.php');
} 
if(isset($_POST['envoyer'])) {
		if(!empty($_POST['saisieuser']) and !empty($_POST['saisiemdp']))
		{
			$saisieuser= htmlspecialchars($_POST['saisieuser']);
			$saisieemail= htmlspecialchars($_POST['saisieemail']);
			$saisiemdp= htmlspecialchars($_POST['saisiemdp']);
			$saisieconfmdp= htmlspecialchars($_POST['saisieconfmdp']);
			$ipuser = $_SERVER['REMOTE_ADDR'];
			$date = date("F j, Y, g:i a");
			if($saisiemdp == $saisieconfmdp) {
				$req = $bdd->prepare('INSERT INTO membres(utilisateur, statut,email,motdepasse,ip,dateinscription) VALUES(:utilisateur, :statut, :email, :motdepasse, :ip, :dateinscription)');
				$req->execute(array(
					'utilisateur' => $saisieuser,
					'statut' => "Normal",
					'email' => $saisieemail,
					'motdepasse' => $saisiemdp,
					'ip' => $ipuser,
					'dateinscription' => $date));
					if(isset($_COOKIE['idreservationchoisis'])) {
					header("refresh:4;url=reserver.php");
					echo '<div class="erreur2">Vous vous êtes inscrit avec succès, vous êtes redirigé à votre dernière activité...</div>';
					}
					if(empty($_COOKIE['idreservationchoisis'])) {
						header("refresh:4;url=index.php");
					echo '<div class="erreur2">Vous vous êtes inscrit avec succès, vous êtes redirigé dans 3 secondes...</div>';
					}
			}
			else{
				echo '<br><div class="erreur">Les deux mots de passes ne correspondent pas.</div>';
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
				<h4>Inscription à l'espace membre</h4>
			</div><br><br><br>
			<div class="partiedecouvrir">
				<br>
				<form action="" method="post" class="authentification">
				<br>
				<b><label>Utilisateur</label><input type="text" minlength="5" size="5" maxlength="10" name="saisieuser"><br><br>
				<label>Email</label><input type="email" minlength="6" size="5"maxlength="30"name="saisieemail"><br><br>
				<label>Mot de Passe</label><input type="password" minlength="5" size="5"maxlength="10" name="saisiemdp"/><br><br>
				<label>Confirmation MDP</label><input type="password" minlength="5" size="5"maxlength="10"name="saisieconfmdp" /><br><br><br>
				
				<input type="submit" name="envoyer" value="S'inscrire"/>
				</b></form>
			</div><br>
			<div class="partiedecouvrir">
				<h4>Rejoignez les <?php
							$requete = $bdd->prepare('SELECT * FROM membres');
							$requete->execute(array());
							$userexist = $requete->rowCount();
							echo $userexist;
				?> membres déjâ inscrits.</h4>
			</div>
		</center>
<?php include('footer.php'); ?>
	</body>
</html>