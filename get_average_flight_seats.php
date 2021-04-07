<!DOCTYPE html>
<html lang="en">

<html>

<head>
  <meta charset="utf-8">
  <title>Get Average Flight Seats</title>
  <!-- Custom stylesheet -->
  <link rel="stylesheet" href="css/side_bar.css">
</head>

</body>
<!-- Side navigation -->
<div class="sidenav">
  <a class="image-holder", href= "airline.php">
    <img src="images/paper_airplane.png" alt="Airplane Assignment" width="150" height="150">
  </a>
  <a class="sidenav_element" href="airline.php">
      <h1>Home</h1>
  </a>
  <a class="sidenav_element" href="search_flights.php">
      <h1>Search Flights</h1>
  </a>
  <a class="sidenav_element" href="create_flight.php">
      <h1>Create Flight</h1>
  </a>
  <a class="sidenav_element" href="update_flight.php">
      <h1>Update Flight</h1>
  </a>
  <a class="sidenav_element" href="get_average_flight_seats.php">
      <h1>Get Average Flight Seats</h1>
  </a>
</div>

<div class="main_view">
  <?php include 'networking/connectdb.php';?>

  <h1>Get Average Flight Seats</h1>

  <?php include 'networking/getaverageflightseats.php';?>

  <form action="/average_seats.php" style="text-align: center;" class="average_seats" >
    <label for="search" class="search-descriptors">Select a day: </label>
    <select id="days" name="days">
        <!-- <?php
           if ($_GET["days"])
        ?> -->
        <option value="Monday" <?php if($_GET["days"]=="Monday") echo 'selected="selected"'; ?>>Monday</option>
        <option value="Tuesday" <?php if($_GET["days"]=="Tuesday") echo 'selected="selected"'; ?>>Tuesday</option>
        <option value="Wednesday" <?php if($_GET["days"]=="Wednesday") echo 'selected="selected"'; ?>>Wednesday</option>
        <option value="Thursday" <?php if($_GET["days"]=="Thursday") echo 'selected="selected"'; ?>>Thursday</option>
        <option value="Friday" <?php if($_GET["days"]=="Friday") echo 'selected="selected"'; ?>>Friday</option>
        <option value="Saturday" <?php if($_GET["days"]=="Saturday") echo 'selected="selected"'; ?>>Saturday</option>
        <option value="Sunday" <?php if($_GET["days"]=="Sunday") echo 'selected="selected"'; ?>>Sunday</option>
    </select>
    <button type="submit" class="search-submit " method="get" style="text-align: center;" >
      <i class="material-icons">calculate</i>
      Calculate
       <i class="material-icons">calculate</i>
    </button>
  </form>

</div>

</body>

</html>
