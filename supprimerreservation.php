<?php session_start(); include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	header('Location:index.php');
}
			$reponse = $bdd->prepare('SELECT * FROM reservations WHERE idvols =  ? AND idmembre = ?');
			$id = htmlspecialchars($_GET["id"]);
			$reponse->execute(
			array($id,$_SESSION['idmembre']));
			$existant = $reponse->rowCount();
			if($existant !=0) {	
				$supp = $bdd -> prepare('INSERT INTO historiquereservationssupprimer SELECT * from reservations WHERE idvols =  ? AND idmembre = ?');
				$supp = $bdd -> prepare('DELETE FROM reservations WHERE idvols =  ? AND idmembre = ?');
				$supp -> execute(array($id,$_SESSION['idmembre']));
				echo '<div class="erreur2" style="margin-top:-80px;">Vous avez correctement supprimer la réservation.</div>';
			}
			else{
				echo '<div class="erreur" style="margin-top:-80px;">La réservation a déjâ été supprimée ou est inexistante.</div>';
			}
				?>