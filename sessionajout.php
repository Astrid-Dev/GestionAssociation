<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "sessionajout.css">
		<title>Ajout d'un membre</title>
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
		
		<form method = "post" action = "sessionajoutok.php">
			<p>
				<fieldset>
					<legend>Création d'un nouvel Adhérant</legend>
					<label for="nom">Nom  </label><span class = "vide">000000000000000 </span><input type = "text" name = "nom" required><br>
					<label for="pre">Prenom  <span class = "vide">0000000000000 </span></label><input type = "text" name = "pre" ><br>
					<label for="sexe">Sexe  <span class = "vide">000000000000000 </span></label>
					<select name = "sexe">
						<option value = "masculin">Masculin</option>
						<option value = "feminin">Feminin</option>
					</select><br>
					<label for="mail">E-mail <span class = "vide">00000000000000</span></label><input type = "email" name = "mail"><br>
					<label for="pass1">Mot de passe <span class = "vide">000000000</span></label><input type = "password" name = "pass1" required><br>
					<label for="pass2">Confirmer mot de passe  </label><input type = "password" name = "pass2" required><br>
					<label for = "privilege">Privilège<span class = "vide">00000000000</span></label>
					<select>
						<option value = "oui">Est membre du bureau</option>
						<option value = "non">Est simple Adhérant</option>
					</select>
				</fieldset>
				<input type = "submit" value = "Créér">
		</form>
		
			
		