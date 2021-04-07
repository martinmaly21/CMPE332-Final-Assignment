<?php
                if (empty($_GET["days"])) {
                    echo "Please select a day";
                } else {
                    $day = $_GET["days"];
                    $result = $connection->query(<<<EOD
                        SELECT
                            Flight.AirlineCode,
                            Flight.FlightNumber,
                            AirplaneType.AirplaneTypeMaxNumberOfSeats,
                            FlightDays.FlightDayOffered
                        FROM
                            Flight
                        JOIN FlightDays ON Flight.AirlineCode = FlightDays.AirlineCode AND Flight.FlightNumber = FlightDays.FlightNumber
                        JOIN Airplane ON Flight.AirplaneID = Airplane.AirplaneID
                        JOIN AirplaneType ON AirplaneType.AirplaneTypeName = Airplane.AirplaneTypeName
                        WHERE
                            FlightDays.FlightDayOffered="$day"
                    EOD);
                    $sum = 0;
                    $count = 0;
                    while ($row = $result->fetch()) {
                        echo "<br />";
                        $sum = $sum + $row["AirplaneTypeMaxNumberOfSeats"];
                        $count = $count + 1;
                    }
                    if ($count == 0) {
                        $average = 0;
                    } else {
                        $average = $sum / $count;
                    }
                    echo "<div style='text-align: center;'>The average number of seats per flight on $day is $average </div>";
                }
            ?>
