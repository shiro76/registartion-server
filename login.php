<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>ShiroServer</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Connexion</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Nom d'Utilisateur</label>
  		<input type="text" name="Username" >
  	</div>
  	<div class="input-group">
  		<label>Mot de passe</label>
  		<input type="password" name="Password_hash">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Connexion</button>
  	</div>
  	<p>
  		pas encore inscrit? <a href="register.php">S'inscrire</a>
  	</p>
  </form>
</body>
</html>