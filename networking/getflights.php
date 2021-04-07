<?php
$query = "SELECT * FROM Flight";
$result = $connection->query($query);
$numberOfFlights = 0;

while ($row = $result->fetch()) {

$arrivalTime = empty($row["ActualArrivalTime"]) ? "N/A" : $row["ActualArrivalTime"];

    echo "<tr>";
    echo "<td>".$row["AirlineCode"]."</td>";
    echo "<td>".$row["FlightNumber"]."</td>";
    echo "<td>".$row["ExpectedArrivalTime"]."</td>";
    echo "<td>".$arrivalTime."</td>";
    echo "</tr>";
    $numberOfFlights ++;
}

echo "</table>";
    if ($numberOfFlights == 0) {
    	echo "<h4>No flights available.</h4>";
}
