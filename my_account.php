<?php
// Start the session
session_start();

// Include the connection file
include 'connection.php';

try {
    global $conn;
    
    // Check if 'user_id' is set in the session
    if (!isset($_SESSION['user_id'])) {
        throw new Exception("User ID not set in session.");
    }
    
    // Get the user ID from the session
    $userId = $_SESSION['user_id'];

    // echo $userId;exit();

    // Assuming you have a user table named 'users' with fields 'first_name', 'last_name', etc.
    $query = "SELECT * FROM users WHERE id = $userId";    
    $stmt = $conn->prepare($query);
    $stmt->execute();    

    // Fetch user details
    $user = $stmt->get_result()->fetch_assoc();


    // echo "Running query: $user <br>"; exit();

    // Check if user details were fetched
    if (!$user) {
        throw new Exception("User details not found.");
    }

    // Assign fetched user details to variables
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $telephone = $user['telephone'];
    $email = $user['email'];
    $province = $user['province'];
    $district = $user['district'];
    $address = $user['address'];
    $postal_code = $user['postal_code'];
    // Add more fields as needed
  

} catch(Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
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
                <!-- ============== -->
                <a href="my_account.php"><button type="button" class="btn btn-primary magenta_btn"><img src="images/account.png" width="20px;">&nbsp;Hi.. <?php echo $first_name; ?></button></a>
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
                <img src="images/logo.png" alt="" class="d-block top_logo">
              </div>

              <div class="clearfix"></div>

               <p data-aos="fade-down">
                 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
               </p>

               <a href="add_bus.php"><button type="button" class="btn btn-primary magenta_btn mb-3"><img src="images/post.png" alt="" width="30px;"> &nbsp; POST YOUR ADD</button></a>

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

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">

          <h1 class="heading aos-init aos-animate" data-aos="fade-up">
            ACCOUNT
          </h1>
          
          <a href="">
            <div class="left_side_btn_div">
              Hi...<?php echo $first_name; ?>
            </div>
          </a>

          <!-- ============== -->


          <a href="all_bookings.php">
            <div class="left_side_btn_div">
              My Bookings
            </div>
          </a>

          <!-- ============== -->

          <a href="my_account.php">
            <div class="left_side_btn_div left_side_btn_div_active">
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
          
          <h1 class="heading aos-init aos-animate" data-aos="fade-up">
           Welcome <?php echo $first_name . " ". $last_name; ?>
          </h1>

          <h1 class="sub_heading aos-init aos-animate" data-aos="fade-up">
            Your Personal Details
          </h1>

          <div class="row mt-3 mb-4">
            
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $first_name; ?>">
                <label for="floatingInputValue">First Name</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $last_name; ?>">
                <label for="floatingInputValue">Last Name</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $address; ?>">
                <label for="floatingInputValue">Address</label>
              </div>
            </div>

            <!-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="Koswatta, Nawala, Sri Lanka.">
                <label for="floatingInputValue">Street Address 02</label>
              </div>
            </div> -->

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <!-- <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $province; ?>"> -->
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
                <label for="floatingInputValue">Province</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <!-- <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $district; ?>"> -->
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
                <label for="floatingInputValue">District</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="tel" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $telephone; ?>">
                <label for="floatingInputValue">Phone Number</label>
              </div>
            </div>

            <!-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="+94 775 235 986">
                <label for="floatingInputValue">Mobile Number</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="+94 775 235 986">
                <label for="floatingInputValue">Office Phone Numner</label>
              </div>
            </div> -->

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="email" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $email; ?>">
                <label for="floatingInputValue">Email</label>
              </div>
            </div>

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="<?php echo $postal_code; ?>">
                <label for="floatingInputValue">Postal Code</label>
              </div>
            </div>

            <div class="clearfix"></div>
            <br>

             <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
              <button type="button" class="btn btn-primary magenta_btn "><b>Edit</b></button>
              <button type="button" class="btn btn-primary magenta_btn "><b>Save</b></button>
            </div>

          </div>

          <!-- ================= -->

          <h1 class="sub_heading aos-init aos-animate" data-aos="fade-up">
            Password
          </h1>

          <div class="row mt-3 mb-4">

            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-4">
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingInputValue" placeholder="name@example.com" value="123456789">
                <label for="floatingInputValue">Password</label>
              </div>
            </div>

             <div class="clearfix"></div>

             <div class="row">
               <h1 class="sub_heading aos-init aos-animate" data-aos="fade-up">
                Change Your Password
              </h1>

               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingInputValue" placeholder="New Password">
                  <label for="floatingInputValue">New Password</label>
                </div>
              </div>

              <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 mb-2">
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingInputValue" placeholder="Re-Enter Password">
                  <label for="floatingInputValue">Re-Enter Password</label>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <br>

            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
              <button type="button" class="btn btn-primary magenta_btn"><b>Change</b></button>
              <button type="button" class="btn btn-primary magenta_btn"><b>Save</b></button>
            </div>

            <div class="clearfix"></div>
            <br>

            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
              <button type="button" class="btn btn-primary green_btn mb-3" style="width: 100%; height: 55px;">DELETE ACCOUNT</button>
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