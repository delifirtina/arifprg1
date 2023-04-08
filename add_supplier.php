<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "inventory_management";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// Get form data
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone_number = $_POST['phone_number'];

	// Insert data into suppliers table
	$sql = "INSERT INTO suppliers (name, address, phone_number) VALUES ('$name', '$address', '$phone_number')";

	if ($conn->query($sql) === TRUE) {
		echo "New supplier added successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
?>
