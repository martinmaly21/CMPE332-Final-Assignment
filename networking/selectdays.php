<?php
$days = $_GET["DaysOffered"];
    if (empty($days) || !in_array("Monday", $days)) {
          echo <<<EOD
          <input type="checkbox" id="Monday" name="DaysOffered[]" value="Monday" >
          <label for="Monday">Monday</label><br>
    EOD;
    } else {
          echo <<<EOD
          <input type="checkbox" id="Monday" name="DaysOffered[]" value="Monday" CHECKED>
          <label for="Monday">Monday</label><br>
          EOD;
    }
    if (empty($days) || !in_array("Tuesday", $days)) {
          echo <<<EOD
          <input type="checkbox" id="Tuesday" name="DaysOffered[]" value="Tuesday">
          <label for="Tuesday">Tuesday</label><br>
          EOD;
    } else {
          echo <<<EOD
          <input type="checkbox" id="Tuesday" name="DaysOffered[]" value="Tuesday" CHECKED>
          <label for="Tuesday">Tuesday</label><br>
          EOD;
    }
    if (empty($days) || !in_array("Wednesday", $days)) {
            echo <<<EOD
            <input type="checkbox" id="Wednesday" name="DaysOffered[]" value="Wednesday">
            <label for="Wednesday">Wednesday</label><br>
            EOD;
     } else {
            echo <<<EOD
            <input type="checkbox" id="Wednesday" name="DaysOffered[]" value="Wednesday" CHECKED>
            <label for="Wednesday">Wednesday</label><br>
            EOD;
      }
            if (empty($days) || !in_array("Thursday", $days)) {
              echo <<<EOD
              <input type="checkbox" id="Thursday" name="DaysOffered[]" value="Thursday">
              <label for="Thursday">Thursday</label><br>
              EOD;
      } else {
              echo <<<EOD
              <input type="checkbox" id="Thursday" name="DaysOffered[]" value="Thursday" CHECKED>
              <label for="Thursday">Thursday</label><br>
              EOD;
        }
            if (empty($days) || !in_array("Friday", $days)) {
                echo <<<EOD
                <input type="checkbox" id="Friday" name="DaysOffered[]" value="Friday">
                <label for="Friday">Friday</label><br>
                EOD;
             } else {
                 echo <<<EOD
                 <input type="checkbox" id="Friday" name="DaysOffered[]" value="Friday" CHECKED>
                 <label for="Friday">Friday</label><br>
                 EOD;
              }

              if (empty($days) || !in_array("Saturday", $days)) {
                  echo <<<EOD
                  <input type="checkbox" id="Saturday" name="DaysOffered[]" value="Saturday">
                  <label for="Saturday">Saturday</label><br>
                  EOD;
              } else {
                  echo <<<EOD
                  <input type="checkbox" id="Saturday" name="DaysOffered[]" value="Saturday" CHECKED>
                  <label for="Saturday">Saturday</label><br>
                   EOD;
              }
              if (empty($days) || !in_array("Sunday", $days)) {
                    echo <<<EOD
                      <input type="checkbox" id="Sunday" name="DaysOffered[]" value="Sunday">
                      <label for="Sunday">Sunday</label><br>
                        EOD;
              } else {
                    echo <<<EOD
                    <input type="checkbox" id="Sunday" name="DaysOffered[]" value="Sunday" CHECKED>
                    <label for="Sunday">Sunday</label><br>
                    EOD;
              }
