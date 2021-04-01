<?php
    $departureTime = $_GET["departureTime"];
    if (empty($departureTime)) {
        echo <<<EOD
            <input id="search" class="add_flight_code" type="text" name="departureTime" placeholder="Type here">
        EOD;
    } else {
        echo <<<EOD
            <input id="search" class="add_flight_code" type="text" name="departureTime" value="$departureTime">
        EOD;
    }
