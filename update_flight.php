<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Update Flight</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/side_bar.css">
</head>

</body>
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

  <h1>Update Flight</h1>
  <form action="update_flight.php" class="update_flight">
            <?php include 'networking/updateflight.php';?>

            <h2>Select a Flight </h2>
            <table id="data">
                <tr>
                    <th></th>
                    <th>Airline |</th>
                    <th>Flight Code |</th>
                    <th>Current Departure Time</th>
                </tr>

            <?php include 'networking/getselectableflights.php';?>

            <div class="display_flex jc_space_between">
                <h2>Enter a time</h2>
                <input id="search" class="update_flight_time" type="text" name="departureTime" placeholder="Type here">
                <button type="submit" class="search-submit add_flight_submit" class="btn btn-success" method="get">
                    Update Flight
                </button>
            </div>
        </form>
</div>

</body>

</html>
