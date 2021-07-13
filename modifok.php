	<?php
		try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tpsn2ict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	if(isset($_POST['idm']))
			{
				
				$tab = [];
				$i = 0;
				$reponse = $bdd->query('SELECT idAdh FROM adherents');
				while($donnee = $reponse->fetch())
				{
					$tab[$i] = $donnee['idAdh'];
					$i++;
				}
				$reponse->closeCursor();
				if(in_array($_POST['idm'], $tab))
				{
					$ida = $_POST['idm'];
				}
				if(isset($_POST['pass1']) && isset($_POST['pass2']))
	{
	if($_POST['pass2'] != $_POST['pass1'])
	{
		echo 'Entrer un meme mot de passe pour la confirmation !';
	}
	else
	{
		if($_POST['sexe'] = 'masculin')
		{
			$s = 'M';
		}
		else
		{
			$s = 'F';
		}
		$req = $bdd->prepare('UPDATE adherents SET nom = :nom, prenom = :prenom, sexe =:sexe, email = :email, psw =:psw WHERE idAdh = :idAdh');
		$req->execute(array('nom' => $_POST['nom'],
							'prenom' => $_POST['pre'],
							'sexe' => $s,
							'email' => $_POST['mail'],
							'psw' => $_POST['pass1'],
							'idAdh' => $_POST['idm']));
		
		$nom = $_POST['nom'];
		$pre = $_POST['pre'];
		$rep = $bdd->prepare('SELECT idAdh FROM adherents WHERE nom = ? && prenom = ?');
		$rep->execute(array($nom, $pre));
		$don = $rep->fetch();
		$id = $don['idAdh'];
		$tab = [];
		$i = 0;
		$reponse = $bdd->query('SELECT idAdh FROM bureau');
		while($donnee = $reponse->fetch())
		{
				$tab[$i] = $donnee['idAdh'];
				$i++;
		}
		$reponse->closeCursor();
	
		if($_POST['privilege'] = "non" && in_array($id, $tab))
		{
			$req3 = $bdd->prepare('DELETE FROM bureau WHERE idAdh = ?');
			$req3->execute(array($id));
		}
		if($_POST['privilege'] = "oui" && !in_array($id, $tab))
		{
			$req3 = $bdd->prepare('INSERT INTO bureau (estMembre, idAdh) VALUES(?, ?)');
			$req3->execute(array(1, $id));
		}
		echo '<script>alert("L\'Adhérent a bien été modifié!")</script>';
		
	}
	}
			}
				
		else
		{
			echo '<script>alert("Aucun adhérent ne possède cet ID !")</script>';
		}
		echo '<br><br><a href = "modif.php" style="color:blue;">Retour</a>';
		
		
	?>