<?php
session_start();
header ('Location: login.php');
$username = $_POST['username'];
$password = $_POST['password'];

echo "Username: $username <br> Password: $password";

?>