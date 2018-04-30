<?php 
	$con = new PDO('mysql:host=localhost;dbname=femily', 'root', '');
	$con->query("create table friends(
			id int(11) auto_increment primary key,
			name varchar(30) not null,
			address varchar(50) not null,
			age int(5) not null)
		");
	