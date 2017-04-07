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
		<div id="wrap">
			<div id="main" class="clearfix">

	<?php include("menu.php"); 

				require('param.php');
				include_once("reponses.php");
				include_once('fonctions.php');
				
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
							echo "<br><div id='connect'><p>Bonjour ".$res['username']." !</p>";
							
							echo "<a href='deconnexion.php'>Se déconnecter</a></div>";


								//CALCUL DES POINTS ACCUMULES

								$points=points($res);
								$request1="UPDATE user SET score='$points' WHERE email='$email'";
								$result1=mysqli_query($request1);

								//TABLEAU
								
								$request2="SELECT * FROM user ORDER BY score DESC";
								$result2=mysqli_query($request2);
								$rang=0;

								echo "<table width='40%' align='center'>";
									echo "<tr>";
									echo "<td> <b>Position</b> </ td>";
									echo "<td> <b>Pseudo </b></ td>";
									echo "<td> <b>Score </b></ td>";
									echo "</tr>";
									
									while ($res2 = mysqli_fetch_array($result2))
									{
										$rang++;
										echo "<tr>";
										echo "<td>".$rang."</ td>";
										echo "<td>".$res2['username']."</ td>";
										echo "<td>".$res2['score']."</ td>";
										echo "</tr>";
									} 
								echo "</table>";
							
							
							
							
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

	<?php include("footer.php");
	?>
		
	<img class="displayed" src="image/ocean.jpe" width="100%" height="100%">
	</body>

	
	
</html>