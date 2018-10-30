<?php
	session_start();
	if (isset($_SESSION['username'])){

		if ($_SESSION['role']=="nurse") {
					
		$username = $_SESSION['username'];
		echo "Welcome : $username";
		echo "<a href='logout.php'>Logout</a>";
			}

		else{
			echo "Acess Denied. Only Doctors";
			exit();
		}
	}

	else if (!isset($_SESSION['username'])) {
	header("location:login.php");
	exit();//kill

	}
	else{
		header("location:login.php");
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Patient</title>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/
	bootstrap/4.1.3/css/bootstrap.min.css">
    <center>
	<h1>Clinic Management</h1><br>
	<p>Better Health Care</p><br>
	<a href="addpatient.php">Add Patient</a>
	<a href="doctor.php">Add Doctor</a>
	<a href="psearch.php">Search Patient</a>
	<a href="">Search Doctor</a>
	<a href="checkup.php">Patients Checkup</a>
	</center>

	<h1>Add Patient</h1>
	<fieldset>
	<legend>Patient Details</legend>
	<form action="" method="POST">
		<input type="text" name="surname"
		placeholder="Surname">
		<br><br>

		<input type="text" name="fname"
		placeholder=" Enter Firstname">
		<br><br>

		<input type="text" name="lname"
		placeholder="Enter Lastname">
		<br><br>

		<input type="text" name="phone"
		placeholder="Enter Phone">
		<br><br>

		<input type="text" name="residence"
		placeholder="Place of Residence">
		<br><br>

		<input type="text" name="patient_id"
		placeholder="Enter Patients identity no">
		<br><br>

		<label>Select Gender</label>
		<input type="radio" name="gender" value="Male"> Male
		<input type="radio" name="gender" value="Female">Female
		<br><br>

		<input type="email" name="email"
		placeholder="Enter email">
		<br><br>

		<input type="Submit" nvalue="Save Patinet">
		
	</form>
	</fieldset>

</body>
</html>


<?php
	//This is the logic:we provide the constructor with the values from the form

	if (empty($_POST)) {

		exit();//quit executing PHP Code untill form button is clicked
	}
$object = new patient($_POST['surname'],
						$_POST['fname'],
						$_POST['lname'],
						$_POST['phone'],
						$_POST['residence'],
						$_POST['patient_id'],
						$_POST['gender'],
						$_POST['email']);

$object->save();#triggers the save function

class 	Patient{
	function __construct($surname,$fname,$lname,$phone,$residence,$patient_id,$gender,$email){

		$this->surname = $surname;
		$this->fname = $fname;
		$this->lname = $lname;
		$this->phone = $phone;
		$this->residence = $residence;
		$this->patient_id = $patient_id;
		$this->gender = $gender;
		$this->email = $email;

	}//end the constructor
	function save(){
		$conn = mysqli_connect("localhost","root","","table_db");
		//save to table
		$response = mysqli_query($conn,"INSERT INTO `table_patients`(`surname`, `fname`, 
			`lname`, `phone`, `residence`, `patient_id`, `gender`,  `email`)
			 VALUES ('$this->surname','$this->fname','$this->lname','$this->phone','$this->residence',
		
			 '$this->patient_id','$this->gender','$this->email')");

		if ($response==true) {
			echo "Succesfully Saved Record";
		}
		else{
		echo "Record Failed. Check Your Details";

		}
	}

}




?>