<?php session_start();
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	header('Location=index.php');}
	include('connexionbdd.php');
	?>	
		<center>
			<div class="partiedecouvrir">
				<h4>Rechercher un utilisateur ou modifier l'ordre d'affichage</h4>
			</div><br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.6);">
			<br>
				<form action="recherchemembre.php" method="POST" class="affmembre">
					<label>Utilisateur: </label><input type="text" name="utilisateur">
					<label>Trier par: </label><select name="trie" class="select" size="1">
												<OPTION value="user">Nom d'utilisateur
												<OPTION value="statut">Statut
												<OPTION value="dateinscription">Date d'inscription</select>
					<label>Ordre: </label><select name="ordre" class="select" size="1" style="margin-right:40px">
												<OPTION value="croissant">Croissant
												<OPTION value="decroissant">Décroissant</select>
					<input type="submit" name="envoyer"><br><br>
				</form>
			</div><br><br>
			<div class="partiedecouvrir">
				<h4>Listes des membres</h4>
			</div><br>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.6);">
		<?php $reponse = $bdd->query('SELECT * from membres');
			echo '<table class="affichagemembre" style="margin-top:-80px">
						<tr>
							<td class="etiquette">Avatar</td><td class="etiquette">Utilisateur</td><td class="etiquette">Nom</td><td class="etiquette">Prénom</td><td class="etiquette">Statut</td><td class="etiquette">Date inscription</td>
						</tr>';
			while($donnees = $reponse->fetch()) {
				echo '
						<tr>
							<td class="afficher"><center><a href="#"><img src="img/avatar.png" height="50px"width="60px"></a></center></td><td class="afficher">'.$donnees['utilisateur'].'</td><td class="afficher">'.$donnees['nom'].'</td><td class="afficher">'.$donnees['prenom'].'</td><td class="afficher">'.$donnees['statut'].'</td><td class="afficher">'.$donnees['dateinscription'].'</td>
						</tr><br>';
			}
		?>
			</table><br><br>
			</div>
		</center>		
<?php include('footer.php'); ?>
	</body>
</html>

