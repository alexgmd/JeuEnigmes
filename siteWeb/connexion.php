<?php

session_start();

require ("param.php");
include_once('fonctions.php');

if(isset($_SESSION['email']))
{
						
	header('Location:membre.php');
}


if(isset($_POST['submit1']))
{
	
	$email=htmlspecialchars(trim($_POST['email']));
	$mdp=htmlspecialchars(trim($_POST['password']));	

	//CONDITION TOUS LES CHAMPS ONT ETE SAISIS
	
	if($email&&$mdp)
	{
				
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
						$result=mysqli_query($connexion,$request);
						$data=mysqli_fetch_assoc($result);
						
						if($data['password']==$mdp)
							{
								$_SESSION['email']=$email;

								header('Location:membre.php');
								
							} else echo "<script language='javascript'>alert('Email ou mot de passe incorrect')</script>";
					}
				}
	
	}else echo "<script language='javascript'>alert('Veuillez saisir tous les champs')</script>";
}
if(isset($_POST['submit2']))
{
	$pseudo=htmlspecialchars(trim($_POST['username']));
	$email=htmlspecialchars(trim($_POST['email']));
	$mdp=htmlspecialchars(trim($_POST['password']));
	
	
	//CONDITION TOUS LES CHAMPS ONT ETE SAISIS
	
	if($pseudo&&$email&&$mdp)
	{
			
			//CONDITION  TAILLE DU MOT DE PASSE CORRECTE
			
			if(strlen($mdp)>3)
			{
				/*$password=md5($password);
				$repeatpassword=md5($password);*/
				
				//OUVERTURE DE LA CONNEXION MYSQL
				
				$connexion = mysqli_connect($host, $user, $pass);


				if($connexion > 0)
				{
					
					//CHOIX DE LA BASE DE DONNEES
					
					$db=mysqli_select_db($connexion,$db);
					
					if($db>0)
					{
						
						//REDACTION DES REQUETES
						
						$request="INSERT INTO user(username,email,password) VALUES('$pseudo','$email','$mdp')";
						$result=mysqli_query($connexion,$request);
						$_SESSION['email']=$email;

						header('Location:membre.php');
							
					}
				}
		
			}else echo "Le mot de passe est trop court";
	
	}else echo "Veuillez saisir tous les champs";

}



?>

<!DOCTYPE HTML>
<html lang="fr">
		<head>
		<meta charset="utf-8"/>
		<title>Jeu d'énigmes-Identification</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" href="css/webfont/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="css/style_menu.css" />
		<style type="text/css">
.form-style-6{
    font: 95% lato;
    max-width: 350px;
    margin: 10px auto;
    padding: 5px;
    /*background: #F7F7F7;*/
}
.form-style-6 h1{
    background: #349957;
    padding: 10px 0;
    font-size: 130%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: 15px -0px -10px 10px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="password"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: -20%;
    border: 1px solid #ccc;
    padding: 2%;
    color: #555;
    font: 95% lato;
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="password"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    font: 95% lato;
    width: 100%;
    padding: 3%;
    background: #43D1AF;
    border-bottom: 2px solid #30C29E;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}
</style>
		</head>



<body id="page2">
	<img class="displayed" src="image/bridge_forest.jpe" width="100%" height="100%">
	<div id="wrap">
	<div id="main" class="clearfix">
	<div id="slogan">Les Enigm'atiks - Jeu d'énigmes autour du monde ✈</div><br><br><br>
	<div id="regles">
		<h1> Règles du jeu</h1>
		<ul>
			<li>Le but du jeu est d’être le premier à trouver les solutions de toutes les énigmes.</li>
			<li>Le jeu est limité en temps avec une date de début fixe et se termine à une date fixe.</li>
			<li>Chaque énigme est identifiées par une lettre (A à Y) et se présente sous la forme d’un texte accompagné d’un visuel.</li>
			<li>La grille des solutions est également accessible en ligne pour permettre de valider votre proposition : les bonnes solutions ressortent en vert, et les mauvaises en rouge.</li>
			<li>Les solutions sont composées des lettres de l’alphabet latin capitalisées et sans accents (A-Z), des chiffres (0-9), des blancs. Les caractères de ponctuation, apostrophe, tiret, etc sont tous remplacés par des blancs.</li>
			<li>Une nouvelle proposition de solutions est possible toutes les demi heures.</li>
			<li>Certaines solutions sont également des indices pour des énigmes plus difficiles.</li>
			<li>Lorsque le joueur trouve la solution à une énigme, il obtient les points associés à celle-ci. Le nombre de points associé à une énigme est 1 pour la première, 2 pour la seconde, 3 pour la troisième, etc. Le score d’un joueur est donc la somme des points associés aux énigmes qu’il a résolues.</li>
			<li>Pour participer, il suffit de s’enregistrer sur le site.Ni les membres des entreprises et associations organisatrices et partenaires du jeu, ni les membres de leur famille ne peuvent participer.</li>
			<li>A la fin du jeu un classement des meilleurs joueurs est arrêté. En cas d’égalité, c’est le premier à avoir atteint le score qui l’emporte.</li>
			<li>Si le joueur le désir il peut faire appel à des indices. Pour cela, il lui suffit de payer avec des jetons qui lui seront attribués à chaque énigmes résolues.</li>
		</ul>
	</div>
	<div id="connexion">
		<div class="form-style-6">
		<div id="inscription">
			<h1>Inscription</h1>
			<form method="post" action="connexion.php">
			<div>
				<br>
				<input type="text" name="username" id="username" placeholder="Pseudo">
				</br>
				<br>
				<input type="text" name="email" id="email" placeholder="E-mail" />
				</br>
				
				<br>
				<input type="password" name="password" id="mdp" placeholder="Mot de passe" />
				</br>

				<br>
				<input type="submit" name="submit2" value="Inscription"/>
				</br>
			</div>
			</form>
		</div>

		<br>
		<div id="identification">
			
			<h1>Déja inscrit ? Identifiez-vous !</h1>
			<form method="post" action="connexion.php">
			<div>
				<br>
				<input type="text" name="email" id="email" placeholder="E-mail" />
				</br>
				
				<br>
				<input type="password" name="password" id="mdp" placeholder="Mot de passe" />
				</br>

				<br>
				<input type="submit" name="submit1" value="Connexion"/>
				</br>
			</div>
			</form>
		</div>
	</div>
	</div>
	</div>
</div>

<?php include("footer.php"); ?>

</body>



</html>