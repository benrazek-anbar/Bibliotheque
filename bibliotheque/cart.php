<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_user = $_SESSION['user_id'];
if (!isset($id_user)) {
	header('location:sign_in.php');
}
if (isset($_POST['update_cart'])) {
	$cart_id = $_POST['cart_id'];
	$cart_quantity = $_POST['cart_quantity'];

	mysqli_query($con, "UPDATE `cart` SET quantity = '$cart_quantity' WHERE id = '$cart_id'");
	$message[]='Cart quantity updated';
}
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete'];
	mysqli_query($con,"DELETE FROM `cart` WHERE id = '$delete_id'");
	header("location:cart.php");
}
if (isset($_GET['delete_all'])) {
	$id_user = $_GET['delete_all'];
	mysqli_query($con,"DELETE FROM `cart` WHERE user_id = '$delete_id'");
	header("location:cart.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart</title>
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
		<h1 style="font-size: 50px;">PRODUCTS ADDED</h1>
	</section>
	<!--contact us end-->

	<!--cart start-->
	<section>
		<h1 style="margin: 2% 0px;">Products added</h1>
		<?php
			    if (isset($message)) {
				    foreach ($message as $message) {
					    echo '		
					        <div class="message">
				                <span >'.$message.'</span>
				                <i class="fa-sharp fa-solid fa-circle-xmark" onclick="this.parentElement.remove();"></i>
			                </div> 
			            ';
			 	    }
			    }
		    ?>
		<div class="cart">
			<?php
			$grand_totale =0;
			$select_cart = mysqli_query($con,"SELECT * FROM `cart` WHERE user_id = '$id_user'");
			if (mysqli_num_rows($select_cart) > 0) {
				while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {	
			?>
			<div class="cart-info">

				<a href="cart.php?delete=<?php echo $fetch_cart['id'];?>" class="fas fa-times" name="delete-cart" onclick="return confirm('delete this cart?');"></a>
				<img src="uploaded_img/<?php echo $fetch_cart['image'];?>">
				<div class="name-cart"><?php echo $fetch_cart['name'];?> </div>
			    <div class="price-cart"><?php echo $fetch_cart['price'];?>DH</div>
				<form action="" method="post">
					<input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id'];?>">
					<input type="number" name="cart_quantity" class="cart_quantity" min="1" max="20" value="<?php echo $fetch_cart['quantity'];?>">
					<input type="submit" name="update_cart" value="Update" class="btn">
				</form>
				<div class="sub_total">Sub total: <span><?php echo $sub_total = ($fetch_cart['quantity'] * $fetch_cart['price']);?>Dh</span></div>
			</div>
			<?php
			$grand_totale += $sub_total;
			}
			}else{
				echo "<p class='empty'>Your cart is empty</p>";
			}
			?>
		</div>
		<div style=" text-align: center; margin-bottom: 5%;">
			<a style="text-decoration: none; background-color: red" href="cart.php?delete_all" class="btn" onclick="return confirm('delete all cart?');">Delete all</a>
		</div>
		<div class="cart_total">
			<p>Grand total : <span><?php echo $grand_totale;?>Dh</span></p><br>
			<a href="shop.php" class="btn">Continue Shopping</a><br><br><br>
			<a href="checkout.php" class="btn">Proceed To Checkout </a>
		</div>
	</section>
	<!--cart end-->

	<!--footer start-->
	<?php include 'footer.php';?>
	<!--footer end-->
	<!--script user-->
	<script src="js/script.js"></script>
</body>
</html>