<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Home</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/side_bar.css">
</head>

<!-- Page content -->
<body>
  <!-- Side navigation -->
<div class="sidenav">
    <a class="image-holder", href= "airline.php">
      <img src="images/paper_airplane.png" alt="Airplane Assignment" width="150" height="150">
    </a>
    <a class="sidenav_element" href="airline.php">
        <h1>Home</h1>
    </a>
    <a class="sidenav_element" href="search_flights.php">
        <h1>Search Flights</h1>
    </a>
    <a class="sidenav_element" href="create_flight.php">
        <h1>Create Flight</h1>
    </a>
    <a class="sidenav_element" href="update_flight.php">
        <h1>Update Flight</h1>
    </a>
    <a class="sidenav_element" href="get_average_flight_seats.php">
        <h1>Get Average Flight Seats</h1>
    </a>
</div>

  <div class="main_view">
    <?php include 'networking/connectdb.php';?>

    <h1>Airline Assignment - Martin Maly (20068784)</h1>
    <h2>Available Flights</h2>
    <table id="airlinedata">
      <tr>
                <th>Airline |</th>
                <th>Flight Code |</th>
                <th>Scheduled Arrival Time |</th>
                <th>Actual Arrival Time</th>
      </tr>
      <?php include 'networking/getflights.php';?>
  </div>
</body>

</html>
