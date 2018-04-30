<?php 
	$id = $_GET['id'];
	$con = new PDO('mysql:host=localhost;dbname=femily', 'root', '');
	$statement = $con->prepare('delete from friends where id=:id');
	$statement->execute([
	  ':id' => $id
	]);
	header('Location: /');

