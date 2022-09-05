<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ShiroServer-registration</title>
  	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
  	<h2>Inscription</h2>
  </div>
	
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Nom d'Utilisateur</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" autocomplete="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Mot de passe</label>
  	  <input type="password" name="password_1" autocomplete="new-password">
  	</div>
  	<div class="input-group">
  	  <label>Confirmer mot de passe</label>
  	  <input type="password" name="password_2" autocomplete="new-password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">S'incrire</button>
  	</div>
  	<p>
  		Deja inscrit? <a href="login.php">se connecter</a>
  	</p>
  </form>
</body>
</html>