<?php
session_start();

if(!isset($_SESSION['USER']))
{
	header('location:home.php');
}

if((isset($_SESSION['USER']))&&(($_SESSION['ACC_TYPE'])=="NA")){
    header('location:home.php');
}

// --------------------- WORK_EXPERIENCE -----------------------------
include 'database_connection.php';
$sql = "SELECT * from WORK_EXP WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$array_data = array();

while($row = $result->fetch())	
{

	$array_data[] = $row;

}

$message = "";

if(isset($_POST['WORK_EXPERIENCE_BUTTON'])){
	for ($i=0; $i < count($array_data) ; $i++) { 
		$WORK_EXP_NAME = "WORK_EXP_NAME".$i;
		$MONTH = "MONTH".$i;
		$YEAR = "YEAR".$i;
		$APP = "APP".$i;
		$DEVELOPER = "DEVELOPER".$i;
		$SEC_DEVELOPER = "SEC_DEVELOPER".$i;
		$EXPLANATION = "EXPLANATION".$i;
		$WORK_EXP_ID = "WORK_EXP_ID".$i;



		$sql = "update WORK_EXP SET
				WORK_EXP_NAME=:WORK_EXP_NAME,
				MONTH=:MONTH,
				YEAR=:YEAR,
				APP=:APP,
				DEVELOPER=:DEVELOPER,
				SEC_DEVELOPER=:SEC_DEVELOPER,
				EXPLANATION=:EXPLANATION
				WHERE WORK_EXP_ID=:WORK_EXP_ID";

			$message = $pdo->prepare($sql);
			$result = $message->execute([':WORK_EXP_NAME'=> $_POST[$WORK_EXP_NAME],':MONTH'=> $_POST[$MONTH],':YEAR'=>$_POST[$YEAR],':APP'=>$_POST[$APP],':DEVELOPER'=>$_POST[$DEVELOPER],':SEC_DEVELOPER'=>$_POST[$SEC_DEVELOPER],':EXPLANATION'=>$_POST[$EXPLANATION],':WORK_EXP_ID'=>$_POST[$WORK_EXP_ID]]);
			if($result>0){
				$message = "WORK_EXPERIENCE UPDATED";
			}

			else{
				$message = "WORK_EXPERIENCE NOT UPDATED";
			}

	}

}

// --------------------------- ADD WORK_EXPERIENCE ----------------

include 'database_connection.php';
$sql = "SELECT * from WORK_EXP WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$array_data = array();

while($row = $result->fetch())	
{

	$array_data[] = $row;

}

$message = ""; 

if(isset($_POST['WORK_EXPERIENCE_ADD_BUTTON'])){



	$WORK_EXP_NAME = $_POST['NAME_WORK_EXPERIENCE_1'];
	  $MONTH = $_POST['MONTH_WORK_EXPERIENCE_1'];
	  $YEAR = $_POST['YEAR_WORK_EXPERIENCE_1'];
	  $APP = $_POST['APP_WORK_EXPERIENCE_1'];
	  $DEVELOPER = $_POST['DEVELOPER_WORK_EXPERIENCE_1'];
	  $SEC_DEVELOPER= $_POST['SEC_DEVELOPER_WORK_EXPERIENCE_1'];
	  $EXPLANATION= $_POST['EXPLANATION_WORK_EXPERIENCE_1'];
	  $username="Shubham";
	


		$sql = "INSERT INTO WORK_EXP (WORK_EXP_NAME,MONTH,YEAR,APP,DEVELOPER,SEC_DEVELOPER,EXPLANATION,USER_NAME) VALUES(:NAME_WORK_EXPERIENCE_1,:MONTH_WORK_EXPERIENCE_1,:YEAR_WORK_EXPERIENCE_1,:APP_WORK_EXPERIENCE_1,:DEVELOPER_WORK_EXPERIENCE_1,:SEC_DEVELOPER_WORK_EXPERIENCE_1,:EXPLANATION_WORK_EXPERIENCE_1,:USER_NAME)";



			$result = $pdo->prepare($sql);
			$result->execute([':NAME_WORK_EXPERIENCE_1'=>$WORK_EXP_NAME ,':MONTH_WORK_EXPERIENCE_1'=> $MONTH,':YEAR_WORK_EXPERIENCE_1'=>$YEAR,':APP_WORK_EXPERIENCE_1'=>$APP,':DEVELOPER_WORK_EXPERIENCE_1'=>$DEVELOPER,':SEC_DEVELOPER_WORK_EXPERIENCE_1'=>$SEC_DEVELOPER,':EXPLANATION_WORK_EXPERIENCE_1'=>$EXPLANATION,'USER_NAME'=>$username]);

			$message = "WORK_EXPERIENCE UPDATED";
			

	}


