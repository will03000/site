<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
		
		<div id="banniere">
			
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="">Gallerie Photo</a></li>
				<li><a href="video.php">Coin Vidéo</a></li>
				<li><a href="minichat.php">Minichat</a></li>
				<li><a href="">Inscription</a></li>
			</ul>
		</nav>

	</header>


 <a href="index.php" class="myButton">Retour</a>

<form method="POST" action="minichat_post.php" style="text-align: center;">
	
<input type="text" name="Pseudo" placeholder="Pseudo">
<input type="text-area" name="Message" placeholder="Message">
<button type="submit">Envoyer</button>


</form>

<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=lesite;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT Pseudo,Message,date FROM minichat ORDER BY id DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
?>

	<div style="text-align: center; padding: 10px;">
		<?php

		while ($donnees = $reponse->fetch())
		{
			echo '<div style="border:solid 1px black;background-color:#4C5CE8">' . htmlspecialchars($donnees['date']) . '<p><strong>' . htmlspecialchars($donnees['Pseudo']) . '</strong> : ' . htmlspecialchars($donnees['Message']) . '</p> </div>';
		}

		$reponse->closeCursor();

		?>
	</div>
</body>
</html>