<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
    $Gender = $_POST['Gender'];
	$phone = $_POST['phone']
	$message = $_POST['message'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into newContact(Name,email,Gender,phone,message) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sssis", $Name,$email,$Gender,$phone,$message);
		$stmt->execute();
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>