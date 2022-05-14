<?php session_start();
if(isset($_SESSION['utilisateur']) AND isset($_SESSION['motdepasse'])) {
	include('menumembre.php');
}
else {
	include('menu.php');}
?>
			
		<center>
		
			<div class="partiedecouvrir">
				<h4>Nos destinations</h4>
			</div><br>
			<div class="partiedecouvrir">
				<h4>Europe</h4>
			</div><br>
			<div class="partiedecouvrir" style="text-align:center;height:360px;background-color:rgba(255,255,255,0.7);">
				<br><br>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/berlin.JPG');"><center>Berlin</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/berne.jpg');"><center>Berne</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/bruxelles.jpg');"><center>Bruxelles</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/lisbonne.jpg');"><center>Lisbonne</center></div></a><br><br><br><br>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/londres.jpg');"><center>Londres</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/madrid.jpg');"><center>Madrid</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/rome.jpg');"><center>Rome</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/vienne.jpg');"><center>Vienne</center></div></a><br><br>
				
			</div><br><br><br>
			<div class="partiedecouvrir">
				<h4>Afrique</h4>
			</div><br>
			<div class="partiedecouvrir" style="text-align:center;height:360px;background-color:rgba(255,255,255,0.7);">
				<br><br>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/alger.jpg');"><center>Alger</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/marrakech.jpg');"><center>Marrakech</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/tunis.jpg');"><center>Tunis</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/yamoussoukro.jpg');"><center>Yamoussoukro</center></div></a><br><br>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
			</div><br><br><br>
			<div class="partiedecouvrir">
				<h4>Amérique</h4>
			</div><br>
			<div class="partiedecouvrir"style="text-align:center; height:360px;background-color:rgba(255,255,255,0.7);">
				<br><br>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/buenosaires.jpg');"><center>Buenos Aires</center></div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/newyork.jpg');">New York</div></a>
				<a href="#"><div class="listepays" style="background-image:url('img/Pays/lapaz.jpg');"><center>La Paz</center></div></a>
				<a href="#"><div class="listepays">Ville 4</div></a><br><br>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
				<a href="#"><div class="listepays">Ville 4</div></a>
			</div><br><br><br>
			<br>
		</center>
<?php include('footer.php'); ?>
	</body>
</html>

