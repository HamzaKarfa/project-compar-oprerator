<?php

class OperatorTour
{
  protected $id,
            $name,
            $grade,
            $isPremium,
            $link;
  
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
  public function getName()
    {
      return $this->name;
    }
  public function getGrade()
    {
      return $this->grade;
    }
  public function getIsPremium()
    {
      return $this->isPremium;
    } 
  public function getLink()
    {
      return $this->link;
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
  
  public function setName($name)
    {
      if(is_string($name))
      {
        $this->name = $name;
      }
    }
  public function setGrade($grade)
    {
        $this->grade = $grade;
    }
    
  public function setLink($link)
    {
        $this->link = $link;
    }

  public function setIsPremium(bool $isPremium)
    {
        $this->isPremium = $isPremium;
    }


}
