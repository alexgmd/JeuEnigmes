<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="fr">
	
	<head>
		
		<meta charset="utf-8"/>
		<title>Jeu d'énigmes</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style_menu.css" />
		<script type="text/javascript" src="js/fonctions.js"></script>

		
	
	</head>

	
	
	<body>
	<img class="displayed" src="image/asie.jpe" width="100%" height="100%">
	<div id="wrap">
	<div id="main" class="clearfix">
	<?php include("menu.php"); ?>

	<h1>Niveau 1</h1>
	<h2>Asie - Géographie</h2>
	<form action="asie_geographie.php" method="POST">
	<div>
		<br>
		<label>Je suis le toit du monde, qui suis-je ?</label>
		<input type="text" name="reponse" id="reponse" placeholder="Réponse" />
		<button name="submit" type="submit">Validez</button>
		</br>
	</form>

	<div>
		<button id="indice" name="indice1" type="">Indice 1</button>
		<button id="indice" name="indice2" type="">Indice 2</button>
		</div>
	</div>
	

	
		<?php

				require('param.php');
				include_once("reponses.php");
				include_once("fonctions.php");
				
				if(isset($_SESSION['email']))
					{
						
						$email=$_SESSION['email'];
						
						//OUVERTURE DE LA CONNEXION MYSQL
				
						$connexion = mysqli_connect($host, $user, $pass);


						if($connexion > 0)
						{
					
							//CHOIX DE LA BASE DE DONNEES
					
							$db=mysqli_select_db($connexion,$db);
					
							if($db>0)
							{
						
							//REDACTION DES REQUETES
						
							$request="SELECT * FROM user WHERE email='$email'";
							$result=mysqli_query($request);
							$res=mysqli_fetch_array($result);
							$id=$res[0];
							$categorie='niveau 1';
							
							if(isset($_POST['submit']))
							{
								$reponse=$_POST['reponse'];

								$request1="INSERT INTO enigmes(numero,categorie,reponse) VALUES('$id','$categorie','$reponse')";
								$result1=mysqli_query($connexion,$request1);

								if($reponse==$reponse_1_geo)
								{									
									$request="UPDATE user SET 1_geo='1' WHERE email='$email'";
									$result=mysqli_query($connexion,$request);
									echo "<script>valid();</script>";
									echo "<br><a href='asie_personnagepublic.php'>Enigme suivante</a>";									

								}
								else
								{
									echo "<script>fail();</script>";
								}
							}
							if(isset($_POST['indice1']))
							{
								$indice1="8848m";
								$point=pt_indice($res,$indice1);
								$score=points($res)-$point;
								$request2="UPDATE user SET score='$score' WHERE email='$email'";
								$result2=mysqli_query($connexion,$request2);
								echo "<p>Il vous reste ".$score." point(s) !</p>";
							}

							if(isset($_POST['indice2']))
							{
								$indice2="Népal";
								$point=pt_indice($res,$indice2);
								$score=points($res)-$point;
								$request2="UPDATE user SET score='$score' WHERE email='$email'";
								$result2=mysqli_query($connexion,$request2);
								echo "<p>Il vous reste ".$score." point(s) !</p>";
							}
							}
						}
					}
					else
					{
						header("Location:connexion.php");
					}

					

	

	
	?>
	</div>
	</div>
	<?php include("footer.php"); ?>	
		
	</body>

	
	
</html>