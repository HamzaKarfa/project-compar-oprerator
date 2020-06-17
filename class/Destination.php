<?php

class Destination
{
  protected $id,
            $location,
            $price,
            $idtouroperator;
  
  public function __construct(array $donnees)
    {
      $this->hydrate($donnees);
    }
  
  public function hydrate(array $donnees)
    {
      foreach ($donnees as $key => $value)
      {
        
        $method = 'set'.ucfirst($key);
        if(method_exists($this, $method))
        {
          $this->$method($value);
      }
      }
    }
  


  // GETTERS //
  
  public function getId()
    {
      return $this->id;
    }
  public function getLocation()
    {
      return $this->location;
    }
  public function getIdTourOperator()
    {
      return $this->idtouroperator;
    }
  public function getPrice()
    {
      return $this->price;
    }  
  // SETTERS //

  
  public function setId($id)
    {
      $id = (int) $id;

      if($id > 0)
      {
        $this->id = $id;
      }
    }
  
  public function setLocation($location)
    {
      if(is_string($location))
      {
        $this->location = $location;
      }
    }
  public function setPrice($price)
    {
        $this->price = $price;
    }
  public function setId_tour_operator($idtouroperator)
    {

        $this->idtouroperator = $idtouroperator;
    }
}