// ----------------- work exp ends ---------------------------


// ----------------------------- EDUCATION ---------------------
include 'database_connection.php';
$sql = "SELECT * from EDUCATION WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$education_array_data = array();

while($row = $result->fetch())	
{

	$education_array_data[] = $row;

}

$education_message = "";

if(isset($_POST['EDUCATION_BUTTON'])){
	for ($i=0; $i < count($education_array_data) ; $i++) { 
		$EDU_NAME = "EDU_NAME".$i;
		$MONTH = "MONTH".$i;
		$YEAR = "YEAR".$i;
		$DEGREE = "DEGREE".$i;
		$COURSE = "COURSE".$i;
		$UNIVERSITY = "UNIVERSITY".$i;
		$EDU_ID = "EDU_ID".$i;



		$sql = "update EDUCATION SET
				EDU_NAME=:EDU_NAME,
				MONTH=:MONTH,
				YEAR=:YEAR,
				DEGREE=:DEGREE,
				COURSE=:COURSE,
				UNIVERSITY=:UNIVERSITY
				WHERE EDU_ID=:EDU_ID";

			$education_message = $pdo->prepare($sql);
			$result = $education_message->execute([':EDU_NAME'=> $_POST[$EDU_NAME],':MONTH'=> $_POST[$MONTH],':YEAR'=>$_POST[$YEAR],':DEGREE'=>$_POST[$DEGREE],':COURSE'=>$_POST[$COURSE],':UNIVERSITY'=>$_POST[$UNIVERSITY],':UNIVERSITY'=>$_POST[$UNIVERSITY],':EDU_ID'=>$_POST[$EDU_ID]]);
			if($result>0){
				$education_message = "EDUCATION UPDATED";
			}

			else{
				$education_message = "EDUCATION NOT UPDATED";
			}

	}

}
// ----------------------------- ADD EDUCATION BEGIN -------------------
include 'database_connection.php';
$sql = "SELECT * from EDUCATION WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$education_array_data = array();

while($row = $result->fetch())	
{

	$education_array_data[] = $row;

}

$education_message = "";

if(isset($_POST['EDUCATION_ADD_BUTTON'])){

	$EDU_NAME = $_POST['NAME_EDUCATION_1'];
	  $MONTH = $_POST['MONTH_EDUCATION_1'];
	  $YEAR = $_POST['YEAR_EDUCATION_1'];
	  $DEGREE = $_POST['DEGREE_EDUCATION_1'];
	  $COURSE = $_POST['COURSE_EDUCATION_1'];
	  $UNIVERSITY= $_POST['UNIVERSITY_EDUCATION_1'];
	  $username="Shubham";

		$sql = "INSERT INTO EDUCATION (EDU_NAME,MONTH,YEAR,DEGREE,COURSE,UNIVERSITY,USER_NAME) VALUES(:NAME_EDUCATION_1,:MONTH_EDUCATION_1,:YEAR_EDUCATION_1,:DEGREE_EDUCATION_1,:COURSE_EDUCATION_1,:UNIVERSITY_EDUCATION_1,:USER_NAME)";

			$result = $pdo->prepare($sql);
			$result->execute([':NAME_EDUCATION_1'=>$EDU_NAME ,':MONTH_EDUCATION_1'=> $MONTH,':YEAR_EDUCATION_1'=>$YEAR,':DEGREE_EDUCATION_1'=>$DEGREE,':COURSE_EDUCATION_1'=>$COURSE,':UNIVERSITY_EDUCATION_1'=>$UNIVERSITY,'USER_NAME'=>$username]);
			// if($result>0){
				$education_message = "EDUCATION UPDATED";
			// ÷
			// else{
			// 	$education_message = "EDUCATION NOT UPDATED";
			// }
	}
