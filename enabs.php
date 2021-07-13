<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Enregistrement d'une absence</title>
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
					<td style= "background : yellow;"><a href = "gestion.php">Gestion</a></td>
					<td><a href = "editions.php">Editions</a></td>
					<td><a href = "consultation.php">Consultations</a></td>
					<td><a href = "session.php">G.Session</a></td>
				</tr>
			</table>
		</div>
		
		<h3>Enregistrement d'une absence</h3>
		<form method = "post" action = "enabsok.php">
		<fieldset>
			<legend>Saisie des informations de la cotisation</legend>
			<p>
				<label for = "jour">Entrez le jour : </label><br>
				<input type = "date" name = "jour"><br>
				<label for = "heure"> Entrez le nombre d'heures</label><br>
				<input type = "number" name = "heure"><br>
				<label for = "ida">Entrez l'ID de l'adhérent</label><br>
				<input type = "number" name = "ida"><br>
				<label for = "idm">Entrez l'ID du motif</label><br>
				<input type = "number" name = "idm"><br>
			</p>
			</legend>
		</fieldset>
		<input type = "submit" value = "Enregistrer">
			
		</form>