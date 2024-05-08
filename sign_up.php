<?php

// Start the session
session_start();

// Include the connection file
include 'connection.php';

// Function to verify login credentials
function verifyLogin($email, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT id, first_name, email , password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($user_id, $first_name, $email, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
      // Set user_id in session
      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_email'] = $email;
      $_SESSION['user_name'] = $first_name;
      return true; // Passwords match, login successful
    } else {
        return false; // Passwords don't match, login failed
    }
}

// Usage example
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (verifyLogin($email, $password)) {
            // Login successful, you can redirect to dashboard
            header("Location: my_account.php");
            exit();
        } else {
            echo "Login failed. Invalid email or password.";
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="css/bus_booking.css" rel="stylesheet">
    <link href="css/mediaquery.css" rel="stylesheet">

    <title>Online Bus Seats Booking System</title>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <style>

      ::-webkit-scrollbar {
        background: #eeeeee;
        height: 5px;
        width: 5px;
      }

      ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 2px #002367;
      }

      ::-webkit-scrollbar-thumb {
        background: #002367;
        border-radius: 2px;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #002367; 
      }
    </style>


  </head>
  <body class="body_bg">

    <!--=============================================-->
  <!--===================header====================-->

    <!-- header section -->


    <div class="container">
      
      <div class="row login_section_div">
        
         

         <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-6 col-sm-12 col-12">
           
            <div class="shadow p-5 mb-1" data-aos="fade-down" style="background-color: #ffffff;">

              <div class="col" data-aos="fade-up" style="padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #f5c481;">
                <img src="images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>

               <p data-aos="fade-down">
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
               </p>

               <div class="clearfix"></div>

              <h1 class="heading mb-2"><b>LOGIN</b></h1>
              <form method="POST" action="sign_up.php">
             
              <div class="row">

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                    <img src="images/u_name.png" class="form_icon">
                  </div>
                </div>

               <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                 <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    <img src="images/pass.png" class="form_icon">
                  </div>
                </div>

                <div class="clearfix"></div>

                <p style="text-align: right; font-weight: 700;"><a href="forgot_password.php" class="a_link">Forgot Password?</a></p>

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <!-- <a href="login_dash.html"><button type="button" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px;"><span class="align-middle">LOGIN NOW</span></button></a> -->
                   <button type="submit" name="login" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px;"><span class="align-middle">LOGIN NOW</span></button>
                </div>

                <div class="clearfix"></div>
                <br>

                <p style="text-align: center;">
                  You Don’t Have an Account? Please <a href="register.php" class="a_link"><b>Register Here</b></a>
                </p>

                 <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2023 FINDER All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

              </div>
              </form>

            </div>

         </div>

         <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <br>
            <br>
            <img src="images/house.png" alt="" class="img-fluid mx-auto d-block">

         </div>

      </div>

    <div class="clearfix"></div>

    </div>


    <!-- header section -->

    <!--=============================================-->
  <!--===================header====================-->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js" ></script> 
      <script src="js/bootstrap.min.js" ></script>

  </body>
</html>