<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_admin = $_SESSION['admin_id'];
if (!isset($id_admin)) {
	header('location:sign_in.php');
}

if (isset($_POST['uporder'])) {
	$id_order = $_POST['order_id'];
	$uppayment = $_POST['update_payment'];
	mysqli_query($con,"UPDATE `orders` SET payment_status = '$uppayment' WHERE id = '$id_order'");
	$message[] = 'Change avec succes';
}

if (isset($_GET['delete_order'])) {
	$delete_id = $_GET['delete']; 
	mysqli_query($con,"DELETE FROM `orders` WHERE id = '$delete_id'");
	header('location:admin_orders.php');
};
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Orders</title>
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
	<section class="orders">
		<h1>Placed Orders</h1>
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
		<div class="box_orders">
			<?php
			$select_order = mysqli_query($con,"SELECT * FROM `orders`");
			if (mysqli_num_rows($select_order) > 0) {
				while ($fetch_order = mysqli_fetch_assoc($select_order)) {	
			?>
			<div class="box">   
				<p>User id :<span> <?php echo $fetch_order['user_id'];?></span></p>
				<p>Placed on :<span> <?php echo $fetch_order['placedon'];?></span></p>
				<p>Name :<span> <?php echo $fetch_order['name'];?></span></p>
				<p>Number :<span> <?php echo $fetch_order['number'];?></span></p>
				<p>Email :<span> <?php echo $fetch_order['email'];?></span></p>
				<p>Address :<span> <?php echo $fetch_order['address'];?></span></p>
				<p>Total products :<span> <?php echo $fetch_order['totale_products'];?></span></p>
				<p>Totale price :<span> <?php echo $fetch_order['totale_price'];?></span></p>
				<p>Payment methode:<span> <?php echo $fetch_order['method'];?></span></p>
				<form action="" method="post">
					<input type="hidden" name="order_id" value="<?php echo $fetch_order['id'];?>">
					<select  name="update_payment">
						<option value="" selected disabled><?php echo $fetch_order['payment_status'];?></option>
						<option value="pending">Pending</option>
						<option value="completed">Completed</option>
					</select>
					<input type="submit" name="uporder" value="Update Order" class="update_order"><br><br>
					<a href="admin_orders.php?delete=<?php echo $fetch_order['id'];?>" name="delete_order" onclick="return confirm('delete this order?')" class="btn">Delete</a>
				</form>
			</div>
			<?php
			}
			}else{
				echo "<p class='empty'>no orders placed yet!</p>";
			}
			?>
		</div>	
	</section>









	<!--Script-->
	<script src="js/admin_script.js">
	</script>
</head>
<body>
