<?php

$user = 'root';
$password = '1234'; //To be completed if you have set a password to root
$database = 'nantes'; //To be completed to connect to a database. 
$port = 3306; //Default must be NULL to use default port
$mysqli = new mysqli('127.0.0.1', $user, $password, $database, $port);

$suppr = filter_input(INPUT_POST, 'suppr');


$sql = " DELETE FROM equipements WHERE idobj = $suppr";


if($result = $mysqli->query($sql))
{
    echo 'Ligne Supprimée';
}
else
{
    echo '<p>La recherche na pas marchée</p>';
}

$mysqli->close();

?>