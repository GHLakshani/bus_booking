<?php
// Start the session
session_start();

// Include the connection file
include 'connection.php';

global $conn;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $schedule_id = mysqli_real_escape_string($conn, $_POST['schedule_id']);
    $route_from = mysqli_real_escape_string($conn, $_POST['route_from']);
    $route_to = mysqli_real_escape_string($conn, $_POST['route_to']);
    $departure_time = mysqli_real_escape_string($conn, $_POST['departure_time']);
    $bus_model = mysqli_real_escape_string($conn, $_POST['bus_model']);
    $depot_name = mysqli_real_escape_string($conn, $_POST['depot_name']);
    $fare = mysqli_real_escape_string($conn, $_POST['fare']);
    $available_seats = mysqli_real_escape_string($conn, $_POST['available_seats']);
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $bus_type = mysqli_real_escape_string($conn, $_POST['bus_type']);
    $schedule_date = mysqli_real_escape_string($conn, $_POST['schedule_date']);

    // Insert data into database
    $sql = "INSERT INTO bus_schedule (schedule_id, route_from, route_to, departure_time, bus_model, depot_name, fare, available_seats, duration, bus_type, schedule_date) 
            VALUES ('$schedule_id', '$route_from', '$route_to', '$departure_time', '$bus_model', '$depot_name', '$fare', '$available_seats', '$duration', '$bus_type', '$schedule_date')";

    if ($conn->query($sql) === TRUE) {
      header("Location: thank.php");
      exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
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
                <a href=""><button type="button" class="btn btn-primary blue_white_btn">Sign Up</button></a>
                <a href="sign_up.php"><button type="button" class="btn btn-primary blue_btn">Login</button></a>
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
          <img src="images/house.png" alt="" class="d-block mx-auto w-100">
        </div>

        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
          <div class="shadow rounded p-4">
            
            <div class="row">
              
                <h1 class="heading mb-4" data-aos="fade-up">Add New Bus</h1>

                <form class="row" method="POST" action="add_bus.php">

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <select class="form-select" id="bus_type" name="bus_type" aria-label="Floating label select example">
                        <option selected>Select Type</option>
                        <option value="Normal Bus">Normal Bus</option>
                        <option value="AC Bus">AC Bus</option>
                        <option value="Semi">Semi</option>
                        <option value="Highway">Highway</option>
                      </select>
                      <label for="floatingSelectGrid">Bus Type</label>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                  
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="schedule_id" name="schedule_id" placeholder="name@example.com">
                      <label for="floatingInput">Schedule ID</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="departure_time" name="departure_time" placeholder="name@example.com">
                      <label for="floatingInput">Departure Time</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="route_from" name="route_from" placeholder="name@example.com">
                      <label for="floatingInput">Route From</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="route_to" name="route_to" placeholder="name@example.com">
                      <label for="floatingInput">Route To</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="bus_model" name="bus_model" placeholder="name@example.com">
                      <label for="floatingInput">Bus Model</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="depot_name" name="depot_name" placeholder="name@example.com">
                      <label for="floatingInput">Depot Name</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="fare" name="fare" placeholder="name@example.com">
                      <label for="floatingInput">Fare</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="number" class="form-control" id="available_seats" name="available_seats" placeholder="name@example.com">
                      <label for="floatingInput">Available Seats</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="duration" name="duration" placeholder="name@example.com">
                      <label for="floatingInput">Duration</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="date" class="form-control" id="schedule_date" name="schedule_date" placeholder="name@example.com">
                      <label for="floatingInput">Schedule Date</label>
                    </div>
                  </div>
                

                  <div class="clearfix"></div>                 

                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <button type="submit" class="btn btn-primary green_btn mb-3" style="width: 100%; height: 55px;">ADD NOW</button>
                  </div>

                </form>

            </div>

          </div>
        </div>
        
      </div>
      
      <!-- ========================= -->
      <!-- ========================= -->

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

        <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2023 FINDER All Rights Reserved. <br>Solution by Thiyuni Siyathma Robertson</p>

       </div>

      </div>

  </div>



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

  </body>
</html>