<?php
  class Parcel
  {
      private $length;
      private $width;
      private $height;
      private $weight;
function __construct($parcel_length, $parcel_width, $parcel_height, $parcel_weight)
          {
            $this->length = $parcel_length;
            $this->width = $parcel_width;
            $this->height = $parcel_height;
            $this->weight = $parcel_weight;
          }

          function setLength($new_length)
          {
            $this->length = $new_length;
          }
          function getLength()
          {
            return $this->length;
          }
          function setWidth($new_width)
          {
            $this->width = $new_width;
          }
          function getWidth()
          {
            return $this->width;
          }
          function setHeight($new_height)
          {
            $this->height = $new_height;
          }
          function getHeight()
          {
            return $this->height;
          }
          function setWeight($new_weight)
          {
            $this->weight = $new_weight;
          }
          function getWeight()
          {
            return $this->weight;
          }

          function userPrice()
          {
            $total_price = (((($this->length + $this->width) + $this->height) / 2) * $this->weight);
            return $total_price;
          }
          function volume()
          {
            $total_volume = (($this->length * $this->width) * $this->height);
            return $total_volume;
          }
  }

  $user_parcel = new Parcel($_GET["lengthInput"], $_GET["widthInput"], $_GET["heightInput"], $_GET["weightInput"]);

  $parcels = array($user_parcel);

 ?>

<!DOCTYPE html>
<html>
<head>
  <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
  <link href="css/styles.css" type="text/css" rel="stylesheet">
  <title>Shipping Quotes</title>
</head>
  <body>
    <div classs="container">
      <h1>Here's your shipping quote:</h1>
        <?php
        foreach ($parcels as $dimension) {
          $parcel_length = $dimension->getLength();
          $parcel_width = $dimension->getWidth();
          $parcel_height = $dimension->getHeight();
          $parcel_weight = $dimension->getWeight();
          echo "<p>The dimensions of your parcel are:</p>
            <p>This produces a total volume of: ".($user_parcel->volume())." cubic inches</p>
            <ul>
              <li>length: $parcel_length </li>
              <li>width: $parcel_width </li>
              <li>height: $parcel_height </li>
              <li>weight: $parcel_weight </li>
            </ul>";
        }
          echo "<h3>The price to ship this parcel will be: $".($user_parcel->userPrice())."</h3>";

        ?>
    </div>
  </body>
</html>
