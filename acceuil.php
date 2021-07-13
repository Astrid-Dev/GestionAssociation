<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Page d'acceuil</title>
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
					<td><a href = "session.php">G.Session</a></td>
				</tr>
			</table>
		</div>
		
		<ol>
			<li>Pour enregitrer une cotisation ou une absence, allez dans <mark>Gestion</mark></li>
			<li>Pour modifier ou supprimer un adhérent, une absence ou une cotisation, allez dans <mark>Editions</mark></li>
			<li>Pour une avoir une statistique sur l'association, allez dans <mark>Consultations</mark></li>
			<li>Pour supprimer ou ajouter un adhérent, allez dans <mark>G.session</mark></li>
		</ol>
		
	</body>
</html>