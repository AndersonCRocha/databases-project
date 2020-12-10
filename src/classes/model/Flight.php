<?php

class Flight
{
  private $id;
  private $origin;
  private $destination;
  private $date;
  private $boardingTime;
  private $capacity;

  public static function create() 
  {
      return new static();
  }

  public function getId()
  {
      return $this->id;
  }

  public function getOrigin() 
  {
    return $this->origin;    
  }

  public function getDestination()
  {
    return $this->destination;
  }

  public function getDate()
  {
      return $this->date;
  }
  
  public function getBoardingTime()
  {
      return $this->boardingTime;
  }

  public function getCapacity()
  {
      return $this->capacity;
  }

  public function setId($id) : self
  {
      $this->id = $id;
      return $this;
  }

  public function setOrigin($origin) : self
  {
      $this->origin = $origin;
      return $this;
  }

  public function setDestination($destination) : self
  {
      $this->destination = $destination;
      return $this;
  }

  public function setDate($date) : self
  {
      $this->date = $date;
      return $this;
  }

  public function setBoardingTime($boardingTime) : self
  {
      $this->boardingTime = $boardingTime;
      return $this;
  }

  public function setCapacity($capacity) : self
  {
      $this->capacity = $capacity;
      return $this;
  }
}