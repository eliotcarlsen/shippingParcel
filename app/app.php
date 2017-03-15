<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/shipping.php";

    $app = new Silex\Application();

    $app->get("/", function() {
      return '<!DOCTYPE html>
      <html>
        <head>
          <link href="/css/bootstrap.css" type="text/css" rel="stylesheet">
          <link href="/css/styles.css" type="text/css" rel="stylesheet">
          <title>Shipping Quote</title>
        </head>
        <body>
          <div class="container">
            <h1>Shipping Quote:</h1>
            <form id="userInput" action="/quote">
              <div class="form-group">
                <label for="lengthInput">Enter parcel length?</label>
                <input id="lengthInput" name="lengthInput" class="form-control" type="number" required>
              </div>
              <div class="form-group">
                <label for="widthInput">Enter parcel width?</label>
                <input id="widthInput" name="widthInput" class="form-control" type="number" required>
              </div>
              <div class="form-group">
                <label for="heightInput">Enter parcel height?</label>
                <input id="heightInput" name="heightInput" class="form-control" type="number" required>
              </div>
              <div class="form-group">
                <label for="weightInput">Enter parcel weight?</label>
                <input id="weightInput" name="weightInput" class="form-control" type="number" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-success">Get Shipping Quote</button>
              </div>
            </form>
          </div>
        </body>
      </html>';
    });
    $app->get("/quote", function() {

      $user_parcel = new Parcel($_GET["lengthInput"], $_GET["widthInput"], $_GET["heightInput"], $_GET["weightInput"]);

      $parcels = array($user_parcel);

      foreach ($parcels as $dimension) {
        $parcel_length = $dimension->getLength();
        $parcel_width = $dimension->getWidth();
        $parcel_height = $dimension->getHeight();
        $parcel_weight = $dimension->getWeight();
      };

      return "<!DOCTYPE html>
      <html>
      <head>
        <link href='css/bootstrap.css' type='text/css' rel='stylesheet'>
        <link href='css/styles.css' type='text/css' rel='stylesheet'>
        <title>Shipping Quotes</title>
      </head>
        <body>
          <div classs='container'>
            <h1>Here's your shipping quote:</h1>
               <p>The dimensions of your parcel are:</p>
                  <p>This produces a total volume of: " . ($dimension->volume()) . " cubic inches</p>
                  <ul>
                    <li>length: " . $dimension->getLength() . "</li>
                    <li>width: " . $dimension->getWidth() . "</li>
                    <li>height: " . $dimension->getHeight() . "</li>
                    <li>weight: " . $dimension->getWeight() . "</li>
                  </ul>
              <h3>The price to ship this parcel will be: $" . ($user_parcel->userPrice()) . "</h3>
          </div>
        </body>
      </html>";
    });
    return $app;

?>
