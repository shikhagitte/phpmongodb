<?php
/*This is simple Register page*/
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
    $result = $db->users->insertOne(array('username'=>$username, 'password'=>$password));
    $result = $db->users->createIndex(array('username'=>1) , array('unique'=>true));
    header('Location:index.php');
}
?>
<html>
<head>
    <title> REGISTER PAGE </title>
</head>
<body>
    <form method ="post" action="regsiter.php">
        <fieldset>
            <lable for="username">User_Name:</lable><input type="text" name="username" /><br>
            <lable for="password">Password:</lable><input type="text" name="password" /><br>
            <input type="submit" value="Sign Up">
        </fieldset>

    </form>
    <a href="index.php">Already have an Account? login here.</a>
</body>
</html>
