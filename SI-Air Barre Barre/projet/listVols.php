<?php
    require_once('class/loadClass.php');

    $bdd = new BDD();
    $bdd = $bdd->get_bdd();

    $req = $bdd->query("
        SELECT 
        	id_vol,
        	depart,
        	arrivee,
        	prix
        FROM vol
        "
    );

?>