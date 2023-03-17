<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_user = $_SESSION['user_id'];
if (!isset($id_user)) {
	header('location:sign_in.php');
}
if (isset($_POST['add_message'])) {
	$name_message =mysqli_real_escape_string($con,$_POST['name']);
	$email_message =mysqli_real_escape_string($con,$_POST['email']);
	$number_message = $_POST['number'];
	$messages =mysqli_real_escape_string($con,$_POST['message']);

	$check_message = mysqli_query($con,"SELECT * FROM `message` WHERE name = '$name_message' AND email= '$email_message' AND number='$number_message' AND message = '$messages'");
	if(mysqli_num_rows($check_message) > 0){
		$message[] ='message sent already!';
	}else{
		mysqli_query($con,"INSERT INTO `message` (user_id,name,email,number,message) VALUES ('$id_user','$name_message','$email_message','$number_message','$messages')");
		$message[] = 'Message sent successfully!';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact</title>
	<!--Link CSS-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!--Link ICON-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<!--font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&family=Open+Sans:wght@300;400;500;600;700;800&family=Oswald&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@300;400;500;700;900&family=Work+Sans:wght@200;300;400;500&display=swap" rel="stylesheet">
</head>
<body>
	<!--header start-->
	<?php include 'header.php';?>
	<!--header end-->
	<!--contact us start-->
	<section class="about-heading">
		<h1>CONTACT US</h1>
	</section>
	<!--contact us end-->

	<!--Contact start-->
	<!--Contact start-->
	<div class="contact">
		
		<form action="" method="post"> 
			<h2>SAY SOMETHINGI</h2>
			<?php
			    if (isset($message)) {
				    foreach ($message as $message) {
					    echo '		
					        <div class="message">
				                <span>'.$message.'</span>
				                <i class="fa-sharp fa-solid fa-circle-xmark" onclick="this.parentElement.remove();"></i>
			                </div> 
			            ';
			 	    }
			    }
		    ?>
			<input type="text" name="name" placeholder="Entre your name" class="contact-info" required>
			<input type="email" name="email" placeholder="Entre your email" class="contact-info" required>
			<input type="text" name="number" placeholder="Entre your number" class="contact-info" required>
			<textarea name="message" placeholder="Entre your message" required cols="59"></textarea>
			<input type="submit" name="add_message" class="btn" value="Send Message">
		</form>
	</div>
	<!--footer start-->
	<?php include 'footer.php';?>
	<!--footer end-->
	<!--script user-->
	<script src="js/script.js"></script>
</body>
</html>