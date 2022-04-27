<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
 
    if (isset($_POST["register"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'tanugangrade1@gmail.com';
 
            //SMTP password
            $mail->Password = '';//add pass 
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to,
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('tanugangrade1@gmail.com', 'EmailTester');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            // connect with database
            $conn = mysqli_connect("localhost", "root", "", "test");
 
            // insert in users table
            $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
            mysqli_query($conn, $sql);
 
            header("Location: email-verification.php?email=" . $email);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

<!doctype html>
<html>
 <head>
  <!-- CSS -->
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
  

  <style>
 body{
     background-color:#b7e1df;
     color:#1e4846;
     margin-top:150px;
 }
 input {
     /* align:center; */
    height:28px; width:230px; border:1px solid #000000; color:#080707; font-weight:bold; opacity:0.9;
}
  </style>
</head>
<body>
   
<center>
<div style="width:400px">
<h1 class="center" >Hello! Register here </h1> <br>
        <form method="POST">
          
           <!-- name input -->
          <div class="form-outline col ">
            <input type="text" id="form3Example3" class="form-control"
              placeholder="Enter username" name="name" required/>
            <label class="form-label" for="form3Example3">Username</label>
          </div>

          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control"
              placeholder="Enter a valid email address" name="email" required/>
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" required />
            <label class="form-label" for="form3Example4">Password</label>
          </div>

       
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-lg"  name="register"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#1e4846 ;color:#b7e1df" >Register</button>
            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p> -->
          </div>

        </form>
      </div>
</center>
</body>
</html>