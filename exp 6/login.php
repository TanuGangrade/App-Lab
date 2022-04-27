<?php
     
    if (isset($_POST["login"]))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "test");
 
        // check if credentials are okay, and email is verified
        $sql = "SELECT * FROM users WHERE email = '" . $email . "'";
        $result = mysqli_query($conn, $sql);
 
        if (mysqli_num_rows($result) == 0)
        {
            die("Email not found.");
        }
 
        $user = mysqli_fetch_object($result);
 
        if (!password_verify($password, $user->password))
        {
            die("Password is not correct");
        }
 
        if ($user->email_verified_at == null)
        {
            die("Please verify your email <a href='email-verification.php?email=" . $email . "'>from here</a>");
        }
 
        echo "<body style='background-color:lightblue ;text-align:center; margin-top:250px'><h1>✨HELLO !✨ 🌺WELCOME🌺 ✨ </h1></body>";
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
     background-color:#b7e1df;
     color:#1e4846;
     margin-top:150px;
 }

  </style>
</head>
<body>
   
<center>
<div style="width:400px">
<h1 class="center" >Hello! Login here </h1> <br>
        <form method="POST">
          
           
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
            <button type="submit" class="btn btn-lg"  name="login"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color:#1e4846 ;color:#b7e1df" >Login</button>
            <p >Don't have an account? <a href="register.php" style="text-decoration:none;color=black">Register</a></p>
          </div>

        </form>
      </div>
</center>
</body>
</html>
