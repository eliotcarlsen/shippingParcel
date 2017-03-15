<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Parcel.php";

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('ship.html.twig');
    });

    $app->post("/quote", function() use ($app) {
      $user_parcel = new Parcel($_POST["lengthInput"], $_POST["widthInput"], $_POST["heightInput"], $_POST["weightInput"]);

      return $app['twig']->render('result.html.twig', array('parcel' => $user_parcel));
    });

  return $app;
?>