// ------------------- EDUCATION ENDS ------------------


	// -------------HIRE ME BEGINS ---------------

include 'database_connection.php';
$sql = "SELECT * from HIRE WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$hire_array_data = array();

while($row = $result->fetch())	
{

	$hire_array_data[] = $row;

}

$hire_message = "";

if(isset($_POST['HIRE_BUTTON'])){
	for ($i=0; $i < count($hire_array_data) ; $i++) { 
		$HIRE_NAME = "HIRE_NAME".$i;
		$HIRE_IMG = "HIRE_IMG".$i;
		$HIRE_AMOUNT = "HIRE_AMOUNT".$i;
		$HIRE_DESC = "HIRE_DESC".$i;
		$HIRE_INFO1 = "HIRE_INFO1".$i;
		$HIRE_INFO2 = "HIRE_INFO2".$i;
		$HIRE_INFO3 = "HIRE_INFO3".$i;
		$HIRE_ID = "HIRE_ID".$i;
		$HIRE_IMG_FILE = "HIRE_IMG_FILE".$i;



		$file = $_FILES[$HIRE_IMG_FILE];

			$file_name = $file['name'];
			$file_temp_name = $file['tmp_name'];
			$file_size = $file['size'];
			$file_error = $file['error'];
			$file_type = $file['type'];


			$file_extension = explode('.', $file_name);
			$actual_extension = strtolower(end($file_extension));

			$allowed_extension	= array('png','jpeg','jpg');

			if(in_array($actual_extension, $allowed_extension)){
				if($file_error === 0){
					if($file_size < 10000000000){
						$new_file_name = $file_name.".".$actual_extension;
						$new_file_name1 = substr($new_file_name, 0,strrpos($new_file_name,'.'));
						$file_destination = $new_file_name;
						move_uploaded_file($file_temp_name, $file_destination);
					}

					else{
						$hire_message = "file size execiding";

					}
				}

				else{
					$hire_message = "could not upload the file";
				}
			}

			else{
				$hire_message = "upload file";
			}





		$sql = "update HIRE SET
				HIRE_NAME=:HIRE_NAME,
				HIRE_IMG=:HIRE_IMG,
				HIRE_AMOUNT=:HIRE_AMOUNT,
				HIRE_DESC=:HIRE_DESC,
				HIRE_INFO1=:HIRE_INFO1,
				HIRE_INFO2=:HIRE_INFO2,
				HIRE_INFO3=:HIRE_INFO3
				WHERE HIRE_ID=:HIRE_ID";



				if(strlen($_FILES[$HIRE_IMG_FILE]['name'])>0){
					$temp = ($_FILES[$HIRE_IMG_FILE]['name']);
				}

				else{
					$temp = $hire_array_data[$i]['HIRE_IMG'];
				}

			$hire_message = $pdo->prepare($sql);
			$result = $hire_message->execute([':HIRE_NAME'=> $_POST[$HIRE_NAME],':HIRE_IMG'=> $temp,':HIRE_AMOUNT'=>$_POST[$HIRE_AMOUNT],':HIRE_DESC'=>$_POST[$HIRE_DESC],':HIRE_INFO1'=>$_POST[$HIRE_INFO1],':HIRE_INFO2'=>$_POST[$HIRE_INFO2],':HIRE_INFO3'=>$_POST[$HIRE_INFO3],':HIRE_ID'=>$_POST[$HIRE_ID]]);
			if($result>0){
				$hire_message = "HIRE UPDATED";
			}

			else{
				$hire_message = "HIRE NOT UPDATED";
			}

	}

}

