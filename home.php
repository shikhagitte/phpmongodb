<?php
/*this is a homepage*/
session_start();
require_once('connection.php');
if(!isset($_SESSION['user']))
{
    header("Location: index.php");
}
$data = $db->users->findOne(array('_id'=> $_SESSION['user']));
?>
<html>
<head>
    <title>Sample</title>
</head>
<body>
    <?php include('header.php');?>
</body>
</html>
