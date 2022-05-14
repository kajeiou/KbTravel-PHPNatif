<?php session_start(); include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
	$requete = $bdd->prepare('SELECT * FROM membres where utilisateur = :utilisateur');
	$requete->execute(array(':utilisateur' => $_SESSION['utilisateur']));
	$resultat = $requete->fetch();
		if(isset($_POST['envoyer'])) {
			if(!empty($_POST['saisieuser']) AND !empty($_POST['saisieemail']) AND !empty($_POST['saisienom']) AND !empty($_POST['saisieprenom'])) {
				$saisieuser = htmlspecialchars($_POST['saisieuser']);
				$saisieemail = htmlspecialchars($_POST['saisieemail']);
				$saisienom = htmlspecialchars($_POST['saisienom']);
				$saisieprenom = htmlspecialchars($_POST['saisieprenom']);
				$connectionps = $bdd->prepare('UPDATE membres SET utilisateur = ?, nom = ?, prenom = ?, email = ? WHERE id ="'.$_SESSION['idmembre'].'"');
				$connectionps->execute(array($saisieuser, $saisienom, $saisieprenom, $saisieemail));
				$_SESSION['utilisateur'] = $saisieuser;
				header("refresh:0;url=mesparametres.php");
			}
			if(!empty($_POST['saisieuser']) AND !empty($_POST['saisieemail']) AND !empty($_POST['saisienom']) AND empty($_POST['saisieprenom'])) {
				$saisieuser = htmlspecialchars($_POST['saisieuser']);
				$saisieemail = htmlspecialchars($_POST['saisieemail']);
				$saisienom = htmlspecialchars($_POST['saisienom']);
				$connectionps = $bdd->prepare('UPDATE membres SET utilisateur = ?, nom = ?, email = ? WHERE id ="'.$_SESSION['idmembre'].'"');
				$connectionps->execute(array($saisieuser, $saisienom, $saisieemail));
				$_SESSION['utilisateur'] = $saisieuser;
				header("refresh:0;url=mesparametres.php");
			}
			if(!empty($_POST['saisieuser']) AND !empty($_POST['saisieemail']) AND empty($_POST['saisienom']) AND !empty($_POST['saisieprenom'])) {
				$saisieuser = htmlspecialchars($_POST['saisieuser']);
				$saisieemail = htmlspecialchars($_POST['saisieemail']);
				$saisieprenom = htmlspecialchars($_POST['saisieprenom']);
				$connectionps = $bdd->prepare('UPDATE membres SET utilisateur = ?, prenom = ?, email = ? WHERE id ="'.$_SESSION['idmembre'].'"');
				$connectionps->execute(array($saisieuser, $saisieprenom, $saisieemail));
				$_SESSION['utilisateur'] = $saisieuser;
				header("refresh:0;url=mesparametres.php");
			}
			if(!empty($_POST['saisieuser']) AND !empty($_POST['saisieemail']) AND empty($_POST['saisienom']) AND empty($_POST['saisieprenom'])) {
				$saisieuser = htmlspecialchars($_POST['saisieuser']);
				$saisieemail = htmlspecialchars($_POST['saisieemail']);
				$connectionps = $bdd->prepare('UPDATE membres SET utilisateur = ?, email = ? WHERE id ="'.$_SESSION['idmembre'].'"');
				$connectionps->execute(array($saisieuser,$saisieemail));
				$_SESSION['utilisateur'] = $saisieuser;
				header("refresh:0;url=mesparametres.php");
			}
			else {
				echo '<div class="erreur" style="margin-top:-100px">Veuillez remplir au moins le nom d\'utilisateur et l\'émail.</div>';
			}
		}
		if(isset($_POST['envoyer2'])) {
			if(!empty($_POST['saisieancienmdp']) AND!empty($_POST['saisienouveaumdp'])AND !empty($_POST['saisieconfmdp'])) {
				if($_POST['saisieancienmdp'] == $_SESSION['motdepasse']){
					if($_POST['saisienouveaumdp'] !== $_SESSION['motdepasse']) {
						if($_POST['saisienouveaumdp'] == $_POST['saisieconfmdp'])  {
							$nouveaumdp = htmlspecialchars($_POST['saisieconfmdp']);
							$connectionps = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE id ="'.$_SESSION['idmembre'].'"');
							$connectionps->execute(array($nouveaumdp));
							$_SESSION['motdepasse'] = $nouveaumdp;
							echo '<div class="erreur2" style="margin-top:-100px">Votre mot de passe a été changé avec succès.</div>';
						}
						else { 
							echo '<div class="erreur" style="margin-top:-100px">Les deux nouveaux mots de passe ne correspondent pas.</div>';
						}
					}
					else { 
						echo '<div class="erreur" style="margin-top:-100px">L\'ancien mot de passe ne peut pas être égal au nouveau mot de passe.</div>';
					}
				}
				else {
					echo '<div class="erreur" style="margin-top:-100px">L\'ancien mot de passe que vous avez renseigné est incorrecte.</div>';
				}
			}
			else {
				echo '<div class="erreur" style="margin-top:-100px">Veuillez remplir tous les champs.</div>';
			}
		
		}
	echo '<center><br>
			<div class="partiedecouvrir">
				<h4>Mon avatar</h4>
			</div><br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5); color:rgba(52, 94, 137, 1);">
				<br><img src="img/avatar.png" height="100px" width="100px"><br><br><input type="submit" value="Choisir un fichier.." style="width:300px"><br><p style="margin-top:5px">Les images sont acceptés au format: jpg, png, gif.</p>
			</div><br>
			<div class="partiedecouvrir">
				<h4>Mes préférences</h4>
			</div><br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5); color:rgba(52, 94, 137, 1);">
			<br><br>
				<form action="" method="post" class="authentification" >
				<b>
					<label>Utilisateur</label><input type="text" minlength="5" size="5" maxlength="10" name="saisieuser" value="'.$resultat['utilisateur'].'"/><br><br>
					<label>Nom</label><input type="text" minlength="5" size="5" maxlength="10" name="saisienom" value="'.$resultat['nom'].'"/><br><br>
					<label>Prénom</label><input type="text" minlength="5" size="5" maxlength="10" name="saisieprenom" value="'.$resultat['prenom'].'"/><br><br>
					<label>Email</label><input type="email" minlength="6" size="5" maxlength="30" name="saisieemail" value="'.$resultat['email'].'"/><br><br>
					<br><br>
					<input type="submit" name="envoyer" value="Enregistrer mes informations" style="width:210px"/>
				</b>
				</form>
			</div><br><br>
			<div class="partiedecouvrir">
				<h4>Mon mot de passe</h4>
			</div><br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5);color:rgba(52, 94, 137, 1);">
			<br><br>
				<form action="" method="post" class="authentification">
				<b>
					<label>Ancien Mot de Passe</label><input type="password" minlength="5" size="5" maxlength="10" name="saisieancienmdp" /><br><br><br><br>
					<label>Nouveau Mot de Passe</label><input type="password" minlength="5" size="5" maxlength="10" name="saisienouveaumdp" /><br><br>
					<label>Confirmation du Mot de Passe</label><input type="password" minlength="5" size="5" maxlength="10" name="saisieconfmdp" /><br>
					<br><br>
					<input type="submit" name="envoyer2" value="Enregistrer mes informations" style="width:210px"/>
				</b>
				</form>
			</div>
		</center>';
		include('footer.php');
		echo '</body>
</html>';
}
else {
	header('Location:index.php');}
	?>