<?php
                if (empty($_GET["days"])) {
                    echo "Please select a day";
                } else {
                    $day = $_GET["days"];
                    $result = $connection->query(<<<EOD
                        SELECT
                            Flight.AirlineCode,
                            Flight.ThreeDigitNumber,
                            AirplaneType.MaxSeats,
                            DayOffered.DayValue
                        FROM
                            Flight
                        JOIN DayOffered ON Flight.AirlineCode = DayOffered.AirlineCode AND Flight.ThreeDigitNumber = DayOffered.ThreeDigitNumber
                        JOIN Airplane ON Flight.AirplaneId = Airplane.AirplaneId
                        JOIN AirplaneType ON AirplaneType.AirplaneTypeName = Airplane.AirplaneTypeName
                        WHERE DayOffered.DayValue="$day"
                    EOD);
                    $sum = 0;
                    $count = 0;
                    while ($row = $result->fetch()) {
                        echo "<br />";
                        $sum = $sum + $row["MaxSeats"];
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
