<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Include database connection 
include_once "config.php";

// Retrieve user search history from the database
$userId = $_SESSION['id'];

$sql = "SELECT search_query, search_timestamp FROM user_search_history WHERE user_id = $userId ORDER BY search_timestamp DESC";
$result = mysqli_query($link, $sql);

// Close the database connection (replace with your actual database closing code)
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Search History</title>
</head>
<body>
    <h2>Your history</h2>

    <?php
    // Display search history
    if (mysqli_num_rows($result) > 0) {
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['search_query']} - {$row['search_timestamp']}</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No search history available.</p>";
    }
    ?>
    
    <div class="sidebar">
  <a class="active" href="index.php"><i class="fa fa-home"></i></a> 
  <a class="active" href="historyajax.php"><i class="fa fa-book"></i></a>
  <a class="active" href="reset-password.php"><i class="fa fa-gear"></i></a>
  <a class="active" href="logout.php"><i class="fa fa-sign-out"></i></a>

  
</div>
</body>

</html>
