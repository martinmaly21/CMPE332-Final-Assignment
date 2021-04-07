<?php
            if (empty($_GET["flight_number"]) ||
            empty($_GET["airline"]) ||
            empty($_GET["DaysOffered"]) ||
            empty($_GET["arrivalAirport"]) ||
            empty($_GET["departureAirport"]) ||
            empty($_GET["airplane"]) ||
            empty($_GET["arrivalTime"]) ||
            empty($_GET["departureTime"])) {
                echo "To create a flight, please fill in the following fields: <br /> <ul class='two_column'>";
                if (empty($_GET["airline"])) {
                    echo "<li>An Airline</li>";
                }
                if (empty($_GET["DaysOffered"])) {
                    echo "<li>At least one day offered </li>";
                }
                if (empty($_GET["arrivalAirport"])) {
                    echo "<li>The Arrival Airport</li>";
                }
                if (empty($_GET["departureAirport"])) {
                    echo "<li>The Departure Airport</li>";
                }
                if (empty($_GET["airplane"])) {
                    echo "<li>An Airplane</li>";
                }
                if (empty($_GET["flight_number"])) {
                    echo "<li>A Flight Number</li>";
                }
                if (empty($_GET["arrivalTime"])) {
                    echo "<li>An Arrival Time</li>";
                }
                if (empty($_GET["departureTime"])) {
                    echo "<li>A Departure Time</li>";
                }
                echo "</ul>";
            } elseif ((strlen($_GET["flight_number"]) > 0 && strlen($_GET["flight_number"]) != 3) || intval($_GET["flight_number"]) == 0) {
                echo "Please enter a valid flight number. It must be a 3 digit number";
            } else {
                echo "All form fields are correctly filled out";
                try {
                    $flight_number = $_GET["flight_number"];
                    $airline = $_GET["airline"];
                    $airplane = $_GET["airplane"];
                    $arrival = $_GET["arrivalAirport"];
                    $departure = $_GET["departureAirport"];
                    $arrivalTime = $_GET["arrivalTime"];
                    $departureTime = $_GET["departureTime"];

                    $flightSuccess = $connection->query(<<<EOD
                        INSERT INTO Flight VALUES ("$airplane", "$arrival", "$arrivalTime", null, "$departure", "$departureTime", null, "$flight_number", "$airline");
                    EOD);

                    $days = $_GET["DaysOffered"];
                    $daySuccess = true;
                    foreach ($days as $key => $n) {
                        $temp = $connection->query(<<<EOD
                            INSERT INTO FlightDays VALUES ("$n", "$flight_number", "$airline");
                        EOD);
                        if (!$temp) {
                            $daySuccess = $temp;
                        }
                    }

                    if ($flightSuccess && $daySuccess) {
                        echo " and our flight was created";
                    }
                } catch (PDOException $e) {
                    echo "but there was an error". $e->getMessage()." ";
                    if (str_contains($e->getMessage(), "23000")) {
                        echo ": this flight number already exists with the airline.";
                    }
                    echo "Please try again.";
                    die();
                }
            }
