<?php
$con = mysqli_connect('localhost','root','','bibliotheque');
session_start();
session_unset();
session_destroy();
header('location:sign_in.php');
?>