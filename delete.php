<?php
		//	Receive The patient_id
	$patient_id = $_GET['patient_id'];
		//Use it in deletion query
		$conn = mysqli_connect("localhost","root","","table_db");
			$response = mysqli_query($conn, "DELETE FROM table_patients WHERE patient_id = '$patient_id'");

			echo "$patient_id has been Removed";
?>