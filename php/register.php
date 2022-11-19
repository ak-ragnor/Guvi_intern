<?php
   error_reporting (E_ALL ^ E_NOTICE);
   mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
   session_start();

	$email = $_POST['email'];
	$pass = $_POST['password'];
    // $name = $_POST['name'];
	// $gender = $_POST['gender'];
	// $number = $_POST['number'];

	// echo json_encode(array('success' => $email));

	//SQL Database connection
	$conn = new mysqli('localhost','root','','sample');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
		echo "conne";
	} else {
		$stmt = $conn->prepare("insert into user(email, password) values(?, ?)");
		$stmt->bind_param("ss", $email, $pass);
		$execval = $stmt->execute();
		// echo $execval;
		echo json_encode(array('success' => 'success'));
        // echo "success";
		// echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

	//Mongo Database connection
	$connection = new Mongo();
    $db= $connection->mongophp;
    $rec['email'] = $_POST['email'];
    $rec['name'] = $_POST['name'];
	$rec['gender'] = $_POST['gender'];
	$rec['number'] = $_POST['number'];
    $db->users->insert ($rec);

?>