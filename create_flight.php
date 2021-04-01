<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Search Flights</title>
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

  <h1>Create Flights</h1>
    <form action="create_flight.php" class="create_flight" id="create_flight">
      <div class="spacer_between">
        <?php include 'networking/addflight.php';?>
      </div>
      <div class="spacer_between">
        <h2>Select an airline</h2>
        <?php include 'networking/selectairline.php';?>
        <button type="submit" class="search-submit add_flight_select_airline" class="btn btn-success" method="get">
                    <img src="./img/right_arrow.png" class="add_flight_arrow"/>
                    <br/>
                    Select Airline
                </button>
      </div>
      <div class="spacer_between">
        <h2>Select an Airplane</h2>
        <?php include 'networking/selectairplane.php';?>
      </div>
    </form>

  </div>

</body>

</html>
