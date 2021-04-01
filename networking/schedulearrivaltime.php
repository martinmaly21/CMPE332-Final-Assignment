<?php
    $arrivalTime = $_GET["arrivalTime"];
    if (empty($arrivalTime)) {
        echo <<<EOD
            <input id="search" class="add_flight_code" type="text" name="arrivalTime" placeholder="Type here">
        EOD;
    } else {
        echo <<<EOD
            <input id="search" class="add_flight_code" type="text" name="arrivalTime" value="$arrivalTime">
        EOD;
    }
