<?php

require('../model/Passenger.php');

$passenger = Passenger::create()
  ->setDocument($_POST['document'])
  ->setName($_POST['document'])
  ->setEmail($_POST['document'])
  ->setPhone($_POST['document'])
  ->setGender($_POST['document']);

header("Location: /");
exit();