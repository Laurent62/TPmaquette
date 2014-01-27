   </div>
          
          <nav class="span4">
            <h2>Menu</h2>
            <form action="index.php" method="get"> 
				Recherche : <br>
				<input type='text' name='r' placeholder='Informatique, ubuntu, ...' value="<?php echo (isset ($_GET['r'])) ? $rech : '';?>" class='span3'>&nbsp;
				<input type='submit' value ='OK' class='btn btn-primary'>
			</form>
            <ul>
                <li><a href="index.php">Accueil</a></li>
			<?php if ($connecte==true) {
				echo "<li><a href='article.php'>Rédiger un article</a></li>";
				echo "<li><a href='deconnexion.php'>Deconnexion</a></li>";	}
				else echo"<li><a href='connexion.php'>Connexion</a></li>"; ?>
            </ul>
            
          </nav>
        </div>
        
      </div>
      <footer>
        <p>&copy; <a href="http://www.laurentdubreuil.fr/" alt"LaurentDubreuil">Laurent Dubreuil</a>, blog de base par <a href="http://www.nilsine.fr/" alt"Nilsine" target="_blank">Nilsine</a></p>

      </footer>
      

    </div>

  </body>
</html>
