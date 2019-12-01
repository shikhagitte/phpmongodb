<?php
/*This is simple login page*/
session_start();
require_once('connection.php');
if (isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $result = $db->users->findOne(array('username'=>$username, 'password'=>$password));
    if(!$result)
    {
        echo "Incorrect username and password";
    }
    else
    {
        $_SESSION['user'] = $result->_id;
        header('Location:home.php');
    }
}
?>
<!--
<html>
<head>
    <title> LOGIN PAGE </title>
</head>
<body>
    <form method ="post" action="index.php">
        <fieldset>
            <lable for="username">User_Name:</lable><input type="text" name="username" /><br>
            <lable for="password">Password:</lable><input type="text" name="password" /><br>
            <input type="submit" value="Login">
        </fieldset>

    </form>
    <a href="regsiter.php">New User?</a>
</body>
</html>!-->
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

.input-container {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  width: 100%;
  margin-bottom: 15px;
}

.icon {
  padding: 10px;
  background: #778899;
  color: white;
  min-width: 50px;
  text-align: center;
}

.input-field {
  width: 100%;
  padding: 10px;
  outline: none;
}

.input-field:focus {
  border: 2px solid #778899;
}

/* Set a style for the submit button */
.btn {
  background-color: #778899;
  color: white;
  padding: 15px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
</style>
</head>
<body>

<form method ="post" action="index.php" style="max-width:500px;margin:auto">
  <h2>Login Form</h2>
  <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="username">
  </div>
<div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" placeholder="Password" name="password">
  </div>

  <button type="submit" class="btn">Login</button><br>
  <a href="regsiter.php">New User? Create Account here.</a>
</form>


</body>
</html>
