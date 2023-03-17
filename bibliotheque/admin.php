<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_admin = $_SESSION['admin_id'];
if (!isset($id_admin)) {
	header('location:sign_in.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Page</title>
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
	<!--header start-->
	<?php include 'header_admin.php';?>
	<!--header end-->

	<!--dashboard start-->
	<section class="dashboard">
		<h1>Dashboard</h1>
		<div class="content-box">

			<div class="box">
				<?php
				$total_pendings = 0;
				$select_pending = mysqli_query($con,"SELECT totale_price from `orders` WHERE payment_status ='pending'");

				if(mysqli_num_rows($select_pending) > 0){
					while ($fetch_pending = mysqli_fetch_assoc($select_pending)) {
						$total_price = $fetch_pending['totale_price'];
						$total_pendings += $total_price;
					}
				}
				?>
				<h2><?php echo $total_pendings; ?></h2>
				<p>Total Pandings</p>
			</div>

			<div class="box">
				<?php
				$total_completed = 0;
				$select_completed = mysqli_query($con,"SELECT totale_price from `orders` WHERE payment_status ='completed'");

				if(mysqli_num_rows($select_completed) > 0){
					while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
						$total_price = $fetch_completed['totale_price'];
						$total_completed += $total_price;
					}
				}
				?>
				<h2><?php echo $total_completed; ?></h2>
				<p>Completed Payments</p>
			</div>

			<div class="box">
				<?php
				$select_orders = mysqli_query($con,"SELECT * from `orders`");
				$number_of_orders = mysqli_num_rows($select_orders);
				?>
				<h2><?php echo $number_of_orders; ?></h2>
				<p>Order Placed</p>
			</div>

			<div class="box">
				<?php
				$select_products = mysqli_query($con,"SELECT * from `products`");
				$number_of_products = mysqli_num_rows($select_products);
				?>
				<h2><?php echo $number_of_products; ?></h2>
				<p>Products added</p>
			</div>

			<div class="box">
				<?php
				$select_users = mysqli_query($con,"SELECT * from `users` WHERE typeusers ='user'");
				$number_of_users = mysqli_num_rows($select_users);
				?>
				<h2><?php echo $number_of_users; ?></h2>
				<p>Normal users</p>
			</div>

			<div class="box">
				<?php
				$select_admins = mysqli_query($con,"SELECT * from `users` WHERE typeusers ='admin'");
				$number_of_admins = mysqli_num_rows($select_admins);
				?>
				<h2><?php echo $number_of_admins; ?></h2>
				<p>Admin Users</p>
			</div>

			<div class="box">
				<?php
				$select_account = mysqli_query($con,"SELECT * from `users`");
				$number_of_account = mysqli_num_rows($select_account);
				?>
				<h2><?php echo $number_of_account; ?></h2>
				<p>Tolal Users</p>
			</div>

			<div class="box">
				<?php
				$select_messages = mysqli_query($con,"SELECT * from `message`");
				$number_of_messages = mysqli_num_rows($select_messages);
				?>
				<h2><?php echo $number_of_messages; ?></h2>
				<p>New Messages</p>
			</div>
		</div>
	</section>
	<!--dashboard end-->
	<script src="js/admin_script.js"></script>
</body>
</html>