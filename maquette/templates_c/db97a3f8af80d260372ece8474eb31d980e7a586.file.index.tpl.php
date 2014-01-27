<?php /* Smarty version Smarty-3.1.15, created on 2014-01-27 21:02:41
         compiled from "tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10262528a0ac6449dd7-46456553%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db97a3f8af80d260372ece8474eb31d980e7a586' => 
    array (
      0 => 'tpl\\index.tpl',
      1 => 1390856560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10262528a0ac6449dd7-46456553',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_528a0ac66484a9_58483772',
  'variables' => 
  array (
    'recherche' => 0,
    'total_article' => 0,
    'articles' => 0,
    'article' => 0,
    'connecte' => 0,
    'page' => 0,
    'nb_pages' => 0,
    'p' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_528a0ac66484a9_58483772')) {function content_528a0ac66484a9_58483772($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\wamp\\www\\licencepro\\maquette\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE ><html>
	
	<head></head>
	
	<body>
		<?php if ($_smarty_tpl->tpl_vars['recherche']->value==true) {?>
		<h2>Recherche</h2>
			<?php if ($_smarty_tpl->tpl_vars['total_article']->value==0) {?>
				<p>L'article que vous recherchez n'existe pas !</p>
			<?php } elseif ($_smarty_tpl->tpl_vars['total_article']->value==1) {?>
				<p>Il y a 1 article</p>
			<?php } else { ?>
				<p>Il y a <?php echo $_smarty_tpl->tpl_vars['total_article']->value;?>
 articles</p>
			<?php }?>
		<?php } else { ?>
		<h2>Accueil</h2>
		<?php }?>
		
		<?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['articles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value) {
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
			<h3><?php echo $_smarty_tpl->tpl_vars['article']->value['titre'];?>
</h3><h6>tag: <?php echo $_smarty_tpl->tpl_vars['article']->value['tag'];?>
</h6>
			 <?php if ($_smarty_tpl->tpl_vars['article']->value['image']) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" target="_blank">
                <img alt="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
" src="<?php echo $_smarty_tpl->tpl_vars['article']->value['image'];?>
"  width="250" height="250"  style="float: left; margin : 1em;"/>
            </a>
           	<?php }?>
			<br><?php echo $_smarty_tpl->tpl_vars['article']->value['texte'];?>

			<div class="spacer"></div> <!--Permet de retourner à la ligne au cas où le texte à coté de l'image ne serait pas assez grand -->
			<br>Rédigé le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['article']->value['date']," %e %b %Y");?>

			<?php if ($_smarty_tpl->tpl_vars['connecte']->value==true) {?>
				<form method=GET action='article.php'>
				<input type='hidden' name='id' value='<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
'>
			 	<br><input type='submit' value='Modifier' class='btn btn-large btn-primary'>
			 	<a href ='supprimer_article.php?id=<?php echo $_smarty_tpl->tpl_vars['article']->value['id'];?>
' class='btn btn-large btn-primary' style='background-color : red;'>Supprimer</a>
			 	 </form>
			<?php }?>

		<?php } ?>
		<br><br>
		<?php if ($_smarty_tpl->tpl_vars['page']->value>$_smarty_tpl->tpl_vars['nb_pages']->value) {?> <div class='alert alert-info'>Aucun article ici !</div><?php }?>
		<ul id='pagination'>
		<?php if ($_smarty_tpl->tpl_vars['page']->value>1&&$_smarty_tpl->tpl_vars['page']->value<=$_smarty_tpl->tpl_vars['nb_pages']->value) {?>
			<li class='precedent'><a href='index.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value-1;?>
'>Précédent</a></li> <?php }?>
		<?php $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['p']->step = 1;$_smarty_tpl->tpl_vars['p']->total = (int) ceil(($_smarty_tpl->tpl_vars['p']->step > 0 ? $_smarty_tpl->tpl_vars['nb_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['p']->step));
if ($_smarty_tpl->tpl_vars['p']->total > 0) {
for ($_smarty_tpl->tpl_vars['p']->value = 1, $_smarty_tpl->tpl_vars['p']->iteration = 1;$_smarty_tpl->tpl_vars['p']->iteration <= $_smarty_tpl->tpl_vars['p']->total;$_smarty_tpl->tpl_vars['p']->value += $_smarty_tpl->tpl_vars['p']->step, $_smarty_tpl->tpl_vars['p']->iteration++) {
$_smarty_tpl->tpl_vars['p']->first = $_smarty_tpl->tpl_vars['p']->iteration == 1;$_smarty_tpl->tpl_vars['p']->last = $_smarty_tpl->tpl_vars['p']->iteration == $_smarty_tpl->tpl_vars['p']->total;?>
			<li><a href='index.php?p=<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['p']->value;?>
</a></li>
		<?php }} ?>
		<?php if ($_smarty_tpl->tpl_vars['page']->value<$_smarty_tpl->tpl_vars['nb_pages']->value) {?> 
			<li class='suivant'><a href='index.php?p=<?php echo $_smarty_tpl->tpl_vars['page']->value+1;?>
'>Suivant</a> </ul>  <?php }?>
	</body>
</html><?php }} ?>
