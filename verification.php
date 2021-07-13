<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=tpexamict108', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	$reponse = $bdd->query('SELECT nom, idAdh, sexe, prenom FROM adherents');
	$tnom = [];
	$tpre = [];
	$tid = [];
	$tsex = [];
	$i = 0;
	while($donnee = $reponse->fetch())
	{
		$tnom[$i] = $donnee['nom'];
		$tpre[$i] = $donnee['prenom'];
		$tid[$i] = $donnee['idAdh'];
		$tsex[$i] = $donnee['sexe'];
		$i++;
	}
	$reponse->closeCursor();
	if(in_array(($_POST['ida'] - 1), $tid))
	{
		setcookie('nom', $tnom[$_POST['ida'] - 1], time() + 365*24*3600, null, null, false, true);
		if($tpre[$_POST['ida']-1] != '')
		{
			setcookie('pre', $tpre[$_POST['ida'] - 1], time() + 365*24*3600, null, null, false, true);
		}
		setcookie('sex', $tsex[$_POST['ida'] - 1], time() + 365*24*3600, null, null, false, true);
	}
?>
	
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>Verification</title>
</head>
<body>
<?php
		$reponse = $bdd->query('SELECT idAdh FROM adherents');
		$tab = [];
		$i = 0;
		while($donnee = $reponse->fetch())
		{
			$tab[$i] = $donnee['idAdh'];
			$i++;
		}
		$reponse->closeCursor();
		$reponse = $bdd->query('SELECT psw FROM adherents');
		$tab2 = [];
		$i = 0;
		while($donnee = $reponse->fetch())
		{
			$tab2[$i] = $donnee['psw'];
			$i++;
		}
		$reponse->closeCursor();
		if(in_array($_POST['ida'], $tab) && in_array($_POST['pass'], $tab2))
		{
			echo('<p><mark>Id et Mot de passe corrects !</mark><br><a href ="acceuil.php">Cliquez pour passer!</a></p>');
		}
		else
		{
			include('index.php');
			?>
			<em style="color : red;"><br>Id ou Mot de passe incorrect!<em><br>
			<?php
		}
		
		?>
	</body>
</html>
