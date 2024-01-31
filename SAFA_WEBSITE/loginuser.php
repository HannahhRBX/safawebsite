<?php
require 'inputProcessor.php';

// Database connection details
$conn = mysqli_connect("localhost", "root", "", "cheeseshop");

// Get Username from Given Email
function GetUsernameFromEmail(string $email){
    $filteredEmail = InputProcessor::process_email($email,3,30);
    if ($filteredEmail["valid"] == true){
        $filteredEmail = $filteredEmail["text"];
        // Make sure any user input is sanitized before querying
        $query = "SELECT Username FROM users WHERE Email = '$filteredEmail'";
        $conn = mysqli_connect("localhost", "root", "", "cheeseshop");
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) < 1){
            return false;
        }
        // Return fetched username record from email
        return mysqli_fetch_assoc($result)['Username'];
    }
    
}

// Get email and verification code from the form, code must be 6 numbers
$code = InputProcessor::process_number("Verification Code",$_POST['code'],6,6);
if ($code["valid"] == false){
    header("Location: login.php?err=".urlencode("Verification code is invalid."));
    exit;
}else{
    $code = $code["text"];
}

// Process Email, if not valid return to login with error code
$email = InputProcessor::process_email($_POST['email'],3,30);
if ($email["valid"] == false){
    header("Location: login.php?err=".urlencode("Email is invalid."));
    exit;
}else{
    $email = $email["text"];
}

// Build the SQL query
$query = "SELECT * FROM verify WHERE code = '$code' AND email = '$email'";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there is a matching record
if (mysqli_num_rows($result) >= 1) {
// Login was successful

    $record = mysqli_fetch_assoc($result);
    if ($record['expires'] < (time() + 600)){ // Check if code is not expired
        // Start a session once valid and store the user's information
        session_start();
        $username = GetUsernameFromEmail($record['email']);
        echo var_dump($username);
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = true;
        // Redirect to the protected page
        header('Location: index.php');
        exit;
    }

} else {
    $code = array("valid"=>false,"text"=>"Verification code is invalid.");
}



?>
