<?php
// Start the session
session_start();

// Include the connection file
include '../connection.php';

global $conn;

// Fetch bus schedule data
$sql = "SELECT * FROM bus_schedule";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/bus_booking.css" rel="stylesheet">
    <link href="../css/mediaquery.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
    <!-- header section -->
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
              <a href="my_account.php"><button type="button" class="btn btn-primary magenta_btn"><img src="images/account.png" width="20px;">&nbsp;Hi.. <?php echo $_SESSION['user_name']; ?></button></a>
              <a href="logout.php"><button type="button" class="btn btn-primary blue_btn">Log Out</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <!-- Body Section -->
    <div class="container-fluid header_top_div" style="background-image:url('images/body_bg.jpg') !important;">
      <div class="container">
        <div class="row m-auto">
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="col" data-aos="fade-up" style="padding-bottom: 15px; margin-bottom: 15px; border-bottom: 1px solid #f5c481;">
              <img src="../images/logo.png" alt="" class="d-block top_logo">
            </div>
            <div class="clearfix"></div>
            <p data-aos="fade-down">
              Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
            </p>
          </div>
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
            <img src="../images/find.png" alt="" class="img-fluid mx-auto d-block">
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <br>
    <br>
  
    <!-- Add Section -->
    <div class="container">
      <div class="row">
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
          <h1 class="heading aos-init aos-animate" data-aos="fade-up">
            ACCOUNT
          </h1>
          <a href="">
            <div class="left_side_btn_div">
              Hi...<?php echo $_SESSION['user_name']; ?>
            </div>
          </a>
          <a href="add_bus.php">
            <div class="left_side_btn_div ">
              Add Bus
            </div>
          </a>
          <a href="bus_details.php">
            <div class="left_side_btn_div left_side_btn_div_active">
              Bus Details
            </div>
          </a>
          <a href="my_account.php">
            <div class="left_side_btn_div ">
              My Account
            </div>
          </a>
        </div>
        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-8 col-12">
          <h1 class="sub_heading aos-init aos-animate" data-aos="fade-up">
            Bus Schedule Details
          </h1>
          <div class="row mt-3 mb-4">
            <table id="bus_schedule_table" class="display">
              <thead>
                <tr>
                  <th>Schedule ID</th>
                  <th>Route From</th>
                  <th>Route To</th>
                  <th>Departure Time</th>
                  <th>Bus Model</th>
                  <th>Depot Name</th>
                  <th>Fare</th>
                  <th>Available Seats</th>
                  <th>Duration</th>
                  <th>Bus Type</th>
                  <th>Schedule Date</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['schedule_id']}</td>
                            <td>{$row['route_from']}</td>
                            <td>{$row['route_to']}</td>
                            <td>{$row['departure_time']}</td>
                            <td>{$row['bus_model']}</td>
                            <td>{$row['depot_name']}</td>
                            <td>{$row['fare']}</td>
                            <td>{$row['available_seats']}</td>
                            <td>{$row['duration']}</td>
                            <td>{$row['bus_type']}</td>
                            <td>{$row['schedule_date']}</td>
                            <td><a href='edit_bus_detail.php?id={$row['id']}' class='btn btn-primary btn-sm'>Edit</a></td>
                            <td>
                              <form action='delete_bus_schedule.php' method='POST' onsubmit='return confirm(\"Are you sure you want to delete this schedule?\");'>
                                <input type='hidden' name='id' value='{$row['id']}'>
                                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                              </form>
                            </td>
                          </tr>";
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- add section -->


     <div class="clearfix"></div>
    <br>
    <br>

    <!-- banner section -->
    <div class="container">
      
      <div class="row">
        
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
          <div class="banner_div shadow rounded" style="background-image:url('../images/banner01.jpg') !important;"></div>
        </div>

        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
          <div class="banner_div shadow rounded" style="background-image:url('../images/banner02.jpg') !important;"></div>
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
         
        <img src="../images/logo.png" alt="" class="d-block top_logo mx-auto mb-3"data-aos="fade-up">

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

        <p class="mb-0" style="text-align: center; font-weight: 500; color: #999999;">Copyright © 2024 BusGoes All Rights Reserved. <br>Solution by Lakshan Basnayaka</p>

       </div>

      </div>

  </div>


  <!--=============================================-->
  <!--===================footer====================-->



    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="../js/jquery-3.2.1.min.js"></script>
      <script src="../js/popper.min.js" ></script> 
      <script src="../js/bootstrap.min.js" ></script>

  </body>
</html>