<?php 

    $email = $_POST['email'];

    //Mongo Database connection
	$connection = new Mongo();
    $db= $connection->mongophp;

    $result = $db->users->findOne(array('email' => $email));

    $name = $result['name'];
    $gender = $result['gender'];
    $number = $result['number'];

    echo json_encode(array('name' => $name, 'gender' => $gender, 'number' => $number));
    exit();
    ?>