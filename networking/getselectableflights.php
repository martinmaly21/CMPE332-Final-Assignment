<?php
    $flightCount = 0;
    $result = $connection->query(<<<EOD
        SELECT
            *
        FROM
            Flight
    EOD);
    $savedFlightInfo = $_GET["flightInfo"];
    while ($row = $result->fetch()) {
        $airlineCode = $row["AirlineCode"];
        $flightNumber = $row["FlightNumber"];
        $combined = "$airlineCode $flightNumber";

        $actualDepartureTime = empty($row["ActualDepartureTime"]) ? "Did not depart" : $row["ActualDepartureTime"];
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
        echo "<td>".$row["FlightNumber"]."</td>";
        echo "<td>".$actualDepartureTime."</td>";
        echo "</tr>";
        $flightCount ++;
    }
    echo "</table>";
    if ($flightCount == 0) {
        echo "<h4>No flights available. You can't update it!</h4>";
    }
?>
