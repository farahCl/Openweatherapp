<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection 
include_once "config.php";

// Check if the search_query parameter is set in the POST request
if (isset($_POST['search_query'])) {
    // Get the user ID from the session
    $userId = isset($_SESSION['id']) ? $_SESSION['id'] : 0;

    // Sanitize and retrieve the search query from the POST data
    $searchQuery = mysqli_real_escape_string($link, $_POST['search_query']);

    // Insert the data into the database
    $sql = "INSERT INTO user_search_history (user_id, search_query) VALUES ('$userId', '$searchQuery')";

    if (mysqli_query($link, $sql)) {
        // Data inserted successfully

        // Redirect back to index.php with search result parameter
        header("location: index.php?search_result=$searchQuery");
        exit;
    } else {
        // Error inserting data
        $response = array('success' => false, 'error' => mysqli_error($link));
        echo json_encode($response);
    }
} else {
    // Invalid request, search_query parameter not set
    $response = array('success' => false, 'error' => 'Invalid request');
    echo json_encode($response);
}

// Close the database connection (replace with your actual database closing code)
mysqli_close($link);
?>

