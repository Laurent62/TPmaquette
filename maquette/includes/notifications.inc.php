<?php
	require_once('includes/header.php'); 

	if(isset($_SESSION['article'])){
		switch($_SESSION['article']){
			case 'ajouter';
				echo"<div class='alert alert-info' id='notif'>Votre article a bien été ajouté !</div>";
				break;
			case 'modifier':
				echo"<div class='alert alert-success' id='notif'>Votre article a bien été modifié !</div>";
				break;
			case 'supprimer':
				echo"<div class='alert alert-danger' id='notif'>Votre article a bien été supprimé !</div>";
				break;
			case 'erreur':
				echo"<div class='alert alert-error' id='notif'>Erreur : Contacter l'administrateur du site</div>";
				break;
			 default: echo"<div class='alert alert-info' id='notif'>Commande inconnue</div>";
		}
		unset($_SESSION['article']);
	}
	
	else if(isset($_SESSION['connexion'])){
		switch($_SESSION['connexion']){
			case 'co';
				echo"<div class='alert alert-success' id='notif'>Vous êtes connecté !</div>";
				break;
			case 'deco':
				echo"<div class='alert alert-info' id='notif'>Vous avez été déconnecté, à bientôt !</div>";
				break;
			case 'no_user':
				echo"<div class='alert alert-danger' id='notif'>Le nom d'utilisateur ou le mot de passe est incorrect</div>";
				break;
			default: echo"<div class='alert alert-info' id='notif'>Commande inconnue</div>";
		}
	unset($_SESSION['connexion']);
	}
	else { echo"<div id='notif'></div>"; }
	
	$croix ="<a href'#' class='cacher_notif'>&times;</a>";
	
?>