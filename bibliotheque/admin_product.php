<?php
$con = mysqli_connect('localhost','root','','bibliotheque');

session_start();
$id_admin = $_SESSION['admin_id'];
if (!isset($id_admin)) {
	header('location:sign_in.php');
};

if (isset($_POST['add'])) {
	$product_name = mysqli_escape_string($con,$_POST['name']);
	$product_price = $_POST['number'];
	$image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
	

	$select_product = mysqli_query($con,"SELECT name FROM `products` WHERE name = '$product_name'");
	if (mysqli_num_rows($select_product) > 0) {
		$message[] ='Nom de produit deja ajoute';
	}else{
		$add_product = mysqli_query($con,"INSERT INTO `products`(name,price,image) VALUES ('$product_name','$product_price','$image')");

		if ($add_product) {
			if ($image_size > 2000000) {
				$message[] ="La taille de l'image est trop grande";
			}else{
				move_uploaded_file( $image_tmp_name, $image_folder);
				$message[] ="Produit ajoute avec succes";
			}
		}else{
			$message[] ="Le produit n'a pas pu etre ajoute";
		}
	}
}

//DELETE
if (isset($_GET['delete'])) {
	$delete_id = $_GET['delete']; 
	mysqli_query($con,"DELETE FROM `products` WHERE id = '$delete_id'");
	header('location:admin_product.php');
};
//update
if (isset($_POST['update'])) {
	$update_id = $_POST['id_update'];
	$update_name = $_POST['update_name'];
	$update_price = $_POST['update_price'];

	mysqli_query($con, "UPDATE `products` SET name = '$update_name', price = $update_price WHERE id = $update_id");

	$update_image = $_FILES['image']['name'];
    $update_image_tmp_name = $_FILES['image']['tmp_name'];
    $update_image_size = $_FILES['image']['size'];
    $update_image_folder = 'uploaded_img/'.$update_image;
    $update_old_image = $_POST['image_update'];

	if (!empty($update_image)) {
		if ($update_image_size > 2000000) {
			$message[] =" La taille de l'image est trop grande";
		}else{
			mysqli_query($con,"UPDATE `products` SET image='$update_image' WHERE id= '$update_id'"); 
			move_uploaded_file($update_image_tmp_name,$update_image_folder);
			unlink('uploaded_img/'.$update_old_image);
		}
	}
	header('location:admin_product.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Products</title>
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

	<!--CRUD Product start-->
	<section class="add_product">
		<h1>Shop Products</h1>

		<div class="content">
			<form action="" method="POST" enctype="multipart/form-data">
			<h2>Add Product</h2>
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
			<input type="text" name="name" class="box" placeholder="Entre product name" required>
			<input type="number" name="number" class="box" placeholder="Entre product price" required>
			<input type="file" name="image" id="file" class="box" accept="image/jpg , image/jpeg , image/png" required>
			<label for="file">Choisissez une photo</label>
			<input type="submit" name="add" value="Add Product" class="btn">
		</form>
		</div>
	</section>
	<!--CRUD Product end-->

	<!--Afficher le produit start-->
	<section class="show-products">
		<div class="show-content">
			<?php
			$select_products = mysqli_query($con,"SELECT * FROM `products`");

			if (mysqli_num_rows($select_products) > 0) {
				while ($fetch_product = mysqli_fetch_assoc($select_products)) {
			?>
			<div class="show_information">
				<img src="uploaded_img/<?php echo $fetch_product['image'];?>" alt="hayppy lemons">
				<div class="name_prod">
				    <?php echo $fetch_product['name'];?>
			    </div>
			    <div class="price_prod">
				    <?php echo $fetch_product['price'];?><span>Dh</span>
			    </div>
			    <a href="admin_product.php?update=<?php echo $fetch_product['id'];?>" class="option-btn">Update</a>
			    <a href="admin_product.php?delete=<?php echo $fetch_product['id'];?>" class="delete-btn" onclick="return confirm('supprimer ce produit');">Delete</a>
			</div>
			
			<?php
			}
			}else{
				echo "<p class='empty'>pas encore de produit ajouté</p>";
			}
			?>
		</div>
	</section>
	<!--Affiche le produit end-->


	<!--mettre à jour les produits start-->
	<section class="edit-product">
		<?php
		if (isset($_GET['update'])) {
			$update_id = $_GET['update'];
			$update_query = mysqli_query($con,"SELECT * FROM `products` WHERE id = '$update_id'");
			if (mysqli_num_rows($update_query) > 0) {
				while($fetch_update = mysqli_fetch_assoc($update_query)){

		?>
		<form action=" " method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id_update" value="<?php echo $fetch_update['id'];?>">
			<input type="hidden" name="image_update" value="<?php echo $fetch_update['image'];?>">
			<img src="uploaded_img/<?php echo $fetch_update['image'];?>">
			<input type="text" class="update_info" name="update_name" value="<?php echo $fetch_update['name'];?>" required placeholder="Entre product name">
			<input type="number" class="update_info" name="update_price" value="<?php echo $fetch_update['price'];?>" required placeholder="Entre product price">
			<input type="file" name="image" class="update_image" accept="image/jpg , image/jpeg , image/png" required>
			<label for="file">Choisissez une photo</label>
			<input type="submit" name="update" value="Update Product" class="btn" id="btn">
			<input type="reset" name="canclu" value="Close" class="btn" id='btn'>
		</form>
		<?php
		    }
			   }
		}else{
			echo "<script>document.querySelector('.edit-product').style.display ='none';</script>";
		}
		?>
	</section>
	<!--mettre à jour les produits end-->

	<!--Script-->
	<script src="js/admin_script.js">
	</script>
</body>
</html>