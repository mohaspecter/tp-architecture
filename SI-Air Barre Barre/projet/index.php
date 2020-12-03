<?php
require_once("listVols.php");
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/index.css">
	<title>Air barre barre</title>
</head>
<body>
	<div id="top_ban">
		<h1>Air barre barre</h1>		
	</div>
	<div id="bottom_ban">
		<div id="list_vols">
			<?php 
			while($vols = $req->fetch()){
			?>
			<form class="vol" method="post" action="reservation.php">
				<div class="vol_ban">
					<h3><?= $vols["depart"]." - ".$vols['arrivee']?></h3>
					<input  type="hidden" name="id_vol" value="<?= $vols['id_vol'] ?>">
				</div>
				<div class="vol_ban">
					<span><?= $vols['prix'] ?></span>
				</div>
				<div class="vol_ban">
					<input type="submit" name="reservation" value="Réservation">
				</div>
			</form>
			<?php
			}
			?>
		</div>	
	</div>
</body>
</html>