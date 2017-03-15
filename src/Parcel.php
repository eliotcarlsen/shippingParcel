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
?>
