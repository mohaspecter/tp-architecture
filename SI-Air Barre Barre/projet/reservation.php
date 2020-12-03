<?php 
	session_start();
	if(!isset($_SESSION['id_user']) OR empty($_SESSION['id_user'])){
		header("Location:connexion.php");
		exit();
	}

	if(!isset($_POST['id_vol'])){
		header('Location:index.php');
		exit();
	}

	//PHP TO insert data
	$id_user =  $_SESSION['id_user'];
	$id_vol = $_POST['id_vol'];

	$reqinsert = $bdd->prepare("INSERT INTO user_vol(id_user,id_vol) (?,?)");

	try{
	    $bdd->beginTransaction();
	    $reqinsert->execute(array($id_user,$id_vol)));
	    $bdd->commit();
	}catch(Exception $e){
	    $bdd->rollback();
	    $_SESSION['error'] = $error;
	    Utils::redir('index.php');
	    exit;
	}

	header("Location:user.php");
?>
