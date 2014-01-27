<?php
	require_once('includes/header.php'); 
	
	if($connecte==true){
		$id=mysql_real_escape_string(var_get('id'));
		echo $id;
		$sql="DELETE FROM articles WHERE id=".$id.";";
		
		mysql_query($sql);
		echo mysql_error();
		//var_dump($_POST);
		$_SESSION['article']='supprimer';
	}
		header('Location:index.php');
		exit();

