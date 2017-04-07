<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="fr">
  
  <head>
    
    <meta charset="utf-8"/>
    <title> Jeu d'énigmes</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/style_menu.css" charset="utf-8" />
  
  </head>
  
  <body>
  <div id="wrap">
    <div id="main" class="clearfix">

  	<?php
		require('param.php');
		include_once('reponses.php');
		include_once('fonctions.php');
		include("menu.php");
	 ?>
<div align="center">
<h1>Contact</h1>

<form action="contact.php">
Titre<br><textarea name="titre" rows="1" cols="50"></textarea><br><br>
Message<br> <textarea name="message" rows="10" cols="50"></textarea><br>
<input type="submit" value="Envoyer">
</form> 
</div>
</div>
</div>
<?php include("footer.php"); ?>
  </body>

  
  
</html>