<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Modification des informations d'une cotisation</title>
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
			<h3>Modification des informations d'une contisation</h3>
			<form method = "post" action = "modifcotok.php">
				<p>
					<fieldset>
					<legend>Saisie des nouvelles informations de la cotisation</legend>
					<label for="jour">Nouveau jour </label><br></span><input type = "date" name = "jour" required><br>
					<label for="debut">Nouvelle heure de début <br></label><input type = "time" name = "debut" ><br>
					<label for="mont">Nouveau montant de cotisation<br></label><input type = "number" name = "mont"><br>
					<label for="ida">ID du nouveau concerné<br></label><input type = "number" name = "ida" required><br><br>
					<label for = "idc">Entrez l'ID de la cotisation à modifier :</label><br><input type = "number" name = "idc" required>
				</fieldset>
				<input type = "submit" value = "Modifier">
			</p>
			</form>