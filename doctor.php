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
	<a href="">Search Doctor</a>
	<a href="">Patients Checkup</a>
	</center>

	<h1>Doctor Records</h1>
	<fieldset>
	<legend>Doctor</legend>
	<form action="" method="POST">
		<input type="text" name="doctor_id"
		placeholder="Doctor's Id">
		<br><br>

		<input type="value" name="surname"
		placeholder=" Enter Surname">
		<br><br>

		<input type="value" name="others"
		placeholder="Enter Other Info">
		<br><br>

		<input type="value" name="debt"
		placeholder="Enter Department">
		<br><br>

		<input type="text" name="profession"
		placeholder="Doctor's profession">
		<br><br>

		<label>Select Gender</label>
		<input type="radio" name="gender" value="Male"> Male
		<input type="radio" name="gender" value="Female">Female
		<br><br>

		<input type="text" name="exp"
		placeholder="Doctor's Experience">
		<br><br>

		

		

		<input type="Submit" nvalue="Save Doctor's Records">
		
	</form>
	</fieldset>

</body>
</html>



<?php

	//This is the logic:we provide the constructor with the values from the form

	if (empty($_POST)) {

		exit();//quit executing PHP Code untill form button is clicked
	}
$object = new doctor($_POST['doctor_id'],
						$_POST['surname'],
						$_POST['others'],
						$_POST['debt'],
						$_POST['profession'],
						$_POST['gender'],
						$_POST['exp']);

$object->save();#triggers the save function

class 	Doctors{
	function __construct($doctor_id, $surname, $others,$debt, $profession,$gender, $exp){

		$this->doctor_id = $doctor_id;
		$this->surname = $surname;
		$this->others = $others;
		$this->debt = $debt;
		$this->profession = $profession;
		$this->gender = $gender;
		$this->exp = $exp;
		

	}//end the constructor
	function save(){
		$conn = mysqli_connect("localhost","root","","table_db");
		//save to table
		$response = mysqli_query($conn,"INSERT INTO `table_patients_info`(`doctor_id`, `surname`, 
			`others,'debt' ,`profession`,''gender', `exp`)
			 VALUES ('$this->doctor_id','$this->surname','$this->others','$this->debt','$this->profession',
			 '$this->gender','$this->exp')");

		if ($response==true) {
			echo "Succesfully Saved Record";
		}
		else{
		echo "Record Failed. Check Your Details";

		}
	}

}







?>