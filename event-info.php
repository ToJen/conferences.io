<!DOCTYPE html>
<html>
  <head>
    <title>About this Event</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/attendees.css">
	  <style>	 
      .table-striped > tbody > tr:nth-child(odd) > td, 
      .table-striped > tbody > tr:nth-child(odd) > th {
        background-color: #00B398;
      }

      .image-responsive {
        width: 100px !important;
        height: 100px !important;
      }
    </style>
  </head>
  <body>

    <?php include('header.php'); ?>

    <div class="container">

      <br><br>
      <h2>About `Event Name`</h2>
      <hr>
      <div class="row">
        <!-- should be dynamic -->
        <div class="col-lg-6 col-md-6">
          <span class="glyphicon glyphicon-map-marker"></span> Event Location, Street Number, Postal Code, St. John's, NL
        </div>
        <div class="col-lg-3 col-md-3">
          <span class="glyphicon glyphicon-calendar"></span> Someday, 31st February, 2024
        </div>
        <div class="col-lg-3 col-md-3">
          <span class="glyphicon glyphicon-time"></span> 25:99 am
        </div>
      </div>  <!-- .row -->

      <hr>

      <div class="row">
        <div class="col-lg-3"><h2>Weather Forecast</h2></div>
        <div class="col-lg-3 col-md-4" id="temp"><p>-5&degC (23&degF) | Cloudy | Light Snow</p></div>
        <div class="col-lg-3 col-md-4" id="wind"><p>Wind: 40 KM/H | Precipitaion: 3% | Humidity: 72%</p></div>
        <div class="col-lg-3 col-md-4" id="weather-icon"><img src="imgs/weather-icon-cloudy.png" class="image-responsive"></div>
      </div>

      <hr>

      <h2>Overview</h2>
      <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>

      <hr>

      <h2>Speakers</h2>
      <div class="row">
        <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6">
           <div class="info-block block-info clearfix">
                <div class="square-box pull-left">
                    <span class="glyphicon glyphicon-user glyphicon-lg"></span>
                </div>
                <h5>Company Name</h5>
                <h4>Name: Glenn Pho shizzle</h4>
                <p>Title: Manager</p>
                <span class="glyphicon glyphicon-earphone"></span> 55-555-5555 
                <span class="glyphicon glyphicon-envelope"></span> sample@company.com
            </div>
        </div>
        <div class="items col-xs-12 col-sm-12 col-md-6 col-lg-6">
           <div class="info-block block-info clearfix">
                <div class="square-box pull-left">
                    <span class="glyphicon glyphicon-user glyphicon-lg"></span>
                </div>
                <h5>Company Name</h5>
                <h4>Name: Brian Hoyies</h4>
                <p>Title: Manager</p>
                <span class="glyphicon glyphicon-earphone"></span> 55-555-5555 
                <span class="glyphicon glyphicon-envelope"></span> sample@company.com
            </div>
        </div>
      </div> <!-- .row -->
      <h4>View the full list of guests <a href="attendees.html">here</a>.</h4>

      <hr>

      <h2>Schedule</h2>
      <table class="table table-striped">
        <thead>
          <th>Topic</th>
          <th>Time</th>
          <th>Speaker</th>
          <th>Location</th>
        </thead>
        <tbody>
          <tr>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
          <tr>
            <td>lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr>
        </tbody>
      </table>

    </div>  <!-- .container -->
    
    <br><br>
    <?php include("footer.php") ?>

  </body>
</html>