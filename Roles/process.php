<?php

// Include necessary files
include_once 'functions.php';  // Contains the Examination class
include_once '..\Database\connect.php';  // Database connection file

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form input
    $subject = $_POST['subject'] ?? '';
    $semester = $_POST['semester'] ?? '';
    $instructor = $_POST['instructor'] ?? '';
    $lab = $_POST['lab'] ?? '';
    $date_time = $_POST['date'] ?? '';
    $time_slot = $_POST['time'] ?? '';
    $message = $_POST['messageHtml'] ?? '';
    $link_share = $_POST['link_share'] ?? '';

    // Optional: Handle file upload (attachment)
    $attachment = null;
    if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        // Set upload directory
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);  // Create directory if it doesn't exist
        }

        // Get file name and set target file path
        $fileName = basename($_FILES['attachment']['name']);
        $targetFile = $uploadDir . $fileName;

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES['attachment']['tmp_name'], $targetFile)) {
            $attachment = $targetFile;  // Store the file path
        } else {
            echo "<script>alert('Error uploading the file');</script>";
        }
    }

    // Initialize the Examination class
    $exam = new Examination();

    // Insert a new exam record into the database
    $newExamId = $exam->create(
        $subject,       // subject
        $semester,      // semester
        $instructor,    // instructor
        $lab,           // lab
        $date_time,     // date_time
        $time_slot,     // time_slot
        $message,       // message
        $attachment,    // attachment
        $link_share     // link_share
    );

    // Check if the record was inserted successfully
    if ($newExamId) {
        // Success message
        $statusMsg = "Examination successfully added!";
        header("Location: exam.php?status=success");  // Redirect to exam listing page
        exit;
    } else {
        // Error message
        $statusMsg = "Error: Could not save the examination.";
        echo $statusMsg;  // Show error message
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: form.php");
    exit;
}

?>
