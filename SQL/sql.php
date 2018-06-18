<?php
	$servername = "localhost";
	$username = "root";
	$password = "02041993";
	$dbname = "db_multi";

	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$data = '';
	for($i = 1; $i < 10; $i++){
		//$data .= "('Name', 5, 23, 'aaa'),";
		$data .= "(CONCAT('Studen-', $i ), ROUND((RAND() * (10-1))+1) , ROUND((RAND() * (100-1))+1), 'ss'),";
	}
	$db = rtrim($data, ',');
	
	$sql = "INSERT INTO students ( name, class_id, age, description) VALUES {$db}";
	/*var_dump($sql); die();*/
	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: Failed";
	}