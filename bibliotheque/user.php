<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_user = $_SESSION['user_id'];

if (!isset($id_user)) {
	header('location:sign_in.php');
}
?>
