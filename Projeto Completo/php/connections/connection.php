<?php

	//Conexão com bando de dados usando 'PDO'
	try
	{
		$db = new PDO 
		("mysql:dbname=fashionstore_db;charset=UTF8;host=localhost","root","");
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
    }
	
?>