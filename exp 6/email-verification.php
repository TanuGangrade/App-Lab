<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
 
        // mark email as verified
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("  <body style='background-color:lightblue ;text-align:center; margin-top:250px'><h1>Wrong verification code</h1></body>"
            );
        }
 
        echo "<body style='background-color:lightblue ;text-align:center; margin-top:250px'><h1>You can <a href='login.php'> login</a> now.</h1></body>";
        exit();
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
     background-color:#078282FF;
     color:#95DBE5FF;
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
<h1 class="center" >Enter verification code from your email: </h1> <br>
        <form method="POST">
        <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
           
          <div class="form-outline col ">
            <input type="text" id="form3Example3" class="form-control" name="verification_code"
              placeholder="Enter username" name="name" required/>
            <label class="form-label" for="form3Example3">Code</label>
          </div>

         
       
          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-lg"  name="verify_email"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#95DBE5FF ;color:#078282FF" >Verify</button>
            <!-- <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-danger">Register</a></p> -->
          </div>

        </form>
      </div>
</center>
</body>
</html>