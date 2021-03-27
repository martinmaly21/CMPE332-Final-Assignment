<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Airline Assignment</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/airline.css">
  <link rel="stylesheet" href="css/side_bar.css">
</head>

<!-- Page content -->
<body>
  <!-- Side navigation -->
<div class="sidenav">
    <a class="image-holder", href= "airline.php">
      <img src="img/paper_airplane.png" alt="Airplane Assignment" width="150" height="150">
    </a>
    <a class="sidenav_element" href="airline.php">
        <h1>Home</h1>
    </a>
    <a class="sidenav_element" href="search_flights.php">
        <h1>Search Flights</h1>
    </a>
    <a class="sidenav_element" href="add_flight.php">
        <h1>Create flight</h1>
    </a>
    <a class="sidenav_element" href="update_flight.php">
        <h1>Update Flight</h1>
    </a>
    <a class="sidenav_element" href="average_seats.php">
        <h1>Get Average Flight Seats</h1>
    </a>
</div>

  <div class="main_view">
    <?php include 'connectdb.php';?>

    <h1>Airline Assignment</h1>
    <h2>Available Flights</h2>
    <table id="airlinedata">
      <tr>
                <th>Airline |</th>
                <th>Flight Code |</th>
                <th>Scheduled Arrival Time |</th>
                <th>Actual Arrival Time</th>
      </tr>
      <?php include 'getflights.php';?>
  </div>
</body>

</html>
