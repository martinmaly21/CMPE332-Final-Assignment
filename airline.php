<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Airline Assignment</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/side_bar.css">
</head>

<!-- Page content -->
<body>
  <!-- Side navigation -->
  <div class="sidenav">
    <a href="#">Home</a>
    <a href="#">Search flights</a>
    <a href="#">Create flight</a>
    <a href="#">Update flight</a>
    <a href="#">Get average flight seats</a>
  </div>

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
