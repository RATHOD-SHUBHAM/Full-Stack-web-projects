<?php 
session_start();

if(!isset($_SESSION['USER']))
{
	header('location:home.php');
}

include 'database_connection.php';
$sql = "SELECT * from RECOMMENDATION WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$array_data = array();

while($row = $result->fetch())	
{

	$array_data[] = $row;

}

?>



<!DOCTYPE html>
<html>
<head>
	<title> SHUBHAM SHANKAR PORTFOLIO</title>
	<link rel="stylesheet" type="text/css" href="portfolio.css">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<meta charset="utf-8">
</head>
<body>						
	<div id = "wrapper">
		
		<div id = "skills">			
			<div id = "my_head">
				<header>
					<nav class = "name">
						<ul>
							<li>SHUBHAM SHANKAR</li>
						</ul>
					</nav>
					<nav class = "nav_bar">
						<ul>
							<li><a href="home.php">HOME</a></li>
							<li><a href="my_skills.php">MY SKILLS</a></li>
							<li><a href="recomendation.php">RECOMMENDATION</a></li>
							<li><a href="work.php">WORK</a></li>
							<li><a href="http://shankarshubham.uta.cloud/BLOG/">BLOGS</a></li>
							<li><a href="hire_me.php">HIRE-ME</a></li>

							<?php if(!isset($_SESSION['USER'])):?>
							<li><a href="#" id="login-button">LOG-IN</a></li>
							<li><a href="#" id="signup-button">SIGN-UP</a></li>
							<?php endif; ?>

						<?php if((isset($_SESSION['USER']))&&(($_SESSION['ACC_TYPE'])=="ADMIN")): ?>
						<li><a href="admin.php" id="edit-button">EDIT</a></li>
						<li><a href="logout.php" id="logout-button">LOG-OUT</a></li>
						<?php endif; ?>

						<?php if((isset($_SESSION['USER']))&&(($_SESSION['ACC_TYPE'])!="ADMIN")): ?>
						<li><a href="logout.php" id="logout-button">LOG-OUT</a></li>
						<li><?php echo $_SESSION['USER']; ?></li>
						<?php endif; ?>
						
						</ul>		
					</nav>
				</header>
			</div>
			<div class="rec">
				<h2> REFERENCE </h2>
				<div class="rec_row">
					<div class="mySlides">
					 	<img src="<?php echo $array_data[0]['REF_IMG'] ?>" class="picturedot">
					 	<i class="fas fa-quote-right" aria-hidden="true"></i>
					  	<p div id="q1"><?php echo $array_data[0]['REF_DESC'] ?></p>
					  	<p class="author"><?php echo $array_data[0]['REF_NAME'] ?></p>
					</div>

					<div class="mySlides">
					  	<img src="<?php echo $array_data[1]['REF_IMG'] ?>" class="picturedot1">
					  	<i class="fas fa-quote-right" aria-hidden="true"></i>
					  	<p div id="q2"><?php echo $array_data[1]['REF_DESC'] ?></p>
					  	<p class="author"><?php echo $array_data[1]['REF_NAME'] ?></p>
					</div>

					<div class="mySlides">
					  	<img src="<?php echo $array_data[2]['REF_IMG'] ?>" class="picturedot2">
					  	<i class="fas fa-quote-right" aria-hidden="true"></i>
					  	<p div id="q3"><?php echo $array_data[2]['REF_DESC'] ?></p>
					  	<p class="author"><?php echo $array_data[2]['REF_NAME'] ?></p>
					</div>

					</div>

					<div class="dot-container">
					  <span class="dot" onclick="currentSlide(1)"></span> 
					  <span class="dot" onclick="currentSlide(2)"></span> 
					  <span class="dot" onclick="currentSlide(3)"></span> 
					</div>

					<script>
					var slideIndex = 1;
					showSlides(slideIndex);

					function currentSlide(n) {
					  showSlides(slideIndex = n);
					}

					function showSlides(n) {
					  var i;
					  var slides = document.getElementsByClassName("mySlides");
					  var dots = document.getElementsByClassName("dot");
					  if (n > slides.length) {slideIndex = 1}    
					  if (n < 1) {slideIndex = slides.length}
					  for (i = 0; i < slides.length; i++) {
					      slides[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
					      dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndex-1].style.display = "block";  
					  dots[slideIndex-1].className += " active";
					}
					</script>
			</div>	
		</div>
		<!-- my skill end above -->
	</div>
	<div id = "my_foot2">
		<footer>
			<nav class = "name1">
				<ul>
					<li>SHUBHAM SHANKAR</li>
				</ul>
			</nav>
			<nav class = "nav_bar1">
				<ul>
					<li><a href="home.php">HOME</a></li>
							<li><a href="my_skills.php">MY SKILLS</a></li>
							<li><a href="recomendation.php">RECOMMENDATION</a></li>
							
							<li><a href="work.php">WORK</a></li>
							<li><a href="http://shankarshubham.uta.cloud/BLOG/">BLOGS</a></li>
							<li><a href="hire_me.php">HIRE-ME</a></li>

							<?php if(!isset($_SESSION['USER'])):?>
							<li><a href="#" id="login-button">LOG-IN</a></li>
							<li><a href="#" id="signup-button">SIGN-UP</a></li>
							<?php endif; ?>

						<?php if((isset($_SESSION['USER']))&&(($_SESSION['ACC_TYPE'])=="ADMIN")): ?>
						<li><a href="admin.php" id="edit-button">EDIT</a></li>
						<li><a href="logout.php" id="logout-button">LOG-OUT</a></li>
						<?php endif; ?>

						<?php if((isset($_SESSION['USER']))&&(($_SESSION['ACC_TYPE'])!="ADMIN")): ?>
						<li><a href="logout.php" id="logout-button">LOG-OUT</a></li>
						<li><?php echo $_SESSION['USER']; ?></li>
						<?php endif; ?>
					<li><a href="#" id="contactme">CONTACT_ME</a></li>
				</ul>	
			</nav>
		</footer>
	</div>
</body>
</html>