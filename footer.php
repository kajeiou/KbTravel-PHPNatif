<?php
 if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) { 
 echo '<br><br><br>
		<div class="footer">
			<center>
				<b><br><ul>
							<a href="decouvrir.php#histoire"><li>La Compagnie et son Histoire</li></a>
							<a href="decouvrir.php#choisir"><li>Pourquoi nous choisir ?</li></a>
							<a href="decouvrir.php#createurs"><li>Les créateurs</li></a>
						</ul>
						<ul>
							<a href=""><li></li></a>
							<a href="decouvrir.php#contact"><li>Nous contacter</li></a>
						</ul>
						<ul>
							<a href="monprofil.php"><li>Mon Profil</li></a>
							<a href="mesparametres.php"><li>Mes paramètres</li></a>
							<a href="deconnexion.php"><li>Déconnexion</li></a>
						</ul></br><br></br><br><br>
				© 2017 - 2018 KB Travel Agency. <br>All right Reserved par Nabil et Kévin.<br><br>		
				</b>
				<p style="float:right;padding-right:20px;">
					<b>Nos statistiques :</b><br>
					Nombre total de visiteurs: X<br>
					Nombre de visiteur aujourd\'hui: X
				</p>
			</center>
</div>';}
else {echo '		<br><br><br>
		<div class="footer">
			<center>
				<b><br><ul>
							<a href="decouvrir.php#histoire"><li>La Compagnie et son Histoire</li></a>
							<a href="decouvrir.php#choisir"><li>Pourquoi nous choisir ?</li></a>
							<a href="decouvrir.php#createurs"><li>Les créateurs</li></a>
						</ul>
						<ul>
							<a href=""><li></li></a>
							<a href="decouvrir.php#contact"><li>Nous contacter</li></a>
						</ul>
						<ul>
							<a href="connexion.php"><li>Se connecter</li></a>
							<a href=""><li></li></a>
							<a href="inscription.php"><li>S\'inscrire</li></a>
						</ul></br><br></br><br><br>
				© 2017 - 2018 KB Travel Agency. <br>All right Reserved par Nabil et Kévin.<br><br>		
				</b>
				<p style="float:right;padding-right:20px;">
					<b>Nos statistiques :</b><br>
					Nombre total de visiteurs: X<br>
					Nombre de visiteur aujourd\'hui: X
				</p>
			</center>
</div>';}
?>