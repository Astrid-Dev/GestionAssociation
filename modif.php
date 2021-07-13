<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Modification des informations d'un adhérent</title>
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
			<h3>Modification des informations d'un adhérent</h3>
			
				<br>
				<form method = "post" action = "modifok.php">
			<p>
				<fieldset>
					<legend>Saisie des nouvelles informations de l' adhérent</legend>
					<label for="nom">Nouveau Nom  </label><br></span><input type = "text" name = "nom" required><br>
					<label for="pre">Nouveau Prenom  <br></label><input type = "text" name = "pre" ><br>
					<label for="sexe">Nouveau Sexe  <br></label>
					<select name = "sexe">
						<option value = "masculin">Masculin</option>
						<option value = "feminin">Feminin</option>
					</select><br>
					<label for="mail">Nouvelle E-mail <br></label><input type = "email" name = "mail"><br>
					<label for="pass1">Nouveau Mot de passe <br></label><input type = "password" name = "pass1" required><br>
					<label for="pass2">Confirmer mot de passe  </label><br><input type = "password" name = "pass2" required><br>
					<label for = "privilege">Nouveau Privilège<br></label>
					<select>
						<option value = "oui">Est membre du bureau</option>
						<option value = "non">Est simple Adhérant</option>
					</select><br><br>
					<label for = "idm">Entrez son ID :</label><br><input type = "number" name = "idm" required>
				</fieldset>
				<input type = "submit" value = "Modifier">
			</p>
		</form>
		
	