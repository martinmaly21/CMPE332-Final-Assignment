<?php
$airlines = $connection->query("SELECT AirlineCode, AirlineName FROM Airline");
$airlineCount = 0;
$savedCode = $_GET["airline"];
while ($row = $airlines->fetch()) {
    $airlineCode = $row["AirlineCode"];
    $airlineName = $row["AirlineName"];

    if ((empty($savedCode) && $airlineCount == 0) || $airlineCode == $savedCode) {
        echo <<<EOD
            <input type="radio" id="$airlineCode" name="airline" value="$airlineCode" CHECKED/>
            <label for="$airlineCode" >$airlineName ($airlineCode)</label><br>
        EOD;
    } else {
        echo <<<EOD
            <input type="radio" id="$airlineCode" name="airline" value="$airlineCode" />
          <label for="$airlineCode" >$airlineName ($airlineCode)</label><br>
        EOD;
    }
    $airlineCount ++;
}

if ($airlineCount == 0) {
      echo "No Airlines Available - you cannot create a flight";
}
