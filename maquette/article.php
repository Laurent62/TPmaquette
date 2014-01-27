<?php
	require_once('includes/header.php'); 
	if(var_post('titre')){
		$titre=mysql_real_escape_string(var_post('titre'));
		$texte=mysql_real_escape_string(var_post('texte'));
		$tag=mysql_real_escape_string(var_post('tag'));
		if(var_post('id')){  
			$id=mysql_real_escape_string($_POST['id']);
			$sql="UPDATE articles SET titre='".$titre."',texte='".$texte."' WHERE id='".$id."'";
			var_dump($_FILES);
			//Ajout d'une image
			$id=mysql_insert_id();

			$filename=$_FILES['image']['tmp_name'];
			$destination=$_FILES['image']['name'];
			move_uploaded_file($filename, 'data/images/'.$id.'-'.$destination);
			//Modification d'article
			requete_notif($sql,'article','modifier');
			header('Location:index.php');
			exit();
		}
		else 
		{ $sql="INSERT INTO articles (titre, texte, date) VALUES('".$titre."','".$texte."',UNIX_TIMESTAMP())"; 
		requete_notif($sql,'article','ajouter');

		//Ajout d'une image
			//var_dump($_FILES);
			$id=mysql_insert_id();		
			$filename=$_FILES['image']['tmp_name'];
			$destination=$_FILES['image']['name'];
			move_uploaded_file($filename, 'data/images/'.$id.'.jpg');
		//Ajout du tag
			$ChercheIDTag=0;
			$ChercheIDTag= mysql_query("SELECT id FROM tags WHERE nom_tag='".$tag."'");	
			$ChercheIDTag=mysql_fetch_array($ChercheIDTag,MYSQL_ASSOC);					// On regarde si le tag existe déjà
			$ChercheIDTag=$ChercheIDTag["id"];
			
			if($ChercheIDTag==0){														//Si oui
				$sql="INSERT INTO tags (nom_tag) VALUES('".$tag."')"; 
				requete_notif($sql,'tags','ajouter');
			}
			
		//Table intermédiaire entre article et tag afin d'éviter la redondance 
			$DernierIDArticle = mysql_query("SELECT MAX(id) as maxid FROM articles");	  // Méthode sans doute à risque si un autre utilisateur post en même temps.
			$DernierIDArticle=mysql_fetch_array($DernierIDArticle,MYSQL_ASSOC);			 // Mais dans le cas d'un blog perso, pas de danger !
			$DernierIDArticle=$DernierIDArticle["maxid"];								// On récupère l'id du dernier article
			
			if($ChercheIDTag==0){														//Si le tag n'a pas été trouvé
	
				$DernierIDTag = mysql_query("SELECT MAX(id) as maxid FROM tags");	 				
				$DernierIDTag=mysql_fetch_array($DernierIDTag,MYSQL_ASSOC);				//On récupère l'id du dernier tag
				$DernierIDTag=$DernierIDTag["maxid"];
			}
			else $DernierIDTag=$ChercheIDTag;										
			
			$sql="INSERT INTO articles_tags (article_id, tag_id) VALUES('".$DernierIDArticle."','".$DernierIDTag."')"; 
			requete_notif($sql,'articles_tags','ajouter');
		
		//echo mysql_error();
		//var_dump($_POST);
		header('Location:index.php');
		exit();
		} 
	}
	else{
	
	
	$titre = '';
	$texte = '';
	if(var_get('id')){
	
		$id=mysql_real_escape_string(var_get('id'));
		$sql="SELECT * FROM articles WHERE id=".$id;		
		$data=mysql_fetch_array(mysql_query($sql));
		$titre = $data['titre'];
		$texte = $data['texte'];
		echo mysql_error();
		//extract($data);
	}
			
		$section_label =(var_get('id')) ? 'Modifier' : 'Ajouter';
		echo "<h3>".$section_label." un article</h3>";
if($connecte==true){

?>

<form method=POST action='article.php' enctype='multipart/form-data'>
	<div class="clearfix">

		<label for='titre'>Titre
			<div class='input'>
				<input type='text' name='titre' id='titre' value="<?php echo $titre; ?>">
		</label>
	</div>
	</div>

	<div class="clearfix">
		<label for='texte'>Contenu de l'article
			<div class='input'>
				<textarea name='texte' id='texte'><?php echo $texte; ?></textarea>
</label>	</div>
	</div>
	<?php
	if ($section_label == 'Ajouter') {// Si on ajoute un article, alors on peut ajouter un tag
		echo "<div class='clearfix'>	";
		echo "	<label for='tag'>Ajouter un tag";
		echo "	<div class='input'>	<input type='text' name='tag' id='tag'></label>	</div>";
		echo "</div>";
	}

	if ($section_label == 'Modifier')
		echo "
	<input type='hidden' name='id' value='" . $id . "'>
	";
	//Si on modifie l'article
	?>
	<div class='form-actions'>
		<input type='file' name='image' id='image' accept='image/*'>
		<br>
		<br>
		<input type='submit' value='<?php echo $section_label; ?>' class='btn btn-large btn-primary'>

	</div>
</form>

<script>
	$("form").submit(function(event) {
		console.log("Vérification contenu form");
		var titre = $("#titre").val() == '';
		var texte = $("#texte").val() == '';
		if (titre || texte) {
			console.log("Pas de titre ou de texte");
			return false;
		} else
			return true;
	});

</script>
<?php
} else header('Location:index.php');
require_once('includes/footer.php'); }
?>
