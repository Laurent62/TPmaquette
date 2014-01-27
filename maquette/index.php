	<?php 
	include('includes/header.php');
	require ('libs/Smarty.class.php');
	$smarty = new Smarty();
	$smarty->setTemplateDir('tpl');	// Chercher dans le dossier tpl
		
	/*Pagination*/
	//Il y en a {$app}
	
	$app=2;																	//Nombre d'article par page
	$page=(var_get('p'))?var_get('p'):1;
	$debut= (($page -1)*$app);
	$total= mysql_query("SELECT count(*) AS total FROM articles");
	$total = mysql_fetch_array($total);
	$total = $total['total'];
	$nb_pages= (($total>0)?ceil($total/$app):1);
	
	$recherche=false;
	
	if(var_get('r')){
		$recherche=true;
		$rech=mysql_real_escape_string($_GET['r']);
		$result=mysql_query("SELECT A.id, A.titre, A.texte, A.date, T.nom_tag "
							."FROM articles A, tags T, articles_tags AT "
							."WHERE A.id=AT.article_id "
							."AND T.id=AT.tag_id "
							."AND titre LIKE '%".$rech."%' "
							."ORDER BY A.date DESC LIMIT ".$debut.",".$app.";");

		$nbarticle=mysql_query("SELECT count(*) AS total FROM articles WHERE titre LIKE '%".$rech."%';");
		$data=mysql_fetch_array($nbarticle,MYSQL_ASSOC);
		$total=htmlspecialchars($data['total']);
		$smarty->assign('total_article', $total);
	}
	else{
		$result=mysql_query("SELECT A.id, A.titre, A.texte, A.date, T.nom_tag "
							."FROM articles A, tags T, articles_tags AT "
							."WHERE A.id=AT.article_id "
							."AND T.id=AT.tag_id "
							."ORDER BY A.date DESC LIMIT ".$debut.",".$app.";");
		}
	
	$smarty->assign('recherche', $recherche);
	$articles = array();
	$i=0;
	echo mysql_error();
	while ($data=mysql_fetch_array($result)){
		$texte=htmlspecialchars($data['texte']);
		$texte=str_replace("\n","<br>",$texte);
		$titre=htmlspecialchars($data['titre']);
		$titre=str_replace("\n","<br>",$titre);
		
		$articles[$i]['id']=$data['id'];
		$articles[$i]['titre']=$titre;
		$articles[$i]['texte']=$texte;
		$articles[$i]['date']=$data['date'];
		$articles[$i]['tag']=$data['nom_tag'];
		$articles[$i]['image']=(file_exists(dirname(__FILE__)."/data/images/".$data['id'].".jpg")) ? "./data/images/".$data['id'].".jpg" : false;
		$i++;
	}
		
	
	mysql_free_result($result);  

	$smarty->assign('page', $page);
	$smarty->assign('nb_pages', $nb_pages);
	$smarty->assign('connecte', $connecte);
	$smarty->assign('articles', $articles);
	$smarty->display('index.tpl'); // Afficher le contenu d'index.tpl
    include ('includes/footer.php'); ?>   