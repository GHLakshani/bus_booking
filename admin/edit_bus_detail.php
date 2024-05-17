<?php
// Start the session
session_start();

// Include the connection file
include '../connection.php';

global $conn;

// Fetch the bus schedule details based on id
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);



    $sql = "SELECT * FROM bus_schedule WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit();
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_FILES["bus_image"]["tmp_name"]) && !empty($_FILES["bus_image"]["tmp_name"]))
    {
        // Image upload handling
        $target_dir = "../uploads/"; // Directory where you want to store the uploaded images
        $target_file = $target_dir . basename($_FILES["bus_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["bus_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["bus_image"]["size"] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["bus_image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["bus_image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
   
    // Escape user inputs for security
    $id = mysqli_real_escape_string($conn, $_POST['id']);
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
    $image = mysqli_real_escape_string($conn, $_FILES["bus_image"]["name"]);

    // Update data in the database
    $sql = "UPDATE bus_schedule SET 
            route_from='$route_from', 
            route_to='$route_to', 
            departure_time='$departure_time', 
            bus_model='$bus_model', 
            depot_name='$depot_name', 
            fare='$fare', 
            available_seats='$available_seats', 
            duration='$duration', 
            bus_type='$bus_type', 
            schedule_date='$schedule_date', 
            bus_image='$image' 
            WHERE id='$id'";


    if ($conn->query($sql) === TRUE) {
        // Display a success message using JavaScript
        echo "<script>
            if (confirm('Update successful!')) {
                window.location.href = 'bus_details.php'; // Redirect to bus_details.php
            }
        </script>";
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


    <link href="../css/bus_booking.css" rel="stylesheet">
    <link href="../css/mediaquery.css" rel="stylesheet">

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
                <!-- ============== -->
                <a href="my_account.php"><button type="button" class="btn btn-primary magenta_btn"><img src="images/account.png" width="20px;">&nbsp;Hi.. <?php echo $_SESSION['user_name']; ?></button></a>
                <a href="logout.php"><button type="button" class="btn btn-primary blue_btn">Log Out</button></a>
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
                <img src="../images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>

               <p data-aos="fade-down">
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
               </p>

               <!-- <a href="add_bus.php"><button type="button" class="btn btn-primary magenta_btn mb-3"><img src="../images/post.png" alt="" width="30px;"> &nbsp; POST YOUR ADD</button></a> -->

               <div class="clearfix"></div>

            </div>

             <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">

             <img src="../images/find.png" alt="" class="img-fluid mx-auto d-block">

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

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">

          <h1 class="heading aos-init aos-animate" data-aos="fade-up">
            ACCOUNT
          </h1>
          
          <a href="">
            <div class="left_side_btn_div">
              Hi...<?php echo $_SESSION['user_name']; ?>
            </div>
          </a>

          <!-- ============== -->


          <a href="add_bus.php">
            <div class="left_side_btn_div left_side_btn_div_active">
              Add Bus
            </div>
          </a>

          <!-- ============== -->


          <a href="bus_details.php">
            <div class="left_side_btn_div">
              Bus Details
            </div>
          </a>

          <!-- ============== -->

          <a href="my_account.php">
            <div class="left_side_btn_div ">
              My Account
            </div>
          </a>

          <!-- ============== -->

          <!-- <a href="register.php">
            <div class="left_side_btn_div">
              Register
            </div>
          </a> -->

          <!-- ============== -->
<!-- 
          <a href="forgot_password.php">
            <div class="left_side_btn_div">
              Forgotten Password
            </div>
          </a> -->

          <!-- ============== -->



        </div>

        <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-8 col-sm-8 col-12">
          
          <h1 class="sub_heading aos-init aos-animate" data-aos="fade-up">
          Add New Bus
          </h1>

          <div class="row mt-3 mb-4">
              
                <form class="row" method="POST" action="edit_bus_detail.php" enctype="multipart/form-data">

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                        <select class="form-select" id="bus_type" name="bus_type" aria-label="Floating label select example">
                        <option value="">Select Type</option>
                        <option value="Normal Bus" <?php echo ($row['bus_type'] === 'Normal Bus') ? 'selected' : ''; ?>>Normal Bus</option>
                        <option value="AC Bus" <?php echo ($row['bus_type'] === 'AC Bus') ? 'selected' : ''; ?>>AC Bus</option>
                        <option value="Semi" <?php echo ($row['bus_type'] === 'Semi') ? 'selected' : ''; ?>>Semi</option>
                        <option value="Highway" <?php echo ($row['bus_type'] === 'Highway') ? 'selected' : ''; ?>>Highway</option>
                        </select>
                        <label for="floatingSelectGrid">Bus Type</label>
                    </div>
                </div>

                  <div class="clearfix"></div>
                  
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="schedule_id" name="schedule_id" placeholder="name@example.com" value="<?php echo $row['schedule_id'] ?>">
                      <label for="floatingInput">Schedule ID</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="departure_time" name="departure_time" placeholder="name@example.com" value="<?php echo $row['departure_time'] ?>">
                      <label for="floatingInput">Departure Time</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="route_from" name="route_from" placeholder="name@example.com" value="<?php echo $row['route_from'] ?>" >
                      <label for="floatingInput">Route From</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="route_to" name="route_to" placeholder="name@example.com" value="<?php echo $row['route_to'] ?>">
                      <label for="floatingInput">Route To</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="bus_model" name="bus_model" placeholder="name@example.com" value="<?php echo $row['bus_model'] ?>">
                      <label for="floatingInput">Bus Model</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="depot_name" name="depot_name" placeholder="name@example.com" value="<?php echo $row['depot_name'] ?>">
                      <label for="floatingInput">Depot Name</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="fare" name="fare" placeholder="name@example.com" value="<?php echo $row['fare'] ?>">
                      <label for="floatingInput">Fare</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="number" class="form-control" id="available_seats" name="available_seats" placeholder="name@example.com" value="<?php echo $row['available_seats'] ?>">
                      <label for="floatingInput">Available Seats</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="text" class="form-control" id="duration" name="duration" placeholder="name@example.com" value="<?php echo $row['duration'] ?>">
                      <label for="floatingInput">Duration</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="date" class="form-control" id="schedule_date" name="schedule_date" placeholder="name@example.com" value="<?php echo $row['schedule_date'] ?>">
                      <label for="floatingInput">Schedule Date</label>
                    </div>
                  </div>

                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="form-floating mb-3" data-aos="fade-up">
                      <input type="file" class="form-control" id="bus_image" name="bus_image" placeholder="name@example.com" >
                      <label for="floatingInput">Image</label>
                    </div>
                  </div>
                  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <?php if(isset($row['bus_image'])){ ?>
                    <img src="<?php echo "../uploads/" . $row['bus_image']  . ""; ?>" style="width:100px;height:100px;" />
                    <?php } ?>
                  </div>
                

                  <div class="clearfix"></div>     <br>            

                  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" data-aos="fade-up">
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="name@example.com" value="<?php echo $row['id'] ?>">
                    <button type="submit" class="btn btn-primary green_btn mb-3" style="width: 100%; height: 55px;">UPDATE NOW</button>
                  </div>

                </form>

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