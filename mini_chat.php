<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini-chat</title>
    </head>

    <style>

    form
    {
        text-align:center;
    }
	
    </style>

    <body>

		<form action="minichat_post.php" method="post">

			<p>
				<label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
				<label for="message">Message</label> :  <input type="text" name="message" id="message" /><br />
				<input type="submit" value="Envoyer" />
			</p>

		</form>


<?php

// Connexion � la base de donn�es

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', 'root');
	}

	catch(Exception $e)

	{
		die('Erreur : '.$e->getMessage());
	}


// R�cup�ration des 10 derniers messages

$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Affichage de chaque message (toutes les donn�es sont prot�g�es par htmlspecialchars)

	while ($donnees = $reponse->fetch())
	{
		echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
	}


	$reponse->closeCursor();

?>

    </body>
</html>