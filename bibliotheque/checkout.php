<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_user = $_SESSION['user_id'];
if (!isset($id_user)) {
	header('location:sign_in.php');
}
if (isset($_POST['add-order'])) {
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$number = $_POST['number'];
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$methode = mysqli_real_escape_string($con,$_POST['methode']);
	$address =  mysqli_real_escape_string($con, 'flat no. '. $_POST['flat'].', '. $_POST['street'].', '. $_POST['city'].', '. $_POST['country'].' - '. $_POST['pincode']);
	$placed_on=date('d-m-y');

	$cart_totale =0;
	$cart_product[]='';
	$cart_query = mysqli_query($con,"SELECT * FROM `cart` WHERE user_id = '$id_user'");
	if (mysqli_num_rows($cart_query) > 0) {
		while($cart_item = mysqli_fetch_assoc($cart_query)){
			$cart_product[] = $cart_item['name'].'('.$cart_item['quantity'].')';

			$sub_total = $cart_item['price'] * $cart_item['quantity'];
			$cart_totale += $sub_total;
		}
	}

	$total_products = implode(',', $cart_product);

	if ($cart_totale == 0) {
		$message[] = 'Your cart is empty';
	}else{
		mysqli_query($con,"INSERT INTO `order` (user_id,name,number,email,method,address,totale_products,totale_price,placedon) VALUES ('$id_user','$name','$number','$email','$address','$total_products','$cart_totale','$placed_on')");
		$message[]='order placed successfully';
		//mysqli_query($con,"DELETE * FROM `cart` WHERE user_id ='$id_user'");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Checkout</title>
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
	<section class="about-heading">
		<h1>Checkout</h1>
	</section>
	<section class="checkout">
		<div class="checkout-info">
			<?php
			$grand_totale =0;
			$select_cart = mysqli_query($con,"SELECT * FROM `cart` WHERE user_id = '$id_user'");
			if (mysqli_num_rows($select_cart) > 0) {
				while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
				$total_price = ($fetch_cart['price']* $fetch_cart['quantity']);
				$grand_totale =+ $total_price;
		?>
		<p> <?php echo $fetch_cart['name'];?> <span>(<?php echo $fetch_cart['price'];?>Dh x <?php echo $fetch_cart['quantity'];?>)</span></p>
		<?php
			$grand_totale += $total_price;
			}
			}else{
				echo "<p class='empty'>Your cart is empty</p>";
			}
			?>
		</div>
		<div class="grend_total">
			<p>Grend Totale :
				<span>
				 <?php echo $grand_totale;?>Dh
				</span>
			</p> 
		</div>
	</section>
	<section class="checkout-order">
		<h1>Place your order</h1>
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
		<form action="" method="post">
		   
			<div class="input_box">
				<span>Your Name:</span>
				<input type="text" name="name" placeholder="Enter your name" required>
			</div>
			<div class="input_box">
				<span>Your Number:</span>
				<input type="number" min="0" name="number" placeholder="Enter your number" required>
			</div>
			<div class="input_box">
				<span>Your Email:</span>
				<input type="email" name="email" placeholder="Enter your email" required>
			</div>
			<div class="input_box">
				<span>Payment Methode:</span>
				<select name="methode" required >
					<option value="cash on delivery">Cash on Delivery</option>
					<option value="credit card">Credit Cart</option>
					<option value="paypal">PayPal</option>
				</select>			
			</div>
			<div class="input_box">
				<span>Address Line 01:</span>
				<input type="number" min="0" name="flat" placeholder="e. g. flat no." required>
			</div>
			<div class="input_box">
				<span>Address Line 01:</span>
				<input type="text" name="street" placeholder="e.g. street name." required>
			</div>
			<div class="input_box">
				<span>City:</span>
				<input type="text" name="city" placeholder="e.g. casa" required>
			</div>
			<div class="input_box">
				<span>State:</span>
				<input type="text" name="state" placeholder="e.g. HY" required>
			</div>
			<div class="input_box">
				<span>Country:</span>
				<input type="text" name="country" placeholder="e.g. Maroc" required>
			</div>
			<div class="input_box">
				<span>Pin Code:</span>
				<input type="number" min="0" name="pincode" placeholder="e.g. 1234567" required>
			</div>
			<input type="submit" name="add-order" value="Order Now" class="btn-add">
		</form>
	</section>
	<!--footer start-->
	<?php include 'footer.php';?>
	<!--footer end-->
	<!--script user-->
	<script src="js/script.js"></script>
</body>
</html>