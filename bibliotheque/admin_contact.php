<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_admin = $_SESSION['admin_id'];
if (!isset($id_admin)) {
	header('location:sign_in.php');
}
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($con,"DELETE FROM `message` WHERE id='$delete_id'");
	header("location:admin_contact.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Message</title>
	<!--Link CSS-->
	<link rel="stylesheet" type="text/css" href="css/style-admin.css">
	<!--Link ICON-->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
	<!--font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900;1000&family=Open+Sans:wght@300;400;500;600;700;800&family=Oswald&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:wght@300;400;500;700;900&family=Work+Sans:wght@200;300;400;500&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'header_admin.php';?>

    <section class="messages">
    	<h1>Messages</h1>
    	<div class="message_box">
    		<?php
			$select_message = mysqli_query($con,"SELECT * FROM `message`");
			if (mysqli_num_rows($select_message) > 0) {
				while ($fetch_message = mysqli_fetch_assoc($select_message)) {	
			?>
			<div class="box">
				<form action="" method="POST">
					<p>Name :<span> <?php echo $fetch_message['name'];?></span></p>
				    <p>Number :<span> <?php echo $fetch_message['number'];?></span></p>
				    <p>Email :<span> <?php echo $fetch_message['email'];?></span></p>
				    <p>Message :<span> <?php echo $fetch_message['message'];?></span></p><br>
				    <a href="admin_contact.php?delete=<?php echo $fetch_message['id'];?>" name="delete_message" onclick="return confirm('delete this user?')" class="btn">Delete Message</a>
				</form>
			</div>
			<?php
			    }
			}else{
				echo "<p class='empty'>You have no messages!</p>";
			}
			?>
    	</div>
    </section>

	<!--Script-->
	<script src="js/admin_script.js">
	</script>
</body>
</html>