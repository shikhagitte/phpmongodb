<?php
/*This is simple login page*/
session_start();
require_once('connection.php');
/*if(isset($_SESSION['user']))
{
    header('Location:home.php');
}*/

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
<html>
<head>
    <title> REGISTER PAGE </title>
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
</html>
