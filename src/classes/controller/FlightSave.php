<?php

require('../model/Flight.php');

$flight = Flight::create()
  ->setOrigin($_POST[''])
  ->setDestination($_POST[''])
  ->setDate($_POST['document'])
  ->setBoardingTime($_POST['document'])
  ->setCapacity($_POST['document']);;

header("Location: /src/classes/controller/FlightList.php");
exit();