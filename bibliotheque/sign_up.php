<?php
$con = mysqli_connect('localhost','root','','bibliotheque');


if (isset($_POST['submit'])) {
	$name=mysqli_escape_string($con,$_POST['name']);
    $email=mysqli_escape_string($con,$_POST['email']);
    $password1=mysqli_escape_string($con,md5($_POST['password1']));
    $password2=mysqli_escape_string($con,md5($_POST['password2']));
    $type_users=$_POST['type_users'];

    $query=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($query)>0) {
    	$message[]="This account exists";
    }elseif($password1 != $password2){
    	$message[]="Password does not match";
    }else{
    	$insert = "INSERT INTO users (name,email,password,typeusers) VALUES ('$name','$email','$password1','$type_users')";
    	mysqli_query($con,$insert);
    	$message[] = "Account created successfully";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign up</title>
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
	<div class="sign_up">
		<div class="signup_img">
			<img src="images/Sign-up.png" alt="sign_up">
		</div>
		<div class="signup_input">
			<h1>SIGN UP</h1>
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
			<form action="" method="POST">
				<input type="text" name="name" placeholder="Entre your name" required>
				<input type="email" name="email" placeholder="Entre your email" required>
				<input type="password" name="password1" placeholder="Entre your password" required>
				<input type="password" name="password2" placeholder="Confirm your password" required>
				<select name="type_users">
					<option>user</option>
					<option>admin</option>
				</select>
				<input type="submit" name="submit" value="Sign up" class="submit">
				<p>alread have an account? <a href="sign_in.php">login now</a></p>
			</form>
		</div>
	</div>
</body>
</html>