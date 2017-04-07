<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="fr">
	
	<head>
		
		<meta charset="utf-8"/>
		<title>Jeu d'énigmes</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="style_menu.css" />
		<script type="text/javascript" src="js/fonctions.js"></script>

		
	
	</head>

	
	
	<body>

	<?php include("menu.php"); ?>

	<h1>Niveau 2</h1>
	<h2>Afrique - Sport/Loisir</h2>
	<form action="afrique_sport.php" method="POST">
	<div>
		<br>
		<label>Nous sommes 2 sœurs spécialistes du demi fond, et nous détenons toutes les deux un record du monde, quels sont nos prénoms ?</label>
		<input type="text" name="reponse" id="reponse" placeholder="Réponse" />
		<button name="submit" type="submit">Validez</button>
		</br>
	</form>

	<div>
		<button id="indice" name="" type="">Indice 1</button>
		<button id="indice" name="" type="">Indice 2</button>
		</div>
	</div>
	

	
		<?php

				require('param.php');
				include_once("reponses.php");
				
				if(isset($_SESSION['email']))
					{
						
						$email=$_SESSION['email'];
						
						//OUVERTURE DE LA CONNEXION MYSQL
				
						$connexion = mysql_connect($host, $user, $pass);


						if($connexion > 0)
						{
					
							//CHOIX DE LA BASE DE DONNEES
					
							$db=mysql_select_db($db,$connexion);
					
							if($db>0)
							{
						
							//REDACTION DES REQUETES
						
							$request="SELECT * FROM user WHERE email='$email'";
							$result=mysql_query($request);
							$res=mysql_fetch_array($result);
							$id=$res[0];
							$categorie='niveau 2';
							
							if(isset($_POST['submit']))
							{
								$reponse=$_POST['reponse'];

								$request1="INSERT INTO enigmes(numero,categorie,reponse) VALUES('$id','$categorie','$reponse')";
								$result1=mysql_query($request1,$connexion);

								if($reponse==$reponse_2_spo)
								{									
									$request="UPDATE user SET 2_spo='1' WHERE email='$email'";
									$result=mysql_query($request,$connexion);
									echo "<script>valid();</script>";
									echo "<a href='afrique_geographie.php'>Enigme suivante</a>";									

								}
								else
								{
									echo "<script>fail();</script>";
								}
							}
							
							}
						}
					}
					else
					{
						header("Location:connexion.php");
					}

					

	

	
	?>
		
		
	</body>

	
	
</html>