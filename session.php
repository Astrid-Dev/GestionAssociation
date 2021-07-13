<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Gestion des sessions</title>
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
		
		<h2>GESTION DES ADHERENTS</h2>
		<p>
			Que voulez-vous faire ?<br>
			<ol>
				<li><a href = "sessionajout.php" style="color : blue;">Ajouter un Adhérant</a></li><br>
				<li><a href = "sessionsup.php" style="color : blue;">Supprimer un Adhérant</a></li>
			</ol>
		