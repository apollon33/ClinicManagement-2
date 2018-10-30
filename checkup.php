<?php
	session_start();
	if (isset($_SESSION['username'])){
		$username = $_SESSION['username'];
		echo "Welcome : $username";
		echo "<a> href='logout.php'>Logout</a>";
	}

	else if (!isset($_SESSION['username'])) {
	header("location: login.php");
	exit();//kill
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Checkup</title>
</head>
<body>
    <center>
	<h1>Clinic Management</h1><br>
	<p>Better Health Care</p><br>
	<a href="addpatient.php">Add Patient</a>
	<a href="doctor.php">Add Doctor</a>
	<a href="">Search Patient</a>
	<a href="">Search Patient</a>
	<a href="">Patients Checkup</a>
	</center>

	<h1>Patient's Records</h1>
	<fieldset>
	<legend>Patient's Checkup</legend>
	<form action="" method="POST">
		<input type="text" name="patient_id"
		placeholder="Patients Id">
		<br><br>

		<input type="value" name="weight"
		placeholder=" Enter Patients weight">
		<br><br>

		<input type="value" name="height"
		placeholder="Enter Patients Height">
		<br><br>

		<input type="value" name="temperature"
		placeholder="Enter Patients Temperature">
		<br><br>

		<input type="text" name="description"
		placeholder="Patients Description">
		<br><br>

		

		

		<input type="Submit" nvalue="Save Patient's Records">
		
	</form>
	</fieldset>

</body>
</html>




<?php

	
	//This is the logic:we provide the constructor with the values from the form

	if (empty($_POST)) {

		exit();//quit executing PHP Code untill form button is clicked
	}
$object = new records($_POST['patient_id'],
						$_POST['weight'],
						$_POST['height'],
						$_POST['temperature'],
						$_POST['description']);

$object->save();#triggers the save function

class 	Records{
	function __construct($patient_id, $weight, $height, $temperature, $description){

		$this->patient_id = $patient_id;
		$this->weight = $weight;
		$this->height = $height;
		$this->temperature = $temperature;
		$this->description = $description;
		

	}//end the constructor
	function save(){
		$conn = mysqli_connect("localhost","root","","table_db");
		//save to table
		$response = mysqli_query($conn,"INSERT INTO `table_patients_info`(`patient_id`, `weight`, 
			`height`, `temperature`, `description`)
			 VALUES ('$this->patient_id','$this->weight','$this->height','$this->temperature',
			 '$this->description')");

		if ($response==true) {
			echo "Succesfully Saved Record";
		}
		else{
		echo "Record Failed. Check Your Details";

		}
	}

}






?>