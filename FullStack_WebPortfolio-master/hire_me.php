<?php 

session_start();

if(!isset($_SESSION['USER']))
{
	header('location:home.php');
}

include 'database_connection.php';
$sql = "SELECT * from HIRE WHERE 1";
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
<body>						<!-- there is no much difference btn id and class -->
	<div id = "wrapper">
		<!-- this is a entire section for my skill -->
		<div id = "skills">			<!-- id is used for something unique -->
			<!-- this is a header section -->
			<div id = "my_head">
				<header>
					<nav class = "name"><!-- class can be used over and over again -->
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

			<div class="hire">
				<h2> HIRE ME </h2>
				<pre><?php echo $array_data[0]['HIRE_NAME'] ?>
				<?php for($i=0;$i<count($array_data);$i++):?>
				</pre>

				<div class="hire_row">
					<div class="hire_column1">
						<img src="<?php echo $array_data[$i]['HIRE_IMG'] ?>" alt="Smiley face" >
   					</div>
  					<div class="hire_column2">
    					<p id="c1"> $<?php echo $array_data[$i]['HIRE_AMOUNT'] ?> <p>
    					<p id="p1"><?php echo $array_data[$i]['HIRE_DESC'] ?></p>
    					<ul id = "h1">
    						<li><?php echo $array_data[$i]['HIRE_INFO1'] ?></li>
    						<li><?php echo $array_data[$i]['HIRE_INFO2'] ?></li>
    						<li><?php echo $array_data[$i]['HIRE_INFO3'] ?></li>
    					</ul>
						<p id="c2">CONTACT US</p>
  					</div>
				</div>
				<hr>

				<?php endfor; ?>

				

				<?php 
					include 'database_connection.php';
					$sql = "SELECT * from HIRE_SKILL WHERE 1";
					$result = $pdo->prepare($sql);
					$result->execute();

					$array_data = array();

					while($row = $result->fetch())	
					{

						$array_data[] = $row;

					}

				?>



				<div id="hire_body">
				<nav class="latest_work">
					<h1>SKILLS & KNOWLEDGE</h1>
					<pre><?php echo $array_data[0]['HI_NAME'] ?></pre>
				</nav>
				<nav class="h_row">
					<!-- each row has 4 col -->
					<div class="h_column1">
				  		<h2>SOFTWARE</h2>
				  		<div class="skill_box">
				  		    <li>
					  			<h3>IOS</h3><span class="bar"><span class="python"></span></span>
					  			<p>80%</p>
					  		</li>
					  		<li>
					  			<h3>HTML/HTML5</h3><span class="bar"><span class="html"></span></span>
					  			<p>90%</p>
					  		</li>
					  		<li>
					  			<h3>CSS/CSS3</h3><span class="bar"><span class="css"></span></span>
					  			<p>90%</p>
					  		</li>
					  		<li>
					  			<h3>BOOTSTRAP</h3><span class="bar"><span class="bootstrap"></span></span>
					  			<p>50%</p>
					  		</li>
					  		<li>
					  			<h3>JAVASCRIPT</h3><span class="bar"><span class="javascript"></span></span>
					  			<p>70%</p>
					  		</li>
					  		<li>
					  			<h3>PHP</h3><span class="bar"><span class="python"></span></span>
					  			<p>75%</p>
					  		</li>
					  		<li>
					  			<h3>LARAVEL</h3><span class="bar"><span class="python"></span></span>
					  			<p>80%</p>
					  		</li>
					  		<li>
					  			<h3>Django</h3><span class="bar"><span class="python"></span></span>
					  			<p>85%</p>
					  		</li>
					  		<li>
					  			<h3>C</h3><span class="bar"><span class="javascript"></span></span>
					  			<p>85%</p>
					  		</li>
					  		<li>
					  			<h3>PYTHON</h3><span class="bar"><span class="python"></span></span>
					  			<p>90%</p>
					  		</li>
					  		<li>
					  			<h3>KOTLIN</h3><span class="bar"><span class="python"></span></span>
					  			<p>85%</p>
					  		</li>
					  		<li>
					  			<h3>GIT</h3><span class="bar"><span class="python"></span></span>
					  			<p>75%</p>
					  		</li>
				  		</div>
				  	</div>




				  	<div class="h_column2" >
				  		<h2>RECOGNITIONS</h2>
				  		<ul class="rec_class">
				  			<li class="h2_img"><i class='far fa-images' style='font-size:24px; color: black;'"></i></li>
				  			<li class="h2_pencil"><i class='fas fa-pencil-alt' style='font-size:24px;color: black;'></i></li>
				  			<li class="h2_toolbox"><i class='fas fa-toolbox' style='font-size:24px;color: black;'></i></li>
				  		</ul>
				  		<p class="award"><?php echo $array_data[0]['HI_INFO'] ?></p>
				  		<pre class="award2"><?php echo $array_data[0]['HI_DESC'] ?></pre>
				  		<p class="logo"><?php echo $array_data[1]['HI_INFO'] ?></p>
				  		<pre class="logo2"><?php echo $array_data[1]['HI_DESC'] ?></pre>
				  		<p class="web"><?php echo $array_data[2]['HI_INFO'] ?></p>
				  		<pre class="web2"><?php echo $array_data[2]['HI_DESC'] ?></pre>
				  	</div>



				  	<div class="h_column3">
				 		 <h2>LANGUAGE SKILLS</h2>
						<div class="progress-circle p10">
   							<span><pre>10% GERMAN</pre></span>
   							<div class="left-half-clipper">
      							<div class="first50-bar"></div>
      							<div class="value-bar"></div>
   							</div>
						</div>
						<div class="progress-circle over50 p50">
   							<span><pre>100% ENGLISH</pre></span>
   							<div class="left-half-clipper">
      							<div class="first50-bar"></div>
      							<div class="value-bar"></div>
   							</div>
						</div>
						<div class="progress-circle over50 p85">
   							<span><pre>85% HINDI</pre></span>
   							<div class="left-half-clipper">
      							<div class="first50-bar"></div>
      							<div class="value-bar"></div>
   							</div>
						</div>
				 	</div>


				 		<?php 
							include 'database_connection.php';
							$sql = "SELECT * from HIRE_KNOWLEDGE WHERE 1";
							$result = $pdo->prepare($sql);
							$result->execute();

							$array_data = array();

							while($row = $result->fetch())	
							{

								$array_data[] = $row;

							}

						?>



				  	<div class="h_column4" >
				  		<h1>Knowledge</h1>
				  		<ul class="k_list">
				  			<li><?php echo $array_data[0]['HK_L1'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L2'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L3'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L4'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L5'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L6'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L7'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L8'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L9'] ?>n</li>
				  			<li><?php echo $array_data[0]['HK_L10'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L11'] ?></li>
				  			<li><?php echo $array_data[0]['HK_L12'] ?></li>
				  		</ul>
				  	</div>
				</nav>




						<?php 
							include 'database_connection.php';
							$sql = "SELECT * from HIRE_HOBBY WHERE 1";
							$result = $pdo->prepare($sql);
							$result->execute();

							$array_data = array();

							while($row = $result->fetch())	
							{

								$array_data[] = $row;

							}

						?>

				<nav class="hobby">
					<h1>HOBBIES & INTERESTS</h1>
					<ul class="design">
						<li><i class='fas fa-dumbbell' style='font-size:24px;color: black;'></i></li>
						<li><i class="fa fa-camera" style="font-size:24px;color: black;"></i></li>
						<li><i class='far fa-newspaper' style='font-size:24px;color: black;'></i></li>
						<li><i class="fa fa-film" style="font-size:24px;color: black;"></i></li>
						<li><i class='fas fa-star' style='font-size:24px;color: black;'></i></li>
						<li><i class='fas fa-tv' style='font-size:24px;color: black;'></i></li>
						<li><i class='fas fa-plane' style='font-size:24px;color: black;'></i></li>
						<li><i class='far fa-file-alt' style='font-size:24px;color: black;'></i></li>
						<li><i class="fa fa-music" style="font-size:24px;color: black;"></i></li>
					</ul>
					<ul class ="name">
						<li class="col1"><?php echo $array_data[0]['HH_L1'] ?></li>
						<li class="col2"><?php echo $array_data[0]['HH_L2'] ?></li>
						<li class="col3"><?php echo $array_data[0]['HH_L3'] ?></li>
						<li class="col4"><?php echo $array_data[0]['HH_L4'] ?></li>
						<li class="col5"><?php echo $array_data[0]['HH_L5'] ?></li>
						<li class="col6"><?php echo $array_data[0]['HH_L6'] ?></li>
						<li class="col7"><?php echo $array_data[0]['HH_L7'] ?></li>
						<li class="col8"><?php echo $array_data[0]['HH_L8'] ?></li>
						<li class="col9"><?php echo $array_data[0]['HH_L9'] ?></li>
					</ul>
				</nav>
			</div>	
		</div>
		<!-- my skill end above -->
	</div>
	<div id = "my_foot6">
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
						<?php endif; ?>>
					<li><a href="#" id="contactme">CONTACT_ME</a></li>
				</ul>	
			</nav>
		</footer>
	</div>
</body>
</html>