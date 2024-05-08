<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
// Include the connection file
include 'connection.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

// Check if the session email is null
if ($_SESSION['user_email'] === null) {
    // Session email is null, redirect to the login page
    header("Location: sign_up.php");
    exit(); // Stop further execution
} else {
    // Proceed with the booking process
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the selected seat numbers from the POST data
        $selectedSeats = json_decode($_POST["selectedSeats"]);
        
        // Get the current logged-in user's email address from the session
        $to = $_SESSION['user_email'];

        // Establish a database connection
        global $conn;
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, seat_numbers, bus_details) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $userId, $seatNumbers, $busDetails);

        // Set parameters and execute
        $userId = $_SESSION['user_id'];
        $seatNumbers = implode(', ', $selectedSeats);
        $busDetails = $_GET['id']; // You can customize this based on your database structure
        
        $stmt->execute();
        $stmt->close();
        $conn->close();

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;               // Disable debugging for production
            $mail->isSMTP();                                   // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';              // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                          // Enable SMTP authentication
            $mail->Username   = 'ghlakshani@gmail.com';        // SMTP username
            $mail->Password   = 'dltehkgwuxgrrzda';           // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                           // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('ahlgunasekara@gmail.com', 'Mailer');
            $mail->addAddress($to);                            // Add a recipient

            //Content
            $mail->isHTML(true);                               // Set email format to HTML
            $mail->Subject = 'Booking Confirmation';
            $mail->Body    = "Your booking for the following seats is confirmed: " . implode(', ', $selectedSeats);

            $mail->send();
            // Email sent successfully
            http_response_code(200);
        } catch (Exception $e) {
            // Error sending email
            http_response_code(500);
        }
    } else {
        // Invalid request method
        http_response_code(405);
    }
}
?>
