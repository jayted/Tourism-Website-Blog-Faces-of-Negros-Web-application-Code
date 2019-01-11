<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=tourist;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
