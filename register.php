<?php
// Include the connection file
include 'connection.php';

// Function to register a new user
function registerUser($first_name, $last_name, $password, $telephone, $email, $province, $district, $user_type) {
  global $conn;
  $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Encrypt the password
  $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, password, telephone, email, province, district, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssssss", $first_name, $last_name, $hashed_password, $telephone, $email, $province, $district, $user_type);
  if ($stmt->execute()) {
      return true; // Registration successful
  } else {
      return false; // Registration failed
  }
}

// Usage example
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $confirm_pwd = $_POST['confirm_pwd']; // Added line to retrieve confirm password
        $telephone = $_POST['telephone'];
        $email = $_POST['email'];
        $province = $_POST['province'];
        $district = $_POST['district'];
        $user_type = "user";

        // Check if password and confirm password match
        if ($password !== $confirm_pwd) {
            echo "Password and confirm password do not match.";
            exit(); // Stop further execution
        }

        if (registerUser($first_name, $last_name, $password, $telephone, $email, $province, $district, $user_type)) {
            // Registration successful, you can redirect to login page or dashboard
            header("Location: sign_up.php");
            exit();
        } else {
            echo "Registration failed";
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
        
         

         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
           
            <div class="shadow p-5 mb-1" data-aos="fade-down" style="background-color: #ffffff;">

              <div class="col" data-aos="fade-up" style="padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #f5c481;">
                <img src="images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>

               <p data-aos="fade-down">
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry.
               </p>

               <div class="clearfix"></div>

              <h1 class="heading mb-2"><b>REGISTER</b></h1>

              <form method="POST" action="register.php">
                <div class="row">

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="first_name" name="first_name" placeholder="name@example.com">
                      <label for="floatingInput">First Name</label>
                    </div>
                  </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Password">
                      <label for="floatingPassword">Last Name</label>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-floating mb-3">
                      <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="name@example.com">
                      <label for="floatingInput">Telephone</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-floating mb-3">
                      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                      <label for="floatingInput">Email</label>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="province" name="province" aria-label="Floating label select example">
                        <option selected>Choose a province</option>
                        <option value="Western">Western</option>
                        <option value="Central">Central</option>
                        <option value="Northern">Northern</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Southern">Southern</option>
                        <option value="North Western">North Western</option>
                        <option value="North Central">North Central</option>
                        <option value="Uva">Uva</option>
                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                      </select>
                      <label for="floatingSelectGrid">Province</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="district" name="district" aria-label="Floating label select example">
                        <option selected>Choose a district</option>
                        <option value="Colombo">Colombo</option>
                        <option value="Gampaha">Gampaha</option>
                        <option value="Kalutara">Kalutara</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Matale">Matale</option>
                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                        <option value="Galle">Galle</option>
                        <option value="Matara">Matara</option>
                        <option value="Hambantota">Hambantota</option>
                        <option value="Jaffna">Jaffna</option>
                        <option value="Kilinochchi">Kilinochchi</option>
                        <option value="Mannar">Mannar</option>
                        <option value="Vavuniya">Vavuniya</option>
                        <option value="Mullaitivu">Mullaitivu</option>
                        <option value="Batticaloa">Batticaloa</option>
                        <option value="Ampara">Ampara</option>
                        <option value="Trincomalee">Trincomalee</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Puttalam">Puttalam</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Polonnaruwa">Polonnaruwa</option>
                        <option value="Badulla">Badulla</option>
                        <option value="Monaragala">Monaragala</option>
                        <option value="Ratnapura">Ratnapura</option>
                        <option value="Kegalle">Kegalle</option>
                      </select>
                      <label for="floatingSelectGrid">District</label>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      <label for="floatingPassword">Password</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                  <div class="form-floating mb-3">
                      <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Password">
                      <label for="floatingPassword">Re-Enter Password</label>
                    </div>
                  </div>

                  <div class="clearfix"></div>

                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- <a href="login_dash.html"><button type="button" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px;"><span class="align-middle">REGISTER NOW</span></button></a> -->
                    <button type="submit" name="register" class="btn btn-primary green_btn" style="width: 100%; font-weight: 900; height: 55px;"><span class="align-middle">REGISTER NOW</span></button>
                  </div>

                  <div class="clearfix"></div>
                  <br>

                  <p style="text-align: center;">
                    You Already Have an Account? Please <a href="sign_up.php" class="a_link"><b>Login Here</b></a>
                  </p>

                  <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2023 FINDER All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

                </div>
              </form>

            </div>

         </div>

         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
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