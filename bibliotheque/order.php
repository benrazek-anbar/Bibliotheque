<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_user = $_SESSION['user_id'];
if (!isset($id_user)) {
	header('location:sign_in.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order</title>
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
		<h1>PLACED ORDERS</h1>
	</section>
	<!--contact us end-->
	<section>
		<h1>Placed Orders</h1>
		<div class="orders-info">
			<?php 
			$select_order = mysqli_query($con,"SELECT * FROM `orders` WHERE user_id = '1'");
			if (mysqli_num_rows($select_order) > 0) {
				while ($fetch_order = mysqli_fetch_assoc($select_order)) {
			?>
			<p>Placed on : <span><?php echo $fetch_order['placedon']; ?></span></p>
			<p>Name : <span><?php echo $fetch_order['name']; ?></span></p>
			<p>Number : <span><?php echo $fetch_order['number']; ?></span></p>
			<p>Email : <span><?php echo $fetch_order['email']; ?></span></p>
			<p>Address : <span><?php echo $fetch_order['address']; ?></span></p>
			<p>Payment Method : <span><?php echo $fetch_order['method']; ?></span></p>
			<p>Your Orders : <span><?php echo $fetch_order['totale_products']; ?></span></p>
			<p>Totale Price : <span><?php echo $fetch_order['totale_price']; ?></span></p>
			<p>Pyment Status : <span><?php echo $fetch_order['payment_status']; ?></span></p>
		    <?php
			}
			}else{
				echo "<p class='empty'>No orders placed yet!</p>";
			}
			?>
			
		</div>
	</section>
	<!--footer start-->
	<?php include 'footer.php';?>
	<!--footer end-->
	<!--script user-->
	<script src="js/script.js"></script>
</body>
</html>