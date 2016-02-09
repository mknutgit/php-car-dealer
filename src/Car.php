<?php

class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $status;
    public $image;

    function __construct($make_model, $price, $miles, $status="new", $image)
    {
        $this->make_model = $make_model;
        $this->price = $price;
        $this->miles = $miles;
        $this->status = $status;
        $this->image = $image;
    }

    // Getter - for private - make_model
    function getMake_model()
    {
      return $this->make_model;
    }

    //Setter - for private - make_model
    function setMake_model($new_make_model)
    {
      $this->price = $new_make_model;
    }

    // Getter - for private - price
    function getPrice()
    {
      return $this->price;
    }

    //Setter - for private - price
    function setPrice($new_price)
    {
      $this->price = $new_price;
    }

    // Getter - for private - miles
    function getMiles()
    {
      return $this->miles;
    }

    //Setter - for private - miles
    function setMiles($new_miles)
    {
      $this->miles = $new_miles;
    }

    // Getter - for private - status
    function getStatus()
    {
      return $this->status;
    }

    //Setter - for private - status
    function setStatus($new_status)
    {
      $this->status = $new_status;
    }

}

?>
