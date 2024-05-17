<?php
// Include the connection file
include 'connection.php';

// Function to generate a random token
function generateToken() {
    return bin2hex(random_bytes(32));
}

// Function to send the password reset email
function sendPasswordResetEmail($email, $token) {
    // You can use PHPMailer or another library for sending emails
    $subject = "Password Reset Request";
    $message = "Click the following link to reset your password: http://localhost/reset_password.php?token=$token";
    // Send email using mail() function or other email libraries
    mail($email, $subject, $message);
}

// Usage example
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];

        // Check if the email exists in the database
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            // Generate a unique token
            $token = generateToken();

            // Store the token in the database
            $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email = ?");
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();

            // Send the password reset email
            sendPasswordResetEmail($email, $token);

            echo "Password reset instructions sent to your email.";
        } else {
            echo "Email not found.";
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

         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-4 col-sm-12 col-12">
          <br>
          <br>
           <img src="images/p_reset.gif" alt="" class="img-fluid mx-auto d-block p_reset_img d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block" data-aos="fade-up">
         </div>

          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
           
            <div class="shadow p-5 mb-1 bg-body rounded" data-aos="fade-down">

              <div class="col"data-aos="fade-up" style="padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #f5c481;">
                <img src="images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>
              <br>

              <h1 class="heading mb-2"><b>FORGOT PASSWORD</b></h1>
              <p>Please enter your registered email address. An email notification with a password reset code will then be sent to you.</p>
              <form method="POST" action="forgot_password.php">
              <div class="row">
                
                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Your Email Address</label>
                  </div>

                  <div class="clearfix"></div>

                  <!--  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Your Phone Number</label>
                  </div>

                  <div class="clearfix"></div> -->

                </div>

                <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                   <!-- <a href="index.php"><button type="button" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px !important;"><span class="align-middle">RESET PASSWORD</span></button></a> -->
                   <button type="submit" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px !important;"><span class="align-middle">RESET PASSWORD</span></button>
                </div>

                 <p style="text-align: center; font-weight: 700; margin-top: 15px;"><a href="index.php" class="a_link">Back to Home</a></p>

                <div class="clearfix"></div>
                <br>

                <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2024 BusGoes All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

              </div>
              </form>
            </div>

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