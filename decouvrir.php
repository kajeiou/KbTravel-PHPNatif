<?php session_start();
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	include('menu.php');}
?>
			
		<center>
			<div class="partiedecouvrir" id="histoire">
				<h4>La Compagnie et son Histoire</h4>
			</div><br>
			<div class="partiedecouvrir" style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;">
					<center>
							<br><span><b>KB Travel Agency</b></span> est une agence de voyage qui fut créée en 2017 par deux jeunes entrepreneurs motivés et déterminés.<br>
							L'agence est en lien avec les aéroports françaises, Charles de Gaulles, Beauvais et Orly. <br><br>On opére des vols vers les pays voisins de la France parmis quelques pays hors Europe.<br>
							Le but de cette création d'agence de voyage est de proposer des vols à des prix les moins cher du marché.<br><br>
					</center>			
			</div><br><br><br>
			<div class="partiedecouvrir" id="choisir">
				<h4>Pourquoi nous choisir ?</h4>
			</div><br>
			<div class="partiedecouvrir" style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;">
					<center>
							
							<br>Nous sommes une équipe entièrement engagée vers la réussite, ce pourquoi nous nous engageons à offrir un service de qualité à nos clients.<br>
							Notre force est la simplicité de notre interface, les produits que nous vous proposons. <br><br>Cela signifie que nous vous assurons de réserver le voyage qui conviendra le mieux à nos clients.<br>
					</center>			
			</div><br><br><br>
			<div class="partiedecouvrir" id="createurs">
				<h4>Le profil de nos créateurs</h4>
			</div><br>
			<div align="left"class="partiedecouvrir">
				<img src="img/avatarnabil.png" height="180px" weight="180px">
					<div class="descriptioncreateur">
						<p style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;">Nabil, 17 ans, élève en Terminale STMG spécialité Système d'Information et de Gestion. <br><br>Passionné par l'informatique, je souhaiterai poursuivre mes études par un DUT Informatique, ou un BTS Services Informatiques aux Organisations.</p>
					</div>
					<h3 style="padding-left:50px; font-family: Arial, 'Lucida Grande', sans-serif;font-size:13px;margin-top:10px;">Nabil   KAJEIOU</h3><br><br>
				<img src="img/avatarkevin.png" height="180px" weight="180px">
				<div class="descriptioncreateur">
						<p style="font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;font-size:11px;">Kévin, 19 ans, élève en Terminale STMG spécialité Système d'Information et de Gestion. <br><br>Passionné par les langues et la culture étrangère, je souhaiterai poursuivre mes études par une Licence LEA ou une Licence étude hispano-américaine et hispanique.</p>
				</div>
				<h3 style="padding-left:50px; font-family: Arial, 'Lucida Grande', sans-serif;font-size:13px;margin-top:10px;">Kévin   ACUNA</h3><br><br>
			</div><br><br><br>
			<div class="partiedecouvrir">
				<h4>Les avis des utilisateurs</h4>
			</div><br>
			<div class="partiedecouvrir">
				<p style="font-size:12px"><span>Christian</span> a dit: "Je suis satisfais de ma recherche et j'ai obtenu ce que je voulais"<img src="img/citation.png" height="50px" width="60px"></p><br><br>
				<p style="font-size:12px;"><span>Chloé</span> a dit: "Je remercie cette entreprise, grâce à eux, j'ai pus voyager en sécurité!"<img src="img/citation.png" height="50px" width="60px"></p><br><br>
			</div><br><br><br>
			<div class="partiedecouvrir" id="contact">
				<h4>Nous contacter</h4>
			</div><br>
			<div class="partiedecouvrir"><br>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2623.9169165265075!2d2.3479384156750815!3d48.878860379289485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e6ba60c8ab5%3A0x8567909c00682848!2sLyc%C3%A9e+Technique+R%C3%A9gional+Jules+Siegfried!5e0!3m2!1sfr!2sfr!4v1520681279819" width="500" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
			<br><br>Adresse : 12 Rue d'Abbeville, 75010 Paris<br><br>
			Numéro mobile : 06 14 15 16 17<br><br>
			Numéro FAX : 06 14 15 16 17<br>
			</div>
		</center>
			
<?php include('footer.php'); ?>
	</body>
</html>

