<header>
	<div class="header">
		<a href="admin.php" class="logo">Admin<span>Panel</span></a>
	    <nav class="menu">
		    <a href="admin.php">Home</a>
		    <a href="admin_product.php">Product</a>
		    <a href="admin_orders.php">Orders</a>
		    <a href="admin_user.php">Users</a>
		    <a href="admin_contact.php">Messages</a>
	    </nav>
	    <div class="icons">
	    	<i class="fa-solid fa-bars"></i>
	    	<i class="fa-solid fa-user"></i>
	    </div>
	    <div class="admin_info">
	        <p>User Name: <span> <?php echo $_SESSION['admin_name'];?></span></p>
	        <p>Email: <span><?php echo $_SESSION['admin_email'];?></span></p>
	        <a href="logout.php">Logout</a>
	    </div>
	</div>
</header>