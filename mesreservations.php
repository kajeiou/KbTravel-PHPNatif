<?php session_start(); include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	header('Location:index.php');
	}
			$reponse = $bdd->prepare('SELECT * FROM reservations AS r, listevols AS l WHERE r.idvols = l.id AND r.idmembre = ?');
			$reponse->execute(
			array($_SESSION['idmembre']));
			$existant = $reponse->rowCount();
			if($existant !=0) {	
				echo '<center>
				<div class="partiedecouvrir">
					<h4>Mes réservations</h4>
				</div><br>
				<br>';
				while($donnees = $reponse->fetch()) {
					echo '<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5); color:rgba(52, 94, 137, 1);">
							<div style="width:50%;vertical-align: top; background-color:rgba(52, 94, 137, 0.8);color: #fefefe; padding-top:30px;padding-bottom:25px;border-radius:4px;">
							<label>ID du vols:</label>'.$donnees['idvols'].'<br><br>
							<label>Type de voyage:</label>'.$donnees['typevoyage'].'<br><br>
							<label>Lieu de départ:</label>'.$donnees['lieudepart'].'<br><br>
							<label>Lieu d\'arrivée:</label>'.$donnees['lieuarrive'].'<br><br>
							<label>Date de départ</label>'.$donnees['datedepart'].'<br><br>
							<label>Date de retour</label>'.$donnees['dateretour'].'<br><br>
							<label>Classe voyageur</label>'.$donnees['classevoyage'].'<br><br>
							<a href="supprimerreservation.php?id='.$donnees['idvols'].'"><input type="submit" value="Annuler la réservation" style="width:200px;"></a>
						</div>
					</div><br>';
				}
				
			echo '</table></center><br><br>';
			}
			else {
				echo '<div class="erreur" style="margin-top:-80px;">Vous n\'avez réservé aucun vols actuellement.</div>';
			}
			?>