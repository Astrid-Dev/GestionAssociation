<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Suppression d'une absence</title>
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
					<td style= "background : yellow;"><a href = "editions.php">Editions</a></td>
					<td><a href = "consultation.php">Consultations</a></td>
					<td><a href = "session.php">G.Session</a></td>
				</tr>
			</table>
		</div>
		<h3>Suppression d'une absence</h3>
		<form method = "post" action = "supabsok.php">
		<p>
			<label for = "idab">Entrez l'ID de l'absence : </label><input type = "number" name = "idab">
			<input type = "submit" value = "Supprimer"><br>
			</p>
		</form>
	