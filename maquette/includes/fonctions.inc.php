<?php 

function var_get($nom){
	return ((isset($_GET[$nom]) && $_GET[$nom]) ? $_GET[$nom] : false);
}

function var_post($nom){
	return ((isset($_POST[$nom]) && $_POST[$nom]) ? $_POST[$nom] : false);
}

function requete_notif($req,$var_notif,$val_notif){
	if(mysql_query($req))	$_SESSION[$var_notif]=$val_notif;
	else $_SESSION[$var_notif]='erreur';
}
?>
