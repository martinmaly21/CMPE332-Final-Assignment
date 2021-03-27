<?php
echo "<h3>";
        if (empty($_GET["airlinecode"]) || strlen($_GET["airlinecode"]) != 2) {
            echo "Search for a flight by entering a valid airline code and choosing a day.";
        } else {
            $code = $_GET["airlinecode"];
            $day = $_GET["days"];
            $result = $connection->query(<<<EOD
            SELECT
                Flight.AirlineCode AS AirlineCode,
                Flight.ThreeDigitNumber AS ThreeDigitNumber,
                ArrivalAirport.City AS ArrivalCity,
                DepartureAirport.City AS DepartureCity,
                DayValue
            FROM
                Flight
            JOIN DepartsFrom ON Flight.AirlineCode = DepartsFrom.AirlineCode AND Flight.ThreeDigitNumber = DepartsFrom.ThreeDigitNumber
            JOIN ArrivesAt ON Flight.AirlineCode = ArrivesAt.AirlineCode AND Flight.ThreeDigitNumber = ArrivesAt.ThreeDigitNumber
            JOIN Airport AS DepartureAirport
            ON
                DepartsFrom.AirportCode = DepartureAirport.AirportCode
            JOIN Airport AS ArrivalAirport
            ON
                ArrivesAt.AirportCode = ArrivalAirport.AirportCode
            JOIN DayOffered
            ON
                Flight.AirlineCode = DayOffered.AirlineCode AND Flight.ThreeDigitNumber = DayOffered.ThreeDigitNumber
            WHERE DayOffered.DayValue="$day" AND Flight.AirlineCode="$code"
        EOD);
            $result_fetched = $result->fetch();
            if (empty($result_fetched)) {
                echo "No results found. Are you sure '$code' and '$day' are the correct airline code and day you are looking for?";
            } else {
                echo "<table id='data'>
                            <tr>
                            <th>Airline</th>
                            <th>Flight Code</th>
                            <th>Departing Airport Location</th>
                            <th>Arriving Airport Location</th>
                        </tr>";
                echo "<tr>";
                echo "<td>" . $result_fetched["AirlineCode"] . "</td>";
                echo "<td>". $result_fetched["ThreeDigitNumber"]."</td>";
                echo "<td>". $result_fetched["DepartureCity"]."</td>";
                echo "<td>". $result_fetched["ArrivalCity"]."</td>";
                echo "</tr>";
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["AirlineCode"] . "</td>";
                    echo "<td>". $row["ThreeDigitNumber"]."</td>";
                    echo "<td>". $row["DepartureCity"]."</td>";
                    echo "<td>". $row["ArrivalCity"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
echo "</h3>";
