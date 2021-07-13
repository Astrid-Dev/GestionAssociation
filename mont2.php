<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "acceuil.css">
		<title>Montant de cotisations</title>
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
			
			if($_POST['dat1'] >= $_POST['dat2'])
			{				
				$sup = $_POST['dat1'];
				$inf = $_POST['dat2'];
			}
			else
			{
				$sup = $_POST['dat2'];
				$inf = $_POST['dat1'];
			}
				$reponse = $bdd->prepare('SELECT SUM(montant) as somme FROM instants WHERE jour >= ? && jour<= ?');
				$reponse->execute(array($inf, $sup));
				$donnee = $reponse->fetch();
				if($donnee['somme'] > 0)
				{
					echo 'Les contisations entre les dates '.$inf.' et ' .$sup.' ont donné un montant de : <strong>'.$donnee['somme']. ' FCFA</strong>';
				}
				else
				{
					echo '<script>alert("Aucune réunion n\'a eu lieu durant cette période !")</script><br>';
				}
				$reponse->closeCursor();
			echo '<br><br><a href = "consultation.php" style="color : blue;">Retour</a>';
			
		?>