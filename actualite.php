<?php session_start(); include('connexionbdd.php');
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	include('menu.php');}
	?>
			
		<center>
			<div class="partiedecouvrir">
				<h4>File d'actualité</h4>
			</div><br>
			<div class="partiedecouvrir">
				<h4>SITEMAP 01.05.2018</h4>
			</div>
			<div class="partiedecouvrir" style="background-color:rgba(255,255,255,0.5);">
			<br><br>
			<img style="width:97%;height:710px;" src="img/sitemap.png">
			<br><br><br><br><br>
			</div>
		</center>		
<?php include('footer.php'); ?>
	</body>
</html>

