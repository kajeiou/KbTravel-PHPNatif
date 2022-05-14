<?php session_start(); include('connexionbdd.php');  

	if(empty($_COOKIE['idreservationchoisis'])) {
		// header('Location: index.php');
		echo 'Erreur';
	}
	if(isset($_COOKIE['idreservationchoisis'])) {
		if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
			include('menumembre.php');
		}
		else {
			include('menu.php');
		}
	
		if(isset($_SESSION['idmembre'])) {
			$reponse = $bdd->prepare('SELECT * FROM reservations WHERE idmembre = ? AND idvols = ?');
			$reponse->execute(
			array($_SESSION['idmembre'],$_COOKIE['idreservationchoisis']));
			$existant = $reponse->rowCount();
			if($existant == 0) { 
			$idreservationchoisi = $_COOKIE['idreservationchoisis']; 
			$req = $bdd->prepare('INSERT INTO reservations(idmembre,idvols) VALUES(:idmembre, :idvols)');
			$req->execute(array(
					'idmembre' => $_SESSION['idmembre'],
					'idvols' => $idreservationchoisi));
					setcookie('idreservationchoisis');
					unset($_COOKIE['idreservationchoisis']);
			echo '<div class="erreur2" style="margin-top:-80px;">Le vols que vous avez sélectionné a bien été ajouté à vos réservations.</div>';
			}
			else {
				echo '<div class="erreur" style="margin-top:-80px;">Une erreur est survenue, vous avez déjâ réserver pour ce vols.</div>';
			}
		}
		if(empty($_SESSION['idmembre'])) {
			echo '<div class="erreur" style="margin-top:-80px;">Vous devez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> pour continuer votre recherche.</div>';
		}
	}
?>