<?php

// Start the session
session_start();

// Include the connection file
include '../connection.php';

global $conn;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection established
    $id = $_POST["id"]; // Get the ID of the schedule to delete
    
    // Perform the deletion query (replace with your actual query)
   
    $sql = "DELETE FROM bus_schedule WHERE id = $id";
    
    // Redirect back to the schedule listing page
    if ($conn->query($sql) === TRUE) {
        // Display a success message using JavaScript
        echo "<script>
            if (confirm('Delete successful!')) {
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
