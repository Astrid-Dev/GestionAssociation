<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Absences</title>
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
					<td style= "background : yellow;"><a href = "consultation.php">Consultations</a></td>
					<td><a href = "session.php">G.Session</a></td>
				</tr>
			</table>
		</div>
		
		<br><br>
<?php
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=tpsn2ict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
				die('Erreur : '.$e->getMessage());
			}
			
			$rep = $bdd->query('SELECT jour FROM absences');
			$tab = [];
			$i = 0;
			while($don = $rep->fetch())
			{
				$tab[$i] = $don['jour'];
				$i++;
			}
			$rep->closeCursor();
			if(in_array($_POST['dat'], $tab))
			{
				echo '<h2>Listes des Absents du '.$_POST['dat'].'</h2>';
				$reponse = $bdd->prepare('SELECT nom, prenom, libelle FROM adherents ad, absences ab, motifs mo WHERE ad.idAdh = ab.idAdh && mo.idMotif = ab.idMotif && ab.jour = ?');
				$reponse->execute(array($_POST['dat']));
				while($_donnee = $reponse->fetch())
				{
					echo $_donnee['prenom'].' '.$_donnee['nom'].' <strong> avec pour motif : </strong>'.$_donnee['libelle'].'<br>';
				}
				$reponse->closeCursor();
				
				echo '<br><h2>Listes des Présents du '.$_POST['dat']. '</h2>';
				$rep = $bdd->prepare('SELECT nom, prenom, montant FROM adherents ad, instants ins WHERE ad.idAdh = ins.idAdh && ins.jour = ?');
				$rep->execute(array($_POST['dat']));
				while($donnee = $rep->fetch())
				{
					echo $donnee['prenom'].' '.$donnee['nom'].' <strong> avec une cotisation de : </strong>'.$donnee['montant'].'FCFA<br>';
				}
				$rep->closeCursor();
			}
			else
			{
				echo '<script>alert("Aucune réunion n\'a eu lieu ce jour !")</script><br>';
			}
			echo '<br><br><a href = "absence.php" style="color : blue;">Retour</a>';
			
		?>