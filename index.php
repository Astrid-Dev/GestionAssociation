<!DOCTYPE html>
<html>
	<head>
		<meta charset = "utf-8">
		<link rel = "stylesheet" href = "index.css">
		<title>Groupe 2 Association</title>
	</head>
	
	<div id = "bloc_page">
	<body>
		<div id = "entete">
			<header>
				<h1>Acceuil</header>
			</header>
		</div>
		
		<div id = "acceuil">
			<h2> BIENVENUE A GROUPE 2 ASSOCIATION!</h2>
		</div>
		<form method = "post" action = "verification.php">
			<p>
				 <fieldset>
					<legend> Connexion</legend>
						ID :  <input type = "number" name = "ida" required><br>
						Mot de passe :   <input type = "password" name = "pass"></br>
				</fieldset>
				<input type = "submit" value = "Se connecter" id = "connect">
			</p>
		</form>
	</body>
	</div>
</html>