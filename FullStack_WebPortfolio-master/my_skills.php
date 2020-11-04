<?php
session_start();

if(!isset($_SESSION['USER']))
{
	header('location:home.php');
}


include 'database_connection.php';
$sql = "SELECT * from SKILLS WHERE 1";
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
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title> SHUBHAM SHANKAR PORTFOLIO</title>
	<link rel="stylesheet" type="text/css" href="portfolio.css">
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	

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
			
			<div id = "skill_body">

				<div class="column1">
    				<h2>SKILLS & EXPERTISE</h2>
   					<pre><?php echo $array_data[0]['SKILL_NAME'] ?></pre>
   					<img src="<?php echo $array_data[0]['PROFILE_IMG'] ?>" alt="image not found">
 				</div>
 				
  				<div class="column2" >
   					<div class="row1">
	  					<div class="r_column1">
					    	<i class='fab fa-telegram' style='font-size:36px'></i>
					    	<p>BRANDING</p>
					    	<pre><?php echo $array_data[0]['BRANDING'] ?></pre>
						</div>
					  	<div class="r_column2">
					  		<i style='font-size:24px' class='fas'>&#xf108;</i>
					    	<p>MARKETING</p>
					    	<pre><?php echo $array_data[0]['MARKETING'] ?></pre>
					 	</div>
				  		<div class="r_column3" >
				  			<i style="font-size:24px" class="fa">&#xf1fc;</i>
				   			 <p>Design</p>
				   			 <pre><?php echo $array_data[0]['DESIGN'] ?></pre>
				  		</div>
				 		<div class="r_column4">
				 			<i style='font-size:24px' class='fas'>&#xf121;</i>
						    <p>Programming</p>
						    <pre><?php echo $array_data[0]['PROGRAMMING'] ?></pre>
				 		</div>
  					</div>
  					<!-- row2 -->
 				 	<div class="row2" >
 				 		 <p>
 				 			<span class = "Smart_Digital_Solution">Simple Technology.   </span> <span class = "A_FRONT-END_Developer"><?php echo $array_data[0]['DIG_SOL'] ?></span>
 				 		</p>
 				 		<div class="r2_column">
    						<img src="<?php echo $array_data[0]['DIG_SOL_IMG_1'] ?>" style="width:173px">
  						</div>
  						<div class="r2_column">
 						    <img src="<?php echo $array_data[0]['DIG_SOL_IMG_2'] ?>"  style="width:207px">
						</div>
  						<div class="r2_column">
    						<img src="<?php echo $array_data[0]['DIG_SOL_IMG_3'] ?>"  style="width: 176px">
  						</div>
   					</div>
  				</div>
			</div>
		</div>


		<?php 
			include 'database_connection.php';
			$sql = "SELECT * from WORK_EXP WHERE 1";
			$result = $pdo->prepare($sql);
			$result->execute();

			$array_data = array();

			while($row = $result->fetch())	
			{

				$array_data[] = $row;

			}

		?>

		<div class="WE">
				<h2> ACADEMIC PROJECTS </h2>

				<?php for($i=0;$i<count($array_data);$i++):?>

				<pre><?php echo $array_data[$i]['WORK_EXP_NAME'] ?>
				</pre>
				<div class="WE_row">
					<div class="WE_column1">
   			 			<p id = "line1"><?php echo $array_data[$i]['MONTH'] ?></p>
   			 			<p id = "line2"><?php echo $array_data[$i]['YEAR'] ?></p>
   						<p id="line3"><?php echo $array_data[$i]['APP'] ?></p>
   				 		<p id="line4"> <?php echo $array_data[$i]['DEVELOPER'] ?></p>
   					</div>
  					<div class="WE_column2">
    					<p> <?php echo $array_data[$i]['SEC_DEVELOPER'] ?><p>
    					<pre><?php echo $array_data[$i]['EXPLANATION'] ?></pre>
  					</div>
				</div>
				<div class= "whr">
					<hr>
				</div>

			<?php endfor; ?>


		<?php 
			include 'database_connection.php';
			$sql = "SELECT * from EDUCATION WHERE 1";
			$result = $pdo->prepare($sql);
			$result->execute();

			$array_data = array();

			while($row = $result->fetch())	
			{

				$array_data[] = $row;

			}

		?>

			<div class="ED">
				<h2> EDUCATION </h2>
				<pre><?php echo $array_data[0]['EDU_NAME'] ?>
				</pre>
				


				<?php for($i=0;$i<count($array_data);$i++):?>

				<div class="ED_row">
					<div class="ED_column1">
   			 			<pre id = "line1"><?php echo $array_data[$i]['MONTH'] ?></pre>
   			 			<p id = "line2"> <?php echo $array_data[$i]['YEAR'] ?></p>
   			 			<hr>
   						<p id="line3"><?php echo $array_data[$i]['DEGREE'] ?></p>
   					</div>
  						<div class="ED_column2">
    						<p id="ED1"><?php echo $array_data[$i]['COURSE'] ?> <p>
    						<p id="ED2"> <?php echo $array_data[$i]['UNIVERSITY'] ?> </p>
    						
  						</div>
					</div>
				</div>
				
				<div id="EDHR">
					<hr>	
				</div>

				<?php endfor; ?>
					
				</div>
			</div>	
		<!-- my skill end above -->
	</div>
	<div id = "my_foot1">
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