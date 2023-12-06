<?php


// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
// Include database connection (replace with your actual database connection code)
include_once "config.php";

// Check if the search result parameter is set in the URL
if(isset($_GET['search_result'])) {
  $searchResult = htmlspecialchars($_GET['search_result']);
  // Display the search result, you can use it wherever you want in your HTML
  echo "Search result: $searchResult";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Weather App</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="./script.js" defer></script>
</head>


<body>
  <h1 class="my-5" id="toto" data-user="<?php echo $_SESSION ['id']; ?>">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to WeatherApp!</h1></b>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   
 
  <div class="card">
    <form action="search_handler.php" method='POST'>
    <div class="search">
      <input  type="text" name ="search_query" class="search-bar" placeholder="Search" >
      <button type="submit" >
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1.5em"
          width="1.5em" xmlns="http://www.w3.org/2000/svg">
          <path
            d="M909.6 854.5L649.9 594.8C690.2 542.7 712 479 712 412c0-80.2-31.3-155.4-87.9-212.1-56.6-56.7-132-87.9-212.1-87.9s-155.5 31.3-212.1 87.9C143.2 256.5 112 331.8 112 412c0 80.1 31.3 155.5 87.9 212.1C256.5 680.8 331.8 712 412 712c67 0 130.6-21.8 182.7-62l259.7 259.6a8.2 8.2 0 0 0 11.6 0l43.6-43.5a8.2 8.2 0 0 0 0-11.6zM570.4 570.4C528 612.7 471.8 636 412 636s-116-23.3-158.4-65.6C211.3 528 188 471.8 188 412s23.3-116.1 65.6-158.4C296 211.3 352.2 188 412 188s116.1 23.2 158.4 65.6S636 352.2 636 412s-23.3 116.1-65.6 158.4z">
          </path>
        </svg>
      </button>
    </div>
    <div class="weather loading">
      <h2 class="city">Weather in London</h2>
      <h3 class="temp">temperature 51°C </h3>
      <div class="flex">
        <img src="https://openweathermap.org/img/wn/04n.png" alt="" class="icon" />
        <div class="description">Cloudy</div>
      </div>
      <div class="humidity">humidity: 60%</div>
      <div class="wind">Wind speed: 6.2 km/h</div>
    </div>
    </form>
  </div>
   
  </div>
    <div class="sidebar">
  <a class="active" href="index.php"><i class="fa fa-home"></i></a> 
  <a class="active" href="historyajax.php"><i class="fa fa-book"></i></a>
  <a class="active" href="reset-password.php"><i class="fa fa-gear"></i></a>
  <a class="active" href="logout.php"><i class="fa fa-sign-out"></i></a>

  
</div>
</body>

</html>