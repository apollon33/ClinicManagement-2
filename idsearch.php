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
	<title>Clinic Management</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/
	bootstrap/4.1.3/css/bootstrap.min.css">


	<center>
		<h1>Clinic Management System</h1>
		<p>Better Health Care</p><br>
		<a href="addpatient.php">Add Patient</a>
		<a href="doctor.php">Add Doctor</a>
		<a href="psearch.php">Search Patient</a>
		<a href="">Search Patient</a>
		<a href="checkup.php">Patients Checkup</a>
	
	</center>
</head>
<body class="d">
	<h1>Search Patient</h1>
	<fieldset>
		<legend> Search Patient ID</legend>
	 	  <form action="" method="POST">
			<input type="text" name="patient_id"
			placeholder="Patient's ID">
			<br><br>		
			<input type="Submit" value="Search Patient" class="btn btn-danger">
		</form>
	</fieldset>
</body>
</html>
<br>

<?php
 	if (empty($_POST)) {
 		exit();

 	}

 	$object = new PatientID($_POST['patient_id']);
 	$object->Search();

 	class PatientID{
		function __construct($patient_id){
			$this->patient_id = $patient_id;

		}//end

		function search(){
			$conn = mysqli_connect("localhost","root","","table_db");
			$response = mysqli_query($conn,"SELECT  * FROM table_patientS WHERE patient_id = '$this->patient_id'");

			//count your repsonse
			if (mysqli_num_rows($response) == 0) {
				echo "No Matching Records Found!.Try Again";
				exit();
			
			}


			else{
					//get all colms for the first row found
					echo "<table border=1 widht = 100% class='table table-dark table-striped table-hover'>";
					while($colm = mysqli_fetch_array($response))
					{
						echo "<tr>";
					echo  "<td> $colm[0] </td> ";
					echo "<td> $colm[1] </td>";
					echo "<td> $colm[2] </td>";
					echo "<td> $colm[3] </td>";
					echo "<td> $colm[4] </td>";
					echo "<td> $colm[5] </td>";
					echo "<td> $colm[6] </td>";
					echo "<td> $colm[7] </td>";
					echo "<td> $colm[8] </td>";
					echo "<td> <a href =''class= 'btn btn-danger'>DELETE</a></td>";
					echo "<td> <a href ='' class = 'btn btn-info'>ALLOCATE</a></td>";
					echo "</tr>";
				}//ends else

					}//ends while
					echo "</table>";
		}//ends function
}//end

?>
