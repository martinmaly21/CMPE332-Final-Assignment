<?php
echo "<h4>";
    if (empty($_GET["flightInfo"]) || empty($_GET["departureTime"])) {
        echo "Please fill out the form. You need to select a flight and enter a valid departure time";
    } else {
        $time = $_GET["departureTime"];
        $pieces = explode(" ", $_GET["flightInfo"]);
        $code = $pieces[0];
        $number = $pieces[1];
        try {
            $result = $connection->query(<<<EOD
                UPDATE
                    Flight
                SET
                    ActualDepartureTime = "$time"
                WHERE
                    AirlineCode = "$code" AND FlightNumber = "$number"
            EOD);
            echo "Flight updated!";
        } catch (PDOException $e) {
            echo "Could not update flight. Please try again.";
        }
    }
echo "</h4>";
