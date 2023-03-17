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
	<title>About</title>
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
	<!--about us start-->
	<section class="about-heading">
		<h1>ABOUT US</h1>
	</section>
	<!--about us end-->

	<!--About start-->
	<section>
		<h1></h1>
		<div class="about-home">
		    <div class="about-home-img">
			    <img src="images/about-img.jpg">
		    </div>
		    <div class="about-home-text">
			    <h2>WHY CHOOSE US?</h2>
			    <p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Eveniet volupatibus aut hic molestias. reiciendis natus fuga. cupmque excepturi veniam retione iure. Excepturi fugiat placeat iusta facere id officia assumenda temporibus?</p><br>
			    <p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci?</p><br>
			    <a href="about.php" class="btn" style="text-decoration: none;">Read more</a>
	    	</div>
	    </div>
	</section>
	<!--About end-->
	<!--About Reviews start-->
	<section class="about-reviews">
		<h1>CLIENT'S REVIEWS</h1>
		<div class="reviews">
			<div class="client-reviews">
				<img src="images/pic-1.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>

			<div class="client-reviews">
				<img src="images/pic-2.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>

			<div class="client-reviews">
				<img src="images/pic-3.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>

			<div class="client-reviews">
				<img src="images/pic-4.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>

			<div class="client-reviews">
				<img src="images/pic-5.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>

			<div class="client-reviews">
				<img src="images/pic-6.png">
				<p>Lorem ipsum dolor, sit amet consectetur adipisicin elit. Impedit quos enim minima ipsa officia corporis ratione ratione saepe sed adipisci.</p>
				<div class="icons">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star-half-stroke"></i>
				</div>
				<h3>john deo</h3>
			</div>
		</div>
	</section>
	<!--About Reviews end-->


	<!--Greate authors start-->
	<section class="greate-authors">
		<h1>GREATE AUTHORS</h1>
		<div class="greate">
			<div class="greate-info">
				<img src="images/author-1.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>

			<div class="greate-info">
				<img src="images/author-2.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>

			<div class="greate-info">
				<img src="images/author-3.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>

			<div class="greate-info">
				<img src="images/author-4.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>

			<div class="greate-info">
				<img src="images/author-5.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>

			<div class="greate-info">
				<img src="images/author-6.jpg">
				<div class="icons">
		            <i class="fa-brands fa-square-facebook"></i>
		            <i class="fa-brands fa-twitter"></i>
		            <i class="fa-brands fa-square-instagram"></i>
		            <i class="fa-brands fa-linkedin"></i>
		        </div>
		        <h3>john deo</h3>
			</div>
        </div>
	</section>
	<!--Greate authors end-->
	<!--footer start-->
	<?php include 'footer.php';?>
	<!--footer end-->
	<!--script user-->
	<script src="js/script.js"></script>
</body>
</html>