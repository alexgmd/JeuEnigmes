<!DOCTYPE HTML>
<html lang="fr">

	  <head>
	  	<?php header( 'content-type: text/html; charset=utf-8' ); ?>
	  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Règles du jeu</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" charset="utf-8" />
		<link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style_menu.css" charset="utf-8" />
	  </head>

	  <body>
	  	<img class="displayed" src="image/clouds.jpe" width="100%" height="100%">
	  	<div id="wrap">
			<div id="main" class="clearfix">
			  	<?php include("menu.php"); ?>
				<h1> Règles du jeu</h1>
				<ul>
					<li>Le but du jeu est d’être le premier à trouver les solutions de toutes les énigmes.</li>
					<li>Le jeu est limité en temps avec une date de début fixe et se termine à une date fixe.</li>
					<li>Chaque énigme est identifiées par une lettre (A à Y) et se présente sous la forme d’un texte accompagné d’un visuel.</li>
					<li>La grille des solutions est également accessible en ligne pour permettre de valider votre proposition : les bonnes solutions ressortent en vert, et les mauvaises en rouge.</li>
					<li>Les solutions sont composées des lettres de l’alphabet latin capitalisées et sans accents (A-Z), des chiffres (0-9), des blancs. Les caractères de ponctuation, apostrophe, tiret, etc sont tous remplacés par des blancs.</li>
					<li>Une nouvelle proposition de solutions est possible toutes les 5, 7 ou 10 minutes en fonction du niveau de difficulté.</li>
					<li>Certaines solutions sont également des indices pour des énigmes plus difficiles.</li>
					<li>Lorsque le joueur trouve la solution à une énigme, il obtient les points associés à celle-ci. Le nombre de points associé à une énigme est 1 pour la première, 2 pour le seconde, 3 pour la troisième, etc. Le score d’un joueur est donc la somme des points associés aux énigmes qu’il a résolues.</li>
					<li>Pour participer, il suffit de s’enregistrer sur le site.Ni les membres des entreprises et associations organisatrices et partenaires du jeu, ni les membres de leur famille ne peuvent participer.</li>
					<li>A la fin du jeu un classement des meilleurs joueurs est arrêté. En cas d’égalité, c’est le premier à avoir atteint le score qui l’emporte.</li>
					<li>Si le joueur le désir il peut faire appel à des indices. Pour cela, il lui suffit de payer avec des jetons qui lui seront attribués à chaque énigmes résolues.</li>
				</ul>
			</div>
		</div>
		<?php include("footer.php"); ?>
	  </body>


</html>
	