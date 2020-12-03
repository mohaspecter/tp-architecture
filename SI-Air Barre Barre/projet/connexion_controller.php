<?php 
	session_start();
	require_once('class/loadClass.php');

	if(!isset($_POST['user']))
		header('Location:connexion.php');

    $bdd = new BDD();
    $bdd = $bdd->get_bdd();

	$user = trim(htmlspecialchars($_POST['user']));

	$req = $bdd->prepare("SELECT id_user FROM v_user WHERE nom_user=?");
	$req->execute(array($user));

	if($req->rowCount() == 1){
		$_SESSION['id_user'] = $req->fetch()['id_user'];
		header("Location:user.php");
	}else{
		header("Location:connexion.php");
	}
?>