// -------------------------- ADD HIRE ME ------------------------

include 'database_connection.php';
$sql = "SELECT * from HIRE WHERE 1";
$result = $pdo->prepare($sql);
$result->execute();

$hire_array_data = array();

while($row = $result->fetch())	
{

	$hire_array_data[] = $row;

}

$hire_message_1 = "";



if(isset($_POST['HIRE_ADD_BUTTON'])){ 


	$HIRE_NAME = $_POST['HIRE_NAME_1'];
	  $HIRE_AMOUNT = $_POST['HIRE_AMOUNT_1'];
	  $HIRE_DESC = $_POST['HIRE_DESC_1'];
	  $HIRE_INFO1 = $_POST['HIRE_INFO1_1'];
	  $HIRE_INFO2 = $_POST['HIRE_INFO2_1'];
	  $HIRE_INFO3= $_POST['HIRE_INFO3_1'];
	  
	$username="Shubham";

		$file = $_FILES['HIRE_IMG_FILE_1'];

			$file_name = $file['name'];
			$file_temp_name = $file['tmp_name'];
			$file_size = $file['size'];
			$file_error = $file['error'];
			$file_type = $file['type'];


			$file_extension = explode('.', $file_name);
			$actual_extension = strtolower(end($file_extension));

			$allowed_extension	= array('png','jpeg','jpg');

			if(in_array($actual_extension, $allowed_extension)){
				if($file_error === 0){
					if($file_size < 10000000000){
						$new_file_name = $file_name.".".$actual_extension;
						$new_file_name1 = substr($new_file_name, 0,strRpos($new_file_name,'.'));
						$file_destination = $new_file_name1;
						move_uploaded_file($file_temp_name, $file_destination);
					}

					else{
						$hire_message_1 = "file size execiding";

					}
				}

				else{
					$hire_message_1 = "could not upload the file";
				}
			}

			else{
				$hire_message_1 = "upload file";
			}



			$sql = "INSERT INTO HIRE (HIRE_NAME,HIRE_IMG,HIRE_AMOUNT,HIRE_DESC,HIRE_INFO1,HIRE_INFO2,HIRE_INFO3,USER_NAME) VALUES(:HIRE_NAME_1,:HIRE_IMG_FILE_1,:HIRE_AMOUNT_1,:HIRE_DESC_1,:HIRE_INFO1_1,:HIRE_INFO2_1,:HIRE_INFO3_1,:USER_NAME)";



			$temp = ($_FILES['HIRE_IMG_FILE_1']['name']);



			$result = $pdo->prepare($sql);
			$result->execute([':HIRE_NAME_1'=>$HIRE_NAME ,':HIRE_IMG_FILE_1'=> $temp,':HIRE_AMOUNT_1'=>$HIRE_AMOUNT,':HIRE_DESC_1'=>$HIRE_DESC,':HIRE_INFO1_1'=>$HIRE_INFO1,':HIRE_INFO2_1'=>$HIRE_INFO2,':HIRE_INFO3_1'=>$HIRE_INFO3,'USER_NAME'=>$username]);
			// if($result>0){
				$hire_message_1 = "HIRE ADDED";
			// ÷;
			
	}
// --------------------------- hire me add ends --------------------




	// ---------------- delete work experience begins here -------------

			include 'database_connection.php';
			$sql = "SELECT * from WORK_EXP WHERE 1";
			$result = $pdo->prepare($sql);
			$result->execute();

			$array_data = array();

			while($row = $result->fetch())	
			{

				$array_data[] = $row;

			}

			$delete_message = "";


			if(isset($_POST['delete_work_user'])){
				$APP = $_POST['APP'];
				$SQL = "delete from WORK_EXP where APP=:APP";

				$result = $pdo->prepare($SQL);
						$result->execute([':APP' => $APP]);

					$delete_message = "DELETED SUCCESFULLY";	

				}

