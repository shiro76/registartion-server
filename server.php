<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('92.149.34.134', 'root', '123456', 'dbo_acc');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same Username and/or email
  $user_check_query = "SELECT * FROM accounts WHERE Username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$Password_hash = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO accounts (Username, email, Password_hash) 
  			  VALUES('$username', '$email', '$Password_hash')";
  	mysqli_query($db, $query);
    $query = "SELECT * FROM accounts WHERE Username='$username' AND Password_hash='$Password_hash'";
    $results = mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "Vous etes connect??";
    header('location: index.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['Username']);
    $Password_hash = mysqli_real_escape_string($db, $_POST['Password_hash']);
  
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($Password_hash)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $Password_hash = md5($Password_hash);
        $query = "SELECT * FROM accounts WHERE Username='$username' AND Password_hash='$Password_hash'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "Vous etes connect??";
          header('location: index.php');
        }else {
            array_push($errors, "nom D'utilisateur/mot de passe incorrect");
        }
    }
  }
  
  ?>