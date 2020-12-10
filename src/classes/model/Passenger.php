<?php

class Passenger
{
  private $name;
  private $document;
  private $email;
  private $phone;
  private $gender;

  public static function create() 
  {
      return new static();
  }

  public function getName()
  {
      return $this->name;
  }

  public function getDocument()
  {
      return $this->document;
  }
  
  public function getEmail()
  {
      return $this->email;
  }

  public function getPhone()
  {
      return $this->phone;
  }
  
  public function getGender()
  {
      return $this->gender;
  }

  public function setName($name) : self
  {
      $this->name = $name;
      return $this;
  }

  public function setDocument($document) : self
  {
      $this->document = $document;
      return $this;
  }

  public function setEmail($email) : self
  {
      $this->email = $email;
      return $this;
  }

  public function setPhone($phone) : self
  {
      $this->phone = $phone;
      return $this;
  }

  public function setGender($gender) : self
  {
      $this->gender = $gender;
      return $this;
  }
}
