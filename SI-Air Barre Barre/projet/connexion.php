<!DOCTYPE html>
<html>
<head>
	<title>Connexion</title>
	<link rel="stylesheet" type="text/css" href="connexion.css">
</head>
<body>
	<form action="connexion_controller.php" method="post">
		<div id="nom_user">
			<input type="text" name="user" placeholder="Nom utilisateur">
		</div>
		<div id="button_send">
			<input type="submit" name="connexion" value="Connexion">
		</div>
	</form>
</body>
</html>