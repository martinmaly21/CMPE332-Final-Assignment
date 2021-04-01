<?php
$airports = $connection->query("SELECT AirportCode, AirportName FROM Airport");
$airportCount = 0;
$savedAirport = $_GET["arrivalAirport"];
    while ($row = $airports->fetch()) {
        $airportCode = $row["AirportCode"];
        $airportName = $row["AirportName"];
        if ((empty($savedAirport) && $airportCount == 0) || $airportCode == $savedAirport) {
            echo <<<EOD
              <input type="radio" id="$airportCode" name="arrivalAirport" value="$airportCode" CHECKED>
              <label for="$airportCode" >$airportName ($airportCode)</label><br>
          EOD;
        } else {
            echo <<<EOD
              <input type="radio" id="$airportCode" name="arrivalAirport" value="$airportCode">
              <label for="$airportCode" >$airportName ($airportCode)</label><br>
          EOD;
        }
        $airportCount ++;
    }
if ($airportCount == 0) {
    echo "No Airports Available - you cannot create a flight";
}
