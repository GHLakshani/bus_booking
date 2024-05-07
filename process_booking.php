<?php
session_start();

// Check if the session email is null
if ($_SESSION['email'] === null) {
    // Session email is null, redirect to the login page
    header("Location: sign_up.php");
    exit(); // Stop further execution
}
else{
    // Proceed with booking process
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Get the selected seat numbers from the POST data
        $selectedSeats = json_decode($_POST["selectedSeats"]);
        
        // Get the current logged-in user's email address from the session
        $to = $_SESSION['email'];

        // SMTP server configuration
        $smtpHost = 'smtp.gmail.com';// e.g., 'smtp.example.com'
        $smtpPort = '587'; // e.g., 587
        $smtpUsername = 'ghlakshani@gmail.com';
        $smtpPassword = 'dltehkgwuxgrrzda';

        // Process the selected seats and send email confirmation
        $subject = "Booking Confirmation";
        $message = "Your booking for the following seats is confirmed: " . implode(", ", $selectedSeats);
        $headers = "From: your_email@example.com" . "\r\n" .
                "Reply-To: your_email@example.com" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

        // SMTP authentication
        ini_set('smtp_port', $smtpPort);
        ini_set('SMTP', $smtpHost);
        ini_set('sendmail_from', $from);
        ini_set('auth_username', $smtpUsername);
        ini_set('auth_password', $smtpPassword);   
        

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            // Email sent successfully
            http_response_code(200);
        } else {
            // Error sending email
            http_response_code(500);
        }
    } else {
        // Invalid request method
        http_response_code(405);
    }

}


?>
<!-- dlte hkgw uxgr rzda -->