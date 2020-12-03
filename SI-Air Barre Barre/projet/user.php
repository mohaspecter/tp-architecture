<?php 
require_once('user_controller.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
	<link rel="stylesheet" type="text/css" href="index.css">
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
			<div class="vol" >
				<div class="vol_ban">
					<h3><?= $vols["depart"]." - ".$vols['arrivee']?></h3>
				</div>
				<div class="vol_ban">
					<span><?= $vols['prix'] ?></span>
				</div>
			</div>
			<?php
			}
			?>
		</div>	
	</div>
</body>
</html>