// ------------------------- delete education begins --------------------
			
			
			$sql1 = "SELECT * from EDUCATION WHERE 1";
			$result1 = $pdo->prepare($sql1);
			$result1->execute();

			$array_data1 = array();

			while($row = $result1->fetch())	
			{

				$array_data1[] = $row;

			}

			$delete_edu_message = "";


			if(isset($_POST['delete_edu_user'])){
				$DEGREE = $_POST['DEGREE'];
				$SQL1 = "delete from EDUCATION where DEGREE=:DEGREE";

				$result1 = $pdo->prepare($SQL1);
						$result1->execute([':DEGREE' => $DEGREE]);

					$delete_edu_message = "DELETED SUCCESFULLY";	

				}

// ------------------------ DELETE HIRE BEGINS ------------------------
			$sql2 = "SELECT * from HIRE WHERE 1";
			$result2 = $pdo->prepare($sql2);
			$result2->execute();

			$array_data2 = array();

			while($row = $result2->fetch())	
			{

				$array_data2[] = $row;

			}

			$delete_hire_message = "";


			if(isset($_POST['delete_hire_user'])){
				$HIRE_DESC = $_POST['HIRE_DESC'];
				$SQL2 = "delete from HIRE where HIRE_DESC=:HIRE_DESC";

				$result2 = $pdo->prepare($SQL2);
						$result2->execute([':HIRE_DESC' => $HIRE_DESC]);

					$delete_hire_message = "DELETED SUCCESFULLY";	

				}

// ---------------------- END ----------------------------------
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
			<!-- header section end here -->
			<!-- body starts here -->
			<div id = "skill_body">
			</div>
			<div class="rec">
				<div id = "label">
					<label> Admin page </label>
				</div>

<!-- -------------------------- work experience ----------------------- -->

				<form action="#" method="POST" id="FORM" class="form">
					<label id = "highlight"> Update work experience</label>
					<?php echo $message ?>

					<?php for($i=0;$i<count($array_data);$i++): ?>

						<hr>

						<div class="admin_work_exp">
							<label>WORK_EXP_NAME<?php echo $i+1?></label>
							<input type="text" name="<?php echo "WORK_EXP_NAME".$i; ?>" value="<?php echo $array_data[$i]['WORK_EXP_NAME']?>">	
						</div>

						<div class="admin_work_exp">
							<label>MONTH<?php echo $i+1?></label>
							<input type="text" name="<?php echo "MONTH".$i; ?>" value="<?php echo $array_data[$i]['MONTH']?>">	
						</div>

						<div class="admin_work_exp">
							<label>YEAR<?php echo $i+1?></label>
							<input type="text" name="<?php echo "YEAR".$i; ?>" value="<?php echo $array_data[$i]['YEAR']?>">	
						</div>

						<div class="admin_work_exp">
							<label>APP<?php echo $i+1?></label>
							<input type="text" name="<?php echo "APP".$i; ?>" value="<?php echo $array_data[$i]['APP']?>">	
						</div>

						<div class="admin_work_exp">
							<label>DEVELOPER<?php echo $i+1?></label>
							<input type="text" name="<?php echo "DEVELOPER".$i; ?>" value="<?php echo $array_data[$i]['DEVELOPER']?>">	
						</div>

						<div class="admin_work_exp">
							<label>SEC_DEVELOPER<?php echo $i+1?></label>
							<input type="text" name="<?php echo "SEC_DEVELOPER".$i; ?>" value="<?php echo $array_data[$i]['SEC_DEVELOPER']?>">	
						</div>

						<div class="admin_work_exp">
							<label>EXPLANATION<?php echo $i+1?></label>
							<input type="text" name="<?php echo "EXPLANATION".$i; ?>" value="<?php echo $array_data[$i]['EXPLANATION']?>">	
						</div>

						<input type="text" class="hide" name="<?php echo 'WORK_EXP_ID'.$i; ?>" value ="<?php echo $array_data[$i]['WORK_EXP_ID'] ?> ">
					<?php endfor; ?>

					<br>
					<br>
					<button type = "submit" value="submit" name = "WORK_EXPERIENCE_BUTTON" class="WORK_EXPERIENCE_BUTTON">UPDATE</button>
					<hr>
				</form>


