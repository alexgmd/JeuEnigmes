<?php session_start(); ?>

<!DOCTYPE HTML>
<html lang="fr">
	
	<head>
		
		<meta charset="utf-8"/>
		<title>Jeu d'énigmes</title>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style_menu.css" />
		
	
	</head>

	
	
	<body>
		
		<div id="wrap">
			<div id="main" class="clearfix">
		
			<?php
			include("menu.php");

					require('param.php');
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
								echo "<br><div id='connect'><p>Bonjour ".$res['username']." !</p>";
								
								echo "<a href='deconnexion.php'>Se déconnecter</a></div>";
								
								// AVANCEE JEU
								echo "<br><table width='70%' align='center'>";
										echo "<tr>";
										echo "<td> <b>NIVEAU 1 - ASIE</b> </ td>";
										echo "<td> <b>NIVEAU 2 - AFRIQUE </b></ td>";
										echo "<td> <b>NIVEAU 3 - AMERIQUE</b></ td>";
										echo "<td> <b>NIVEAU 4 - EUROPE</b></ td>";
										echo "</tr>";

										echo "<tr>";
											if($res[5]==1||$res[5]==0)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[9]==1)
												echo "<td><a href='afrique_gastronomie.php'>Gastronomie</ td>";
											if($res[14]==1)
												echo "<td><a href='amerique_gastronomie.php'>Gastronomie</ td>";
											if($res[19]==1)
												echo "<td><a href='europe_gastronomie.php'>Gastronomie</ td>";
										echo "</tr>";
										echo "<tr>";
											if($res[5]==1)
												echo "<td><a href='asie_monument.php'>Monument</ td>";
											if($res[10]==1)
												echo "<td><a href='asie_gastronomie.php'>Monument</ td>";
											if($res[15]==1)
												echo "<td><a href='asie_gastronomie.php'>Monument</ td>";
											if($res[20]==1)
												echo "<td><a href='asie_gastronomie.php'>Monument</ td>";
										echo "</tr>";
										echo "<tr>";
											if($res[6]==1)
												echo "<td><a href='asie_sport.php'>Sport</ td>";
											if($res[11]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[16]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[21]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
										echo "</tr>";
										echo "<tr>";
											if($res[7]==1)
												echo "<td><a href='asie_geographie.php'>Géographie</ td>";
											if($res[12]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[17]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[22]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
										echo "</tr>";
										echo "<tr>";
											if($res[8]==1)
												echo "<td><a href='asie_personnagepublic.php'>Personnage</ td>";
											if($res[13]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[18]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
											if($res[23]==1)
												echo "<td><a href='asie_gastronomie.php'>Gastronomie</ td>";
										echo "</tr>";
								echo "</table>";	
								}
							}
						}
						else
						{
							header("Location:connexion.php");
						}

		
		?>
		<img class="displayed" src="image/desert.jpe" width="100%" height="100%">
		<div id="pub1">Publicité</div>
		<div id="pub2">Publicité</div>
		</div>
	</div>

	<!-- <ul>
		<li>NIVEAU 1 - ASIE
			<ul>
				<li><a href="asie_gastronomie.php">Gastronomie</li>
				<li><a href="asie_monument.php">Monument</li>
				<li><a href="asie_sport.php">Sport</li>
				<li><a href="asie_geographie.php">Géographie</li>
				<li><a href="asie_personnagepublic.php">Personnage</li>
			</ul>
		</li>
		<li>NIVEAU 2 - AFRIQUE
			<ul>
				<li><a href="afrique_gastronomie.php">Gastronomie</li>
				<li><a href="afrique_monument.php">Monument</li>
				<li><a href="afrique_sport.php">Sport</li>
				<li><a href="afrique_geographie.php">Géographie</li>
				<li><a href="afrique_personnagepublic.php">Personnage</li>
			</ul>
		</li>
		<li>NIVEAU 3 - AMERIQUE
			<ul>
				<li><a href="amerique_gastronomie.php">Gastronomie</li>
				<li><a href="amerique_monument.php">Monument</li>
				<li><a href="amerique_sport.php">Sport</li>
				<li><a href="amerique_geographie.php">Géographie</li>
				<li><a href="amerique_personnagepublic.php">Personnage</li>
			</ul>
		</li>
		<li>NIVEAU 4 - EUROPE
			<ul>
				<li><a href="europe_gastronomie.php">Gastronomie</li>
				<li><a href="europe_monument.php">Monument</li>
				<li><a href="europe_sport.php">Sport</li>
				<li><a href="europe_geographie.php">Géographie</li>
				<li><a href="europe_personnagepublic.php">Personnage</li>
			</ul>
		</li>
		
	</ul> -->

	<?php include("footer.php"); ?>

	</body>

	
	
</html>