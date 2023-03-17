<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

if (isset($_POST['submit'])){
	$Email = mysqli_real_escape_string($con,$_POST['email']);
    $pass =mysqli_real_escape_string($con,md5($_POST['password']));
    $query = mysqli_query($con,"SELECT * FROM `users` WHERE PASSWORD = '$pass' AND email = '$Email'");

    if(mysqli_num_rows($query) > 0){
    	$row = mysqli_fetch_assoc($query);
    	if($row['typeusers'] == 'admin'){
    		session_start();
    		$_SESSION['admin_name'] = $row['name'];
    		$_SESSION['admin_email'] = $row['email'];
    		$_SESSION['admin_id'] = $row['id'];
    		header('location:admin.php');
    	}elseif ($row['typeusers'] == 'user') {
    		session_start();
    		$_SESSION['user_name'] = $row['name'];
    		$_SESSION['user_email'] = $row['email'];
    		$_SESSION['user_id'] = $row['id'];
    		$message[]=$_SESSION['user_id'] ;
    		header('location:home.php');
    	}
    }else{
    	$message[]='incorrect email or password';
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
			<img src="images/login-cuate.png" alt="sign_up">
			<p></p>
		</div>
		<div class="signup_input" id="signin">
			<h1>SIGN IN</h1>
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
				<input type="email" name="email" placeholder="Entre your email" required>
				<input type="password" name="password" placeholder="Entre your password" required>
				<input type="submit" name="submit" value="Sign up" class="submit">
				<p>don't have an account? <a href="sign_up.php">signe up </a></p>
			</form>
		</div>
	</div>
</body>
</html>