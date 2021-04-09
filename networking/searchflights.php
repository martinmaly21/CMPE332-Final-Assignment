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
                Flight.FlightNumber AS FlightNumber,
                ArrivalAirport.AirportCity AS ArrivalAirportCity,
                DepartureAirport.AirportCity AS DepartureAirportCity
            FROM
                Flight
            JOIN
              FlightDays ON Flight.AirlineCode = FlightDays.AirlineCode AND Flight.FlightNumber = FlightDays.FlightNumber
            JOIN
              Airport AS ArrivalAirport ON Flight.ArrivalAirportCode = ArrivalAirport.AirportCode
            JOIN
              Airport AS DepartureAirport ON Flight.DepartureAirportCode = DepartureAirport.AirportCode
            WHERE
              Flight.AirlineCode="$code" AND FlightDays.FlightDayOffered="$day"
        EOD);
            $result_fetched = $result->fetch();
            if (empty($result_fetched)) {
                echo "No results found. Are you sure '$code' and '$day' are the correct airline code and day you are looking for?";
            } else {
                echo "<table id='data'>
                            <tr>
                            <th>Airline |</th>
                            <th>Flight Code |</th>
                            <th>Departing Airport Location |</th>
                            <th>Arriving Airport Location</th>
                        </tr>";
                echo "<tr>";
                echo "<td>" . $result_fetched["AirlineCode"] . "</td>";
                echo "<td>". $result_fetched["FlightNumber"]."</td>";
                echo "<td>". $result_fetched["DepartureAirportCity"]."</td>";
                echo "<td>". $result_fetched["ArrivalAirportCity"]."</td>";
                echo "</tr>";
                while ($row = $result->fetch()) {
                    echo "<tr>";
                    echo "<td>" . $row["AirlineCode"] . "</td>";
                    echo "<td>". $row["FlightNumber"]."</td>";
                    echo "<td>". $row["DepartureAirportCity"]."</td>";
                    echo "<td>". $row["ArrivalAirportCity"]."</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
echo "</h3>";
