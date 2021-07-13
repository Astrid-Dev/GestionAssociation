<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "sessionajout.css">
		<title>Suppression d'un membre</title>
	</head>
	
	<body>
		<header>
			<h1>
				<?php
					echo 'Bonjour';
					if(isset($_COOKIE['sex']))
					{
						if($_COOKIE['sex'] == 'M' || $_COOKIE['sex'] == 'm')
						{
							echo ' monsieur';
						}
						else if($_COOKIE['sex'] == 'F' || $_COOKIE['sex'] == 'f')
						{
						echo ' madame';
						}
					}
					if(isset($_COOKIE['pre']))
					{
						echo ' '.$_COOKIE['pre'];
					}
						echo ' ' .$_COOKIE['nom'];
				?>
			</h1>
			<em>Connecté en tant qu'<strong>Administrateur</strong></em> 
		</header>
		
		<div id = "corps">
			<table>
				<tr>
					<td><a href = "gestion.php">Gestion</a></td>
					<td><a href = "editions.php">Editions</a></td>
					<td><a href = "consultation.php">Consultations</a></td>
					<td style= "background : yellow;"><a href = "session.php">G.Session</a></td>
				</tr>
			</table>
		</div>
		<h3>Entrez l'ID de l'adhérent à supprimer :</h3>
		<form method = "post" action ="sessionsup.php">
			<p>
				<label for = "idsup">ID : </label><input type = "number" name = "idsup" required>
				<input type = "submit" value = "Supprimer">
			</p>
			<h4 style = "color : red;">NB: Cette action est irreversible</h4>
		</form>
		
		<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=tpsn2ict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			if(isset($_POST['idsup']))
			{
				$tab = [];
				$i = 0;
				$reponse = $bdd->query('SELECT idAdh FROM adherents');
				while($donnee = $reponse->fetch())
				{
					$tab[$i] = $donnee['idAdh'];
					$i++;
				}
				$reponse->closeCursor();
				if(in_array($_POST['idsup'], $tab))
				{
					$rep = $bdd->prepare('DELETE FROM adherents WHERE idAdh = ?');
					$rep->execute(array($_POST['idsup']));
					echo '<script>alert("L\'Adherant a bien été supprimé");</script>';
				}
				else
				{
					echo '<script>alert("L\'ID est introuvable dans la base de données");</script>'; 
				}
			}
		?>
		