<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Montant de contisations</title>
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
			
			$rep = $bdd->query('SELECT jour FROM instants');
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
				$reponse = $bdd->prepare('SELECT SUM(montant) as somme FROM instants WHERE jour = ?');
				$reponse->execute(array($_POST['dat']));
				$donnee = $reponse->fetch();
				echo 'La contisation du '.$_POST['dat'].' a donné un montant de : <strong>'.$donnee['somme']. ' FCFA</strong>';
				$reponse->closeCursor();
			}
			else
			{
				echo '<script>alert("Aucune réunion n\'a eu lieu ce jour !")</script><br>';
			}
			echo '<br><br><a href = "consultation.php" style="color : blue;">Retour</a>';
			
		?>