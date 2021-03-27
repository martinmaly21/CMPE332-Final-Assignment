<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Airline Assignment</title>
</head>

<body>
  <?php include 'connectdb.php';?>
  <div class="main_view">
    <h1>Airline Assignment</h1>
    <h2>Available Flights</h2>
    <table id="data">
      <tr>
                <th>Airline |</th>
                <th>Flight Code |</th>
                <th>Scheduled Arrival Time |</th>
                <th>Actual Arrival Time</th>


      </tr>
      <?php include 'getflights.php';?>
  </div>
</body>

</html>
