<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Mini-chat</title>
	</head>
	<style>
	form
	{
		text-align : center;
	}
	</style>
	
	<body>
	<span onclick="alert('Hello !' + this.innerHTML);">Cliquez-moi !</span>
	<form method = "post" action = "minichat.php">
		<p>
			<label for = "pseudo">Pseudo</label> : <input type = "text" name = "pseudo" id = "pseudo" required><br>
			<label for = "message">Message</label> : <input type = "text" name = "message" id = "message" required><br>
			
			<input type = "submit" value = "Envoyer">
			<script type = "text/javascript">
			while(!confirm('Pour accéder à ce site vous devez avoir 18 ans ou plus,cliquez sur "OK" si c\'est le cas.')) {
				alert("Désolé, vous n'avez pas accès à ce site.");
} 
alert('Vous allez être redirigé vers le site.');
header('Location : avtp1.php');

</script>

		</p>
	</form>
	
	<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
	
	
	?>
	<?php


$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES (?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));
$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY Id DESC LIMIT 0, 10');

while($donnee = $reponse->fetch())
{
	echo('<strong>Pseudo : </strong>' .$donnee['pseudo'] . '<br><strong>Message : </strong>'.$donnee['message'].'<br><br>');
}
$reponse->closeCursor();

?>
	
	</body>
</html>