<!-- ----------------- add work experience -------------------------- -->

				<form action="#" method="POST" id="FORM" class="form">
					<label id = "highlight"> Add Work Experience </label>
					<?php echo $message ?>

						<hr>

						<div class="admin_work_exp">
							<label>WORK_EXP_NAME</label>
							<input type="text" name="NAME_WORK_EXPERIENCE_1">	
						</div>

						<div class="admin_work_exp">
							<label>MONTH</label>
							<input type="text" name="MONTH_WORK_EXPERIENCE_1" >	
						</div>

						<div class="admin_work_exp">
							<label>YEAR</label>
							<input type="text" name="YEAR_WORK_EXPERIENCE_1" >	
						</div>

						<div class="admin_work_exp">
							<label>APP</label>
							<input type="text" name="APP_WORK_EXPERIENCE_1" >	
						</div>

						<div class="admin_work_exp">
							<label>DEVELOPER</label>
							<input type="text" name="DEVELOPER_WORK_EXPERIENCE_1" >	
						</div>

						<div class="admin_work_exp">
							<label>SEC_DEVELOPER</label>
							<input type="text" name="SEC_DEVELOPER_WORK_EXPERIENCE_1" >	
						</div>

						<div class="admin_work_exp">
							<label>EXPLANATION</label>
							<input type="text" name="EXPLANATION_WORK_EXPERIENCE_1" >	
						</div>

						<input type="text" class="hide" name="ID_WORK" >


					<br>
					<br>
					<button type = "submit" value="submit" name = "WORK_EXPERIENCE_ADD_BUTTON" class="WORK_EXPERIENCE_BUTTON">ADD_WORK_EXPERIENCE</button>
					<hr>
				</form>


<!-- -------------------- education page ------------------------------- -->

				<form action="#" method="POST" id="FORM" class="form">
					<label id = "highlight"> update education page </label>

					<?php echo $education_message ?>

					<?php for($i=0;$i<count($education_array_data);$i++): ?>

						<hr>

						<div class="admin_work_exp">
							<label>EDU_NAME<?php echo $i+1?></label>
							<input type="text" name="<?php echo "EDU_NAME".$i; ?>" value="<?php echo $education_array_data[$i]['EDU_NAME']?>">	
						</div>

						<div class="admin_work_exp">
							<label>MONTH<?php echo $i+1?></label>
							<input type="text" name="<?php echo "MONTH".$i; ?>" value="<?php echo $education_array_data[$i]['MONTH']?>">	
						</div>

						<div class="admin_work_exp">
							<label>YEAR<?php echo $i+1?></label>
							<input type="text" name="<?php echo "YEAR".$i; ?>" value="<?php echo $education_array_data[$i]['YEAR']?>">	
						</div>

						<div class="admin_work_exp">
							<label>DEGREE<?php echo $i+1?></label>
							<input type="text" name="<?php echo "DEGREE".$i; ?>" value="<?php echo $education_array_data[$i]['DEGREE']?>">	
						</div>

						
						<div class="admin_work_exp">
							<label>COURSE<?php echo $i+1?></label>
							<input type="text" name="<?php echo "COURSE".$i; ?>" value="<?php echo $education_array_data[$i]['COURSE']?>">	
						</div>

						<div class="admin_work_exp">
							<label>UNIVERSITY<?php echo $i+1?></label>
							<input type="text" name="<?php echo "UNIVERSITY".$i; ?>" value="<?php echo $education_array_data[$i]['UNIVERSITY']?>">	
						</div>

						<input type="text" class="hide" name="<?php echo 'EDU_ID'.$i; ?>" value ="<?php echo $education_array_data[$i]['EDU_ID'] ?> ">

					<?php endfor; ?>

					<br>
					<br>
					<button type = "submit" value="submit" name = "EDUCATION_BUTTON" class="EDUCATION_BUTTON">UPDATE</button>
					<hr>
				</form>
