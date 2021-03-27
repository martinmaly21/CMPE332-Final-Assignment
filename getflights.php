<?php
$query = "SELECT * FROM Flight";
$result = $connection->query($query);
$numberOfFlights = 0;

while ($row = $result->fetch()) {
    echo "<tr>";
    echo "<td>".$row["AirlineCode"]."</td>";
    echo "<td>".$row["FlightNumber"]."</td>";
    echo "<td>".$row["ExpectedArrivalTime"]."</td>";
    echo "<td>".$row["ActualArrivalTime"]."</td>";
    echo "</tr>";
    $numberOfFlights ++;
}

echo "</table>";
    if ($numberOfFlights == 0) {
    	echo "<h4>No flights available.</h4>";
}
