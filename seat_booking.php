<?php

  // Start the session
  session_start();

  // Include the connection file
  include 'connection.php';

  global $conn;
  // echo $_SESSION['user_email']; exit();
 

  $id = $_GET['id'];

  // Perform a SELECT query to fetch the bus details based on the schedule ID
  $query = "SELECT * FROM bus_schedule WHERE id = $id";
  $stmt = $conn->prepare($query);
  $stmt->execute();    

   // Fetch user details
  $row = $stmt->get_result()->fetch_assoc();

  // var_dump($bus_details);exit();


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

    <!--=============================================-->
  <!--===================header====================-->

    <!-- header section -->


    <div class="clearfix"></div>

      <div class="container-fluid top_logo_row" style="background-color: #f8f8fa;">

        <div class="container">

          <div class="row">

             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              
              <div class="d-grid gap-2 d-md-flex justify-content-md-start top_btn_set_div">

                <p class="top_social_icon mb-0">
                  Follow Us on -
                  <a href="" target="_blank" data-aos="fade-right" data-aos-duration="500" class="fa fa-facebook aos-init aos-animate"></a>
                  <a href="" target="_blank" data-aos="fade-right" data-aos-duration="700" class="fa fa-instagram aos-init aos-animate"></a>
                  <a href="" target="_blank" data-aos="fade-right" data-aos-duration="900" class="fa fa-twitter aos-init aos-animate"></a>
                  <a href="" target="_blank" data-aos="fade-right" data-aos-duration="1100" class="fa fa-linkedin aos-init aos-animate"></a>
                </p>

              </div>

            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
              
              <div class="d-grid gap-2 d-md-flex justify-content-md-end top_btn_set_div">
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

  <div class="container-fluid header_top_div" style="background-image:url('images/body_bg.jpg') !important;">

      <div class="container">
    
          <div class="row m-auto">

            <!-- ===================== -->

            <!-- welcome section -->

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">

             <div class="col" data-aos="fade-up" style="padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #f5c481;">
                <img src="images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>

               <p data-aos="fade-down">
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
               </p>

               <div class="clearfix"></div>

            </div>

             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">

             <img src="images/find.png" alt="" class="img-fluid mx-auto d-block">

            </div>

            <!-- welcome section -->

            <!-- ========================== -->


          </div>

        </div>

  </div>


    <div class="clearfix"></div>
    <br>
    <br>
  
    <!-- add section -->

    <div class="container">

      <div class="row">

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <h1 class="heading mb-4" data-aos="fade-up">Colombo to Kandy Buses</h1>
        </div>

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 text-end">
          <p class="fst-italic mb-1">Showing 1 - 8 of 10 adds</p>
        </div>
        
      </div>
      
      <div class="row">
        
        <!-- add -->
         <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 mb-3">
           <img src="images/bus.jpg" alt="" class="d-block mx-auto w-100 rounded shadow">
         </div>

         <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12 mb-5">
           <div class="rounded shadow p-4" style="background-color: #eeeeee;">
                  
              <p class="fst-italic mb-1">Duration : <?php echo $row['duration']; ?> Hours | <?php echo $row['bus_type']; ?> | <?php echo $row['schedule_date']; ?></p>
              <h1 class="sub_heading mb-3"><?php echo $row['route_from']; ?> to <?php echo $row['route_to']; ?></h1>
              <p class="mb-1">Time - <?php echo $row['departure_time']; ?></p>
              <p class="mb-1">Model - <?php echo $row['bus_model']; ?></p>
              <p class="mb-1">Bus Schedule ID. - <?php echo $row['schedule_id']; ?></p>
              <p class="mb-1">Depot Name - <?php echo $row['depot_name']; ?></p>
              <h1 class="heading mb-1" data-aos="fade-up">Rs. <?php echo $row['fare']; ?> / <b style="font-size: 20px; color: red;">Available Seats <?php echo $row['available_seats']; ?></b></h1>
           </div> 

         </div>
        <!-- add -->

      </div>

      <!-- ========================= -->
      <!-- ========================= -->

      <hr>

      <div class="row">

          <div class="col-lg-3 col-sm-6 col-6">
            <div class="color_box" style="background-color: #598527;"></div>
            <p>Available Seats</p>
          </div>

          <div class="col-lg-3 col-sm-6 col-6">
            <div class="color_box" style="background-color: #dacf01;"></div>
            <p>Processing Seats</p>
          </div>

          <div class="col-lg-3 col-sm-6 col-6">
            <div class="color_box" style="background-color: #b32429;"></div>
            <p>Counter Seats</p>
          </div>

          <div class="col-lg-3 col-sm-6 col-6">
            <div class="color_box" style="background-color: #b7b7b7;"></div>
            <p>Booked Seats</p>
          </div>

       </div>

       <div class="row m-auto mt-5 mb-5" style="justify-content: center;">

        <div style="width: 75px;"><img src="images/steering-wheel.png" width="60px" class="float-start"></div>
        

        <div class="main_seat_row">
          <div class="bus_seat_row_3">
            <div class="bus_seat booked_seat"><input type="checkbox"/> 01</div>
            <div class="bus_seat"><input type="checkbox"/> 02</div>
            <div class="bus_seat"><input type="checkbox"/> 03</div>
          </div>

         <div class="bus_seat_row_2">
           <div class="bus_seat"><input type="checkbox"/> 04</div>
           <div class="bus_seat"><input type="checkbox"/> 05</div>
         </div>
        </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat booked_seat">06</div>
             <div class="bus_seat"><input type="checkbox"/> 07</div>
             <div class="bus_seat"><input type="checkbox"/> 08</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat booked_seat">09</div>
             <div class="bus_seat booked_seat">10</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 11</div>
             <div class="bus_seat"><input type="checkbox"/> 12</div>
             <div class="bus_seat"><input type="checkbox"/> 13</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 14</div>
             <div class="bus_seat"><input type="checkbox"/> 15</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat booked_seat">16</div>
             <div class="bus_seat booked_seat">17</div>
             <div class="bus_seat booked_seat">18</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 19</div>
             <div class="bus_seat"><input type="checkbox"/> 20</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 21</div>
             <div class="bus_seat"><input type="checkbox"/> 22</div>
             <div class="bus_seat"><input type="checkbox"/> 23</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 24</div>
             <div class="bus_seat"><input type="checkbox"/> 25</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 26</div>
             <div class="bus_seat"><input type="checkbox"/> 27</div>
             <div class="bus_seat"><input type="checkbox"/> 28</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 29</div>
             <div class="bus_seat"><input type="checkbox"/> 30</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 31</div>
             <div class="bus_seat"><input type="checkbox"/> 32</div>
             <div class="bus_seat"><input type="checkbox"/> 33</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 34</div>
             <div class="bus_seat"><input type="checkbox"/> 35</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 36</div>
             <div class="bus_seat"><input type="checkbox"/> 37</div>
             <div class="bus_seat"><input type="checkbox"/> 38</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 39</div>
             <div class="bus_seat"><input type="checkbox"/> 40</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 41</div>
             <div class="bus_seat"><input type="checkbox"/> 42</div>
             <div class="bus_seat"><input type="checkbox"/> 43</div>
           </div>

           <div class="bus_seat_row_2">
             <div class="bus_seat"><input type="checkbox"/> 44</div>
             <div class="bus_seat"><input type="checkbox"/> 45</div>
           </div>
          </div>

         <!-- ===== -->

         <div class="main_seat_row">
           <div class="bus_seat_row_3">
             <div class="bus_seat"><input type="checkbox"/> 46</div>
             <div class="bus_seat"><input type="checkbox"/> 47</div>
             <div class="bus_seat"><input type="checkbox"/> 48</div>
           </div>

           <div class="bus_seat_row_2 mt-0">
             <div class="bus_seat"><input type="checkbox"/> 49</div>
             <div class="bus_seat"><input type="checkbox"/> 50</div>
             <div class="bus_seat"><input type="checkbox"/> 51</div>
           </div>
          </div>

         <!-- ===== -->

       </div>

       <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 m-auto">
          <!-- <a href="thank.php"> -->
            <button type="button" id="proceedBtn" class="btn btn-primary green_btn mb-3" style="width: 100%; height: 55px;">PROCEED NOW</button>
          <!-- </a> -->
        </div>

       <hr>


    </div>

    <!-- add section -->


     <div class="clearfix"></div>
    <br>
    <br>

    <!-- banner section -->
    <div class="container">
      
      <div class="row">
        
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
          <div class="banner_div shadow rounded" style="background-image:url('images/banner01.jpg') !important;"></div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
          <div class="banner_div shadow rounded" style="background-image:url('images/banner02.jpg') !important;"></div>
        </div>

      </div>

    </div>
    <!-- banner section -->

    <div class="clearfix"></div>
    <br>
    <br>


    <!--=============================================-->
  <!--===================body====================-->


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

        <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2023 FINDER All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

       </div>

      </div>

  </div>


  <!--=============================================-->
  <!--===================footer====================-->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js" ></script> 
      <script src="js/bootstrap.min.js" ></script>

    <script>
      document.addEventListener("DOMContentLoaded", function() {
          const proceedButton = document.querySelector("#proceedBtn");
          proceedButton.addEventListener("click", function() {
              const selectedSeats = document.querySelectorAll("input[type='checkbox']:checked");
              const selectedSeatNumbers = Array.from(selectedSeats).map(seat => seat.parentElement.textContent.trim());

              // Send AJAX request to PHP script
              const xhr = new XMLHttpRequest();
              xhr.open("POST", "process_booking.php", true);
              xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              xhr.onreadystatechange = function() {
                  if (xhr.readyState === XMLHttpRequest.DONE) {
                      if (xhr.status === 200) {
                          // Redirect to thank.php if booking is successful
                          window.location.href = "thank.php";
                      } else if (xhr.status === 404) {
                          // Redirect to sign_up.php if user is not logged in
                          window.location.href = "sign_up.php";
                      } else {
                          // Error handling for other status codes
                          alert("Error occurred while processing your booking.");
                      }
                  }
              };
              xhr.send("selectedSeats=" + JSON.stringify(selectedSeatNumbers));
          });
      });


    </script>

  </body>
</html>