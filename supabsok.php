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
		
		<?php
		
			try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tpsn2ict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$rep = $bdd->query('SELECT idAbs FROM absences');
	$tab = [];
	$i = 0;
	while($donnee = $rep->fetch())
	{
		$tab[$i] = $donnee['idAbs'];
		$i++;
	}
	$rep->closeCursor();
	if(in_array($_POST['idab'], $tab))
	{
		$req = $bdd->prepare('DELETE FROM absences WHERE idAbs = ?');
		$req->execute(array($_POST['idab']));
		echo '<script>alert("L\'absence a bien été supprimée");</script>';
	}
	else
	{
		echo '<script>alert("Cet ID ne correspond à aucune absence");</script>';
	}
	echo '<br><br><a href = "modif.php" style="color:blue;">Retour</a>';
?>
	