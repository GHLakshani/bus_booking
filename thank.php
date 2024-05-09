<?php

// Start the session
session_start();

// Include the connection file
include 'connection.php';
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
  <body>
<!-- login Modal -->
<div class="modal fade" id="login_popup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
        <div class="row m-auto login_pop_row">

          <h1 class="heading mb-1" style="text-transform: uppercase; color: #0468a1;">Login</h1>
          <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
          </p>
          
          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">User Name</label>
              <img src="images/u_name.png" class="form_icon">
            </div>
          </div>

         <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
           <div class="form-floating">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              <img src="images/pass.png" class="form_icon">
            </div>
          </div>

          <div class="clearfix"></div>

          <p style="text-align: right; font-weight: 700;"><a href="forgot_password.php" class="a_link">Forgot Password?</a></p>

          <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
             <a href="index.php"><button type="button" class="btn btn-primary dark_blue_btn" style="width: 100%; font-weight: 900; height: 55px;"><span class="align-middle">LOGIN NOW</span></button></a>
          </div>

          <div class="clearfix"></div>
          <br>

          <p style="text-align: center;">
            You Don’t Have an Account? Please <a href="sign_up.php" class="a_link"><b>Register Here</b></a>
          </p>

        </div>

      </div>
    </div>
  </div>
</div>
<!-- login Modal -->


    <!--=============================================-->
  <!--===================header====================-->

    <!-- header section -->


    <div class="clearfix"></div>

      <div class="container-fluid top_logo_row" style="background-color: #f8f8fa;">

        <div class="container">

          <div class="row">

            <div class="col-xxl-12 col-xl-12 col-lg-12 offset-lg-12 col-md-12 col-sm-12 col-12">
              
              <div class="d-grid gap-2 d-md-flex justify-content-md-end top_btn_set_div">
                <!-- <button type="button" class="btn btn-primary blue_white_btn">How to Use Tracker</button> -->
                <?php if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] === null) { ?>
                <a href="register.php"><button type="button" class="btn btn-primary blue_white_btn">Sign Up</button></a>
                <a href="sign_up.php"><button type="button" class="btn btn-primary blue_btn">Login</button></a>
                <?php } else { ?>
                  <a href="my_account.php"><button type="button" class="btn btn-primary magenta_btn"><img src="images/account.png" width="20px;">&nbsp;Hi.. <?php echo $_SESSION['user_name']; ?></button></a>
                  <a href="logout.php"><button type="button" class="btn btn-primary blue_btn">Log Out</button></a>
                <?php }  ?>
              </div>

            </div>
          </div>
              

        </div>

      </div>

      <!-- ======================= -->

          <div class="clearfix"></div>

    <!-- header section -->

    <!--=============================================-->
  <!--===================header====================-->


  <!--=============================================-->
  <!--===================body====================-->

<!-- recommendation section -->

    <div class="container-fluid" style="text-align: center;">
      
      <div class="container">

        <div class="clearfix"></div>
        <br>

        <img src="images/thank.gif" alt="" class="mx-auto d-block" style="width: 300px;">

         <h1 class="heading mb-3" style="text-transform: uppercase; color: #0468a1;">your Booking is successfully, please check your email.</h1>
        
        <p>
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
        </p>

      </div>

    </div>

    <!-- recommendation section -->

    <!--=============================================-->
  <!--===================body====================-->

    <div class="clearfix"></div>
    <br>

      <!--=============================================-->
  <!--===================footer====================-->

  <div class="container-fluid footer_row text-center">
      
      <div class="container">
        
       <div class="row">
         
        <img src="images/logo.png" alt="" class="d-block top_logo mx-auto mb-3"data-aos="fade-up">

       <p class="text-center" data-aos="fade-down">
         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <br>when an unknown printer took a galley of type and scrambled it to make a type specimen book.
       </p>

       <p class="top_social_icon mb-5">
          Follow Us on<br>
          <a href="" target="_blank" data-aos="fade-right" data-aos-duration="500" class="fa fa-facebook aos-init aos-animate"></a>
          <a href="" target="_blank" data-aos="fade-right" data-aos-duration="700" class="fa fa-instagram aos-init aos-animate"></a>
          <a href="" target="_blank" data-aos="fade-right" data-aos-duration="900" class="fa fa-twitter aos-init aos-animate"></a>
          <a href="" target="_blank" data-aos="fade-right" data-aos-duration="1100" class="fa fa-linkedin aos-init aos-animate"></a>
        </p>

        <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2024 FINDER All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

       </div>

      </div>

  </div>


  <!--=============================================-->
  <!--===================footer====================-->

    <div class="clearfix"></div>
    <br>
    <br>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js" ></script> 
      <script src="js/bootstrap.min.js" ></script>


  </body>
</html>