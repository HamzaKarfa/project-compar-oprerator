<?php

class Review
{
  protected $id,
            $message,
            $author,
            $idtouroperator,
            $vote;
  
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
  public function getMessage()
    {
      return $this->message;
    }
  public function getIdTourOperator()
    {
      return $this->idtouroperator;
    }
  public function getAuthor()
    {
      return $this->author;
    }  
  public function getVote()
    {
      return $this->vote;
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
  
  public function setMessage($message)
    {
      if(is_string($message))
      {
        $this->message = $message;
      }
    }
  public function setAuthor($author)
    {
        $this->author = $author;
    }
  public function setId_tour_operator($idtouroperator)
    {
        $this->idtouroperator = $idtouroperator;
    }
  public function setVote($vote)
    {
        $this->vote = $vote;
    }
}