<!-- ------------------- education form end -----------------				 -->

<!-- --------------------- EDUCATION ADD BEGIN ----------------- -->
				<form action="#" method="POST" id="FORM" class="form">
					<label id = "highlight"> ADD education page </label>

					<?php echo $education_message ?>

						<hr>

						<div class="admin_work_exp">
							<label>EDU_NAME</label>
							<input type="text" name="NAME_EDUCATION_1">	
						</div>

						<div class="admin_work_exp">
							<label>MONTH</label>
							<input type="text" name="MONTH_EDUCATION_1" >	
						</div>

						<div class="admin_work_exp">
							<label>YEAR</label>
							<input type="text" name="YEAR_EDUCATION_1" >	
						</div>

						<div class="admin_work_exp">
							<label>DEGREE</label>
							<input type="text" name="DEGREE_EDUCATION_1" >	
						</div>

						<div class="admin_work_exp">
							<label>COURSE</label>
							<input type="text" name="COURSE_EDUCATION_1" >	
						</div>

						<div class="admin_work_exp">
							<label>UNIVERSITY</label>
							<input type="text" name="UNIVERSITY_EDUCATION_1" >	
						</div>

						<input type="text" class="hide" name="ID_EDUCATION" >



					<br>
					<br>
					<button type = "submit" value="submit" name = "EDUCATION_ADD_BUTTON" class="EDUCATION_BUTTON">ADD_EDUCATION</button>
					<hr>
				</form>

<!-- ----------------------- EDUCATION ADD ENDS ----------------- -->
<!-- ----------------- HIRE ME BEGIN ----------------------------- -->

<form action="#" method="POST" id="FORM" class="form" 	enctype="multipart/form-data">
					<label id = "highlight"> HIRE_ME page </label>

					<?php echo $hire_message ?>

					<?php for($i=0;$i<count($hire_array_data);$i++): ?>

						<hr>

						<div class="admin_work_exp">
							<label>HIRE_NAME<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_NAME".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_NAME']?>">
						</div>


						<div class="admin_work_exp" id = "update_hire_img">
							<label>HIRE_IMG<?php echo $i+1?></label>
							<img src="<?php echo $hire_array_data[$i]['HIRE_IMG'] ?>" class = "profile" alt = "nothing">

							<label>CHOOSE IMAGE</label>
							<input type="file" name="<?php echo "HIRE_IMG_FILE".$i; ?>">	
						</div>


						<div class="admin_work_exp">
							<label>HIRE_AMOUNT<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_AMOUNT".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_AMOUNT']?>">	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_DESC<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_DESC".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_DESC']?>">	
						</div>

						
						<div class="admin_work_exp">
							<label>HIRE_INFO1<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_INFO1".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_INFO1']?>">	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_INFO2<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_INFO2".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_INFO2']?>">	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_INFO3<?php echo $i+1?></label>
							<input type="text" name="<?php echo "HIRE_INFO3".$i; ?>" value="<?php echo $hire_array_data[$i]['HIRE_INFO3']?>">	
						</div>


						<input type="text" class="hide" name="<?php echo 'HIRE_ID'.$i; ?>" value ="<?php echo $hire_array_data[$i]['HIRE_ID'] ?> ">

					<?php endfor; ?>

					<br>
					<br>
					<button type = "submit" value="submit" name = "HIRE_BUTTON" class="HIRE_BUTTON">UPDATE</button>
					<hr>
				</form>
<!-- --------------------- hire me update ends ------------------------- -->

<!-- -------------------- hire me add -------------------------------------- -->

