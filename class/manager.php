<?php

class Manager
{
  private $db;
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
//----------------- CREATE -------------//  

  public function addOperatorTour($operatorTour)
  //NEW TOUR OPERATOR
  {
    $q = $this->db->prepare('INSERT INTO tour_operators(name , grade, link, is_premium ) VALUES(:name , :grade , :link, :is_premium)');
    $q->bindValue(':name', $operatorTour->getName());
    $q->bindValue(':grade', $operatorTour->getGrade());
    $q->bindValue(':link', $operatorTour->getLink());
    if ($operatorTour->getIsPremium()==null) {
      $q->bindValue(':is_premium',0);
    }else{
      $q->bindValue(':is_premium',$operatorTour->getIsPremium());
    }
    $q->execute();
    
    $operatorTour->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);
  }

  public function addDestination($destination)
  //NEW DESTINATION
  {
    $q = $this->db->prepare('INSERT INTO destinations(location , price, id_tour_operator ) VALUES(:location , :price , :id_tour_operator)');
    $q->bindValue(':location', $destination->getLocation());
    $q->bindValue(':price', $destination->getPrice());
    $q->bindValue(':id_tour_operator', $destination->getIdTourOperator());
    $q->execute();
    
    $destination->hydrate([
      'id' => $this->db->lastInsertId()
    ]);
  }

// --------------- COUNT ------------------//

  public function countOperator()
  //TOUR OPERATOR
  {
    return $this->db->query('SELECT COUNT(*) FROM tour_operators')->fetchColumn();
  }  
  public function countOperatorPremium()
  {
    return $this->db->query('SELECT COUNT(*) FROM tour_operators WHERE is_premium = 1')->fetchColumn();
  }  
  public function countDestination()
  //DESTINATION
  {
    return $this->db->query('SELECT COUNT(*) FROM destinations')->fetchColumn();
  }
  
// --------------- DELETE ------------------//

  public function deleteOperatorTour($operatorTourId)
  //TOUR OPERATOR
  {
    $this->db->exec('DELETE FROM tour_operators WHERE id = '.$operatorTourId);
  }
  //DESTINATION
  public function deleteDestination($destinationId)
  {
    $this->db->exec('DELETE FROM destinations WHERE id = '.$destinationId);
  }

// --------------- SELECT ------------------//

  public function getOperatorTour($operatorTourInfo)
  //TOUR OPERATOR 
  {
    if (is_int($operatorTourInfo))
    {
    $q = $this->db->query('SELECT * FROM tour_operators WHERE id = '.$operatorTourInfo);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new OperatorTour($donnees);
  
    }
    else
    {
    $q = $this->db->prepare('SELECT  * FROM tour_operators WHERE name = :name');
    $q->execute([':name' => $operatorTourInfo]);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new OperatorTour($donnees);
  
    }
  }

  public function getDestination($destinationInfo)
  //DESTINATION
  {
    if (is_int($destinationInfo))
     
    {
      $q = $this->db->query('SELECT * FROM destinations WHERE id_tour_operator = '.$destinationInfo);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
        return new Destination($donnees);

    }
    else
    {
      $destinations =[];
      $q = $this->db->prepare("SELECT * FROM destinations WHERE location = :location");
      $q->execute([':location' => $destinationInfo]);
      $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
      foreach ($donnees as $key ) {
        array_push($destinations, new Destination($key)); 
      }
      return $destinations;
        
    }
  }

// --------------- SELECT LIST ------------------//

  public function getListOperatorTour()
  //TOUR OPERATOR
  {
    
    $operatorTour = [];

    $q = $this->db->prepare('SELECT * FROM tour_operators  ORDER BY name');
    $q->execute();
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i <count($donnees) ; $i++) { 
        array_push ($operatorTour, new OperatorTour($donnees[$i]));
    }
    
    return $operatorTour;
  }

  public function getListDestination()
  //DESTINATION
  {

    $destinationList = [];

    $q = $this->db->prepare('SELECT * FROM destinations ORDER BY location');
    $q->execute();
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i <count($donnees) ; $i++) { 
        array_push ($destinationList, new Destination($donnees[$i]));
    }
    
    return $destinationList;


  }
  public function getListLocation()
  //DESTINATION
  {

    $destinationList = [];

    $q = $this->db->prepare('SELECT destinations.location FROM destinations INNER JOIN location ON location = location GROUP BY location');
    $q->execute();
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i <count($donnees) ; $i++) { 
        array_push ($destinationList, new Destination($donnees[$i]));
    }
    
    return $destinationList;


  }


// --------------- UPDATE ------------------//


  public function updateOperatorTour($operatorTour)
  //TOUR OPERATOR
  {
    $q = $this->db->prepare('UPDATE tour_operators SET name = :name, link = :link, is_premium = :is_premium WHERE id ='.$operatorTour->getId());
    
    $q->bindValue(':name', $operatorTour->getName());
    $q->bindValue(':link', $operatorTour->getLink());
    $q->bindValue(':is_premium', $operatorTour->getIsPremium());
    $q->execute();
    echo($operatorTour->getName().' A bien été modifié');
  }
  

  public function updateDestination($destination)
  //DESTINATION
  {
    $q = $this->db->prepare('UPDATE destinations SET location = :location, price = :price, id_tour_operator = :id_tour_operator WHERE id = '.$destination->getId());


    $q->bindValue(':location', $destination->getLocation());
    $q->bindValue(':price', $destination->getPrice(), PDO::PARAM_INT);
    $q->bindValue(':id_tour_operator', $destination->getIdTourOperator(), PDO::PARAM_INT);

    $q->execute();
    echo($destination->getLocation().' A bien été modifié');
  }

  //Setter DB
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }



//---------------------------- Review ----------------------//



  public function getListReview()

  {
    $reviewList = [];
    $q = $this->db->query('SELECT  * FROM reviews ORDER BY id DESC');
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($donnees) ; $i++) { 
      array_push ($reviewList, new Review($donnees[$i]));

    }
      return $reviewList;

  }
  public function addReview($review)

  {
    $q = $this->db->prepare('INSERT INTO reviews( message, author, id_tour_operator, vote ) VALUES(:message , :author , :id_tour_operator, :vote)');
    $q->bindValue(':message', $review->getMessage());
    $q->bindValue(':author', $review->getAuthor());
    $q->bindValue(':id_tour_operator', $review->getIdTourOperator());
    $q->bindValue(':vote', $review->getVote());
    $q->execute();
    
    $review->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);
  }
  
  public function updateGradeOperatorTour($operatorTour,$note)
  //TOUR OPERATOR
  {
    $q = $this->db->prepare('UPDATE tour_operators SET grade = :grade WHERE id ='.$operatorTour);
    
    $q->bindValue(':grade', $note);
    $q->execute();
  }

  public function getOperatorTourReview($operator)
  //DESTINATION
  {
    if ($operator)
     
    {
      $q = $this->db->query('SELECT vote FROM reviews WHERE id_tour_operator = '.$operator);
      $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
        return $donnees;

    }
  }
  public function getReview($id)

  {
    $reviewList = [];
    $q = $this->db->query('SELECT  * FROM reviews WHERE id_tour_operator ='.$id.' ORDER BY id DESC');
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    for ($i=0; $i < count($donnees) ; $i++) { 
      array_push ($reviewList, new Review($donnees[$i]));

    }
      return $reviewList;

  }
}