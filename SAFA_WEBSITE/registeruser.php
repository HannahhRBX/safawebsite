<?php
require 'inputProcessor.php';
// Connect to the database

$conn = mysqli_connect("localhost", "root", "", "cheeseshop");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
     
}
// Get the form data
$UserArray = array();
$UserArray["username"] = InputProcessor::process_alphanumeric_string("Username",$_POST["username"],6,20,false);
$UserArray["email"] = InputProcessor::process_email($_POST["email"],3,30);
$UserArray["address"] = InputProcessor::process_alphanumeric_string("Address",$_POST["address"],5,80,true);
$valid = true;
var_dump($UserArray);
foreach ($UserArray as $Detail){
    if ($Detail["valid"] === false){
        $valid = false;
        header("Location: register.php?err=".$Detail["text"]);
        exit;
    }
}


$username = $UserArray["username"]["text"];
$email = $UserArray["email"]["text"];
$address = $UserArray["address"]["text"];
if ($valid === true){
    // Construct the INSERT statement
    $sql = "INSERT INTO users (Username, Email, Address) VALUES ('$username', '$email', '$address')";

    // Attempt to execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);

    $redirect_url = 'login.php';
    header('Location: ' . $redirect_url . '?login=Account created! Please login.', true, 301);
}


?>
