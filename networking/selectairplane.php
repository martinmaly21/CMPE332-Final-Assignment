<?php
$code = $_GET["airline"];
if (empty($code)) {
    echo "No airline selected. Select an airline then click the arrow.";
} else {
    $savedPlane = $_GET["airplane"];
    $airplanes = $connection->query("SELECT AirplaneId, AirplaneTypeName FROM Airplane WHERE AirlineCode='$code'");
    $airplaneCount = 0;
    while ($row = $airplanes->fetch()) {
        $airplaneId = $row["AirplaneId"];
        $airplaneTypeName = $row["AirplaneTypeName"];
        if ((empty($savedPlane) && $airplaneCount == 0) || $airplaneId == $savedPlane) {
             echo <<<EOD
            <input type="radio" id="$airplaneId" name="airplane" value="$airplaneId" CHECKED/>
            <label for="$airplaneId" >$airplaneTypeName ($airplaneId)</label><br>
            EOD;
        } else {
            echo <<<EOD
            <input type="radio" id="$airplaneId" name="airline" value="$airplaneId" />
            <label for="$airplaneId" >$airplaneTypeName ($airplaneId)</label><br>
            EOD;
        }
        $airplaneCount ++;
        }
        if ($airplaneCount = 0) {
            echo "No Airplanes Available - you cannot create a flight";
            }
  }
