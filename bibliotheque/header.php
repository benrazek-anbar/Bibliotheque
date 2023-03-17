<header>
	<div class="header">
		<a href="home.php" class="logo">Book</a>
	    <nav class="menu">
		    <a href="home.php">Home</a>
		    <a href="about.php">About</a>
		    <a href="shop.php">Shop</a>
		    <a href="contact.php">Contact</a>
		    <a href="order.php">Order</a>
	    </nav>
	    <div class="icons">
	    	<div><i class="fa-solid fa-bars"></i></div>
	    	<a href="search_page.php" class="fas fa-search"></a>
	    	<div class="user"><i class="fa-solid fa-user"></i></div>
	    	<?php
	    	$select_order = mysqli_query($con,"SELECT * FROM `cart` WHERE user_id='$id_user'");
	    	$number_cart = mysqli_num_rows($select_order);
	    	?>
	    	<a href="cart.php"><i class="fa-solid fa-cart-shopping"></i><span>(<?php echo"$number_cart";?>)</span></a>
	    </div>
	    <div class="user_info">
	        <p>User Name: <span> <?php echo $_SESSION['user_name'];?></span></p>
	        <p>Email: <span><?php echo $_SESSION['user_email'];?></span></p>
	        <a href="logout.php">Logout</a>
	    </div>
	</div>
</header>