<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Airline Assignment</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="style/airline.css">
  <link rel="stylesheet" href="style/side_bar.css">
</head>

<!-- Page content -->
<body>
  <!-- Side navigation -->
  <div class="sidenav">
    <div class="image-holder">
    <img src="img/paper_airplane.png" alt="Airplane Assignment" width="150" height="150"">
    </div>
    <a href="#">Home</a>
    <a href="#">Search flights</a>
    <a href="#">Create flight</a>
    <a href="#">Update flight</a>
    <a href="#">Get average flight seats</a>
  </div>

  <div class="main_view">
    <?php include 'connectdb.php';?>

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
