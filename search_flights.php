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

  <h1>Search Flights</h1>
  <?php include 'networking/searchflights.php';?>

    <form action="search_flights.php" class="search_airline" id="search_airline">
            <label for="search" class="search-descriptors">Enter an airline code:</label>
            <?php
                $code = $_GET["airlinecode"];

                if(empty($code)) {
                    echo <<<EOD
                        <input id="search" class="search-text" type="text" name="airline_code" placeholder="Enter code">
                    EOD;
                } else {
                    echo <<<EOD
                        <input id="search" class="search-text" type="text" name="airline_code" value="$code">
                    EOD;
                }
            ?>
            <label for="search" class="search-descriptors">Select a day: </label>
            <select id="days" name="days">
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
            <button type="submit" method="get">
                <img src="images/search_icon.png" width="30" height="30"alt=""/>
            </button>
        </form>

  </div>

</body>

</html>
