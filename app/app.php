<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    $app = new Silex\Application();

    $app->get("/", function() {
      return "<!DOCTYPE html>
      <html>
      <head>
          <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
          <title>Find a Car</title>
      </head>
      <body>
          <div class='container'>
              <h1>Find a Car!</h1>
              <form action='/result'>
                  <div class='form-group'>
                      <label for='price'>Enter Maximum Price:</label>
                      <input id='price' name='price' class='form-control' type='number'>
                  </div>
                  <button type='submit' class='btn-success'>Submit</button>
              </form>
          </div>
      </body>
      </html>";
    });

    $app->get("/result", function() {
        $car1 = new Car("2014 Porsche 911", 114991, 0, '' , "images/porsche.jpg");
        $car2 = new Car("2011 Ford F450", 55995, 0, '' ,"images/ford.jpg");
        $car3 = new Car("2013 Lexus RX 350", 44700, 0, '' , "images/lexus.jpg");
        $car4 = new Car("Mercedes Benz CLS550", 39900, 37979, '' , "images/mercedes.jpg");
        $car5 = new Car("Ford F150", 24900, 45979, '' , "images/f150.jpg");
        // error testing: var_dump("Car 4 status " . $car4->getStatus());
        $car4->setStatus("used");
        // error testing: var_dump("Car 4 status " . $car4->getStatus());

        $cars = array($car1, $car2, $car3, $car4, $car5);

        $cars_matching_search = array();
        foreach ($cars as $car) {
            if ($car->getPrice() < $_GET["price"]) {
                array_push($cars_matching_search, $car);
            }
        }


        $car_list = "";
        foreach ($cars_matching_search as $car) {
            $car_list = $car_list."<li> <img src=".$car->image."></li>
            <li>" . $car->getMake_model() . "</li>
            <ul>
                <li>$" . $car->getPrice() . " </li>
                <li> Miles:" . $car->getMiles() . "</li>
                <li>" . $car->getStatus() . "</li>
            </ul>";
        }

        return "<!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='styles.css'>
            <title>Your Car Dealership's Homepage</title>
        </head>
        <body>
            <h1>Your Car Dealership</h1>
            <ul>
                ".$car_list."
            </ul>
        </body>
        </html>";
    });

    return $app;
?>