<form action="#" method="POST" id="FORM" class="form" enctype="multipart/form-data">
					<label id = "highlight"> ADD hire me page </label>

					<?php echo $hire_message_1 ?>

						<hr>

						<div class="admin_work_exp">
							<label>HIRE_NAME</label>
							<input type="text" name="HIRE_NAME_1">	
						</div>

						<div class="admin_work_exp">
							<label>HIRE IMAGE</label>
							<br>
							<label>CHOOSE IMAGE</label>
							<input type="file" name="HIRE_IMG_FILE_1">	
						</div>


						<div class="admin_work_exp">
							<label>HIRE_AMOUNT</label>
							<input type="text" name="HIRE_AMOUNT_1" >	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_DESC</label>
							<input type="text" name="HIRE_DESC_1" >	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_INFO1</label>
							<input type="text" name="HIRE_INFO1_1" >	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_INFO2</label>
							<input type="text" name="HIRE_INFO2_1" >	
						</div>

						<div class="admin_work_exp">
							<label>HIRE_INFO3</label>
							<input type="text" name="HIRE_INFO3_1" >	
						</div>

					<br>
					<br>
					<button type = "submit" value="submit" name = "HIRE_ADD_BUTTON" class="HIRE_BUTTON">ADD_HIRE_ME_INFO</button>
					<hr>
				</form>

<!-- --------------------- HIRE ME ENDS ---------------------------- -->

<!-- ------------------------------work exp delete begins here ----------------------- -->
					<form method="POST" id="delete_form" enctype="multipart/form-data">
						<hr>

						<br>
						<br>

						<label id = "highlight"> DELETE WORK EXPERIENCE  </label>

						<?php echo $delete_message ?>
						<br>
						<br>

						<label>APPS</label>
						<select name = "APP">
							<?php for($i=0;$i<count($array_data);$i++): ?>
								<option value = "<?php echo $array_data[$i]['APP']?>"><?php echo $array_data[$i]['APP'] ?></option>
							<?php endfor; ?>
							
						</select>

						<button type="submit" value="submit" name="delete_work_user" class="getin">DELETE_WORK</button>

						<hr>
						
					</form>


<!-- ------------------------------ education delete begins ----------------------- -->
				<form method="POST" id="delete_form" enctype="multipart/form-data">
						<hr>

						<label id = "highlight"> DELETE EDUCATION FIELD  </label>

						<br>
						<br>

						<?php echo $delete_edu_message ?>
						<br>
						<br>

						<label>DEGREE</label>
						<select name = "DEGREE">
							<?php for($i=0;$i<count($array_data1);$i++): ?>
								<option value = "<?php echo $array_data1[$i]['DEGREE']?>"><?php echo $array_data1[$i]['DEGREE'] ?></option>
							<?php endfor; ?>
							
						</select>

						<button type="submit" value="submit" name="delete_edu_user" class="getin">DELETE_EDUCATION</button>

						<hr>
						
					</form> 
<!-- --------------- delete form hire me begins ----------------------------- -->
				<form method="POST" id="delete_form" enctype="multipart/form-data">
						<hr>

						<label id = "highlight"> DELETE HIRE FIELD  </label>

						<br>
						<br>

						<?php echo $delete_hire_message ?>
						<br>
						<br>

						<label>HIRE_DESC</label>
						<select name = "HIRE_DESC">
							<?php for($i=0;$i<count($array_data2);$i++): ?>
								<option value = "<?php echo $array_data2[$i]['HIRE_DESC']?>"><?php echo $array_data2[$i]['HIRE_DESC'] ?></option>
							<?php endfor; ?>
							
						</select>

						<button type="submit" value="submit" name="delete_hire_user" class="getin">DELETE_HIRE</button>

						<hr>
						
					</form> 
					</form> 
<!-- ----------------------- delete form ends -------------------------- -->
			</div>	
		</div>
				
		<!-- my skill end above -->
	</div>
	<div id = "my_foot_admin">
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
