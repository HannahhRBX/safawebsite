<?php
require "mail.php";
require 'inputProcessor.php';

// Function that returns email from Username after sanitization
function GetEmailFromUsername(string $username){
  $query = "SELECT Email FROM users WHERE Username = '$username'";
  $conn = mysqli_connect("localhost", "root", "", "cheeseshop");
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) < 1){
    return false;
  }
  // Return fetched SQL record when email found from username
  return mysqli_fetch_assoc($result)['Email'];
}

// Function to create verification code using the user's email
function CreateVerificationCode(string $email){
  $code = rand(100000,999999); // Generate random 6-digit code
  $expires = (time() + 600);
  $conn = mysqli_connect("localhost", "root", "", "cheeseshop");
  // Make sure there are no other codes for same email by deleting old ones
  $sql = "DELETE from verify WHERE email = '$email'"; 
  mysqli_query($conn, $sql);
  // Create new code with 10 minute expiry
  $sql = "INSERT into verify (code, expires, email) VALUES ('$code', '$expires', '$email')";
  mysqli_query($conn, $sql);
  return $code;
}

// Check POST for email so a verifcation code can be sent to the user
if ($_SERVER['REQUEST_METHOD'] == "POST"){
  // Sanatize the input username
  $username = InputProcessor::process_alphanumeric_string("Username",$_POST['username'],6,20,false);
  // Redirect user back to login if santizition check unsuccessful
  if ($username["valid"] === false) {
    header("Location: login.php?err=".$username["text"]);
    exit;
  }else{
    $username = $username["text"];
    $email = GetEmailFromUsername($username);
    // Check if email exists in the registered user's database before sending an email.
    if ($email != false){
      // If customer exists in database, an email will be sent to their inbox
      $code = CreateVerificationCode($email);
      // Use PHP Mailer to send an email to the user's email address
      send_mail($email,"Sign in to SAFA","Your verification code is: ".$code.".");
    }
  }
}

?>

<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <style>
    body {
      margin: 20px;
    }

    form {
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      text-align:center;
      font-size: 20px;
    }
  </style>
</head>

<body>
    <div class="container">
    <h1 class="display-1 text-center mb-5">The Cheese Shop - Login!</h1>
    <div class="display-6 text-center mb-5">Check your email for a Verification Code</div>
    
    <form action="loginuser.php" method="post" style="width: 300px;">
        <label for="code">Code:</label><br>
        <input type="text" id="code" name="code" style="width: 100%;"><br>
        <input type="hidden" id="email" name="email" value="<?= $email ?>" style="width: 100%;">
        <label style="color: red;"><?php if (isset($_GET['err'])){echo $_GET['err'];}else{echo "";} ?></label><br>
        <input type="submit" value="Login" style="margin-top: 13px;">
    </form>
    </div>

</body>

</html>


