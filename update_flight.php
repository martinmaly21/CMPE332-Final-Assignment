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
                    <th>Select</th>
                    <th>Airline</th>
                    <th>Flight Code</th>
                    <th>Current Departure Time</th>
                    <th>Actual Departure Time</th>
                </tr>
                <?php
                    $flightCount = 0;
                    $result = $connection->query(<<<EOD
                        SELECT
                            *
                        FROM
                            Flight
                        JOIN DepartsFrom ON Flight.AirlineCode = DepartsFrom.AirlineCode AND Flight.ThreeDigitNumber = DepartsFrom.ThreeDigitNumber
                    EOD);
                    $savedFlightInfo = $_GET["flightInfo"];
                    while ($row = $result->fetch()) {
                        $airlineCode = $row["AirlineCode"];
                        $flightNumber = $row["ThreeDigitNumber"];
                        $combined = "$airlineCode $flightNumber";
                        // echo $combined;
                        $time = empty($row["ActualDepartureTime"]) ? "Did not depart" : $row["ActualDepartureTime"];
                        echo "<tr>";
                        if (($flightCount == 0 && empty($savedFlightInfo)) || $savedFlightInfo == $combined) {
                            echo <<<EOD
                                <td><input value="$combined" id="$combined" name="flightInfo" type="radio" CHECKED/></td>
                            EOD;
                        } else {
                            echo <<<EOD
                                <td><input value="$combined" id="$combined" name="flightInfo" type="radio" /></td>
                            EOD;
                        }
                        echo "<td>".$row["AirlineCode"]."</td>";
                        echo "<td>".$row["ThreeDigitNumber"]."</td>";
                        echo "<td>".$row["ScheduledDepartureTime"]."</td>";
                        echo "<td>".$time."</td>";
                        echo "</tr>";
                        $flightCount ++;
                    }
                    echo "</table>";
                    if ($flightCount == 0) {
                        echo "<h4>No flights available. You can't update it!</h4>";
                    }
                ?>
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
