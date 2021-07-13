<?php
		try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tpsn2ict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	if($_POST['pass2'] != $_POST['pass1'])
	{
		echo 'Entrer le un meme mot de passe pour la confirmation !';
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
		$req = $bdd->prepare('INSERT INTO adherents(nom, prenom, sexe, email, psw) VALUES (:nom, :prenom, :sexe, :email, :psw)');
		$req->execute(array('nom' => $_POST['nom'],
							'prenom' => $_POST['pre'],
							'sexe' => $s,
							'email' => $_POST['mail'],
							'psw' => $_POST['pass1']));
		
		$nom = $_POST['nom'];
		$pre = $_POST['pre'];
		$rep = $bdd->prepare('SELECT idAdh FROM adherents WHERE nom = ? && prenom = ?');
		$rep->execute(array($nom, $pre));
		$don = $rep->fetch();
		$id = $don['idAdh'];
		if($_POST['privilege'] = "oui")
		{
			$req2 = $bdd->prepare('INSERT INTO bureau(estMembre, idAdh) VALUES(?, ?)');
			$req2->execute(array(1, $id));
		}
		echo '<script>alert("Le nouvel adhérent a bien été crée!")</script>';
		echo 'L\'ID du nouvel adhérent est : ' .$id.'<br><br><a href = "acceuil.php">Passer</a>';
	}
		
	?>