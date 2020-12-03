<?php 
session_start();
 require_once('class/loadClass.php');

    $bdd = new BDD();
    $bdd = $bdd->get_bdd();

    if(!isset($_SESSION['id_user']))
    	header('Location:connexion.php');


    $req = $bdd->query("
        SELECT DISTINCT
        	u.id_user,
        	u.nom_user,
        	v.depart,
        	v.arrivee,
        	v.prix
        FROM v_user as u
        JOIN user_vol as uv ON u.id_user = uv.id_user
        JOIN vol as v ON v.id_vol = uv.id_vol
        WHERE u.id_user = ".$_SESSION['id_user']
    );

?>
