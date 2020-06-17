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
    $q = $this->db->query('SELECT id, name, grade, link, is_premium FROM tour_operators WHERE id = '.$operatorTourInfo);
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

        return new OperatorTour($donnees);
  
    }
    else
    {
    $q = $this->db->prepare('SELECT  id, name, grade, link, is_premium FROM tour_operators WHERE name = :name');
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
        
      $q = $this->db->prepare('SELECT  id, location, price, id_tour_operator FROM destinations WHERE location = :location');
      $q->execute([':location' => $destinationInfo]);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new Destination($donnees); 


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
    $q = $this->db->prepare('UPDATE tour_operators SET name = :name, grade = :grade, link = :link, is_premium = :is_premium WHERE id = :id');
    

    $q->bindValue(':name', $operatorTour->getName(), PDO::PARAM_INT);
    $q->bindValue(':id', $operatorTour->getId(), PDO::PARAM_INT);
    $q->bindValue(':grade', $operatorTour->getGrade(), PDO::PARAM_INT);
    $q->bindValue(':link', $operatorTour->getLink(), PDO::PARAM_INT);
    $q->bindValue(':is_premium', $operatorTour->getIsPremium(), PDO::PARAM_INT);

    $q->execute();
  }
  

  public function updateDestination($destination)
  //DESTINATION
  {
    $q = $this->db->prepare('UPDATE destinations SET location = :location, price = :price, id_tour_operator = :id_tour_operator WHERE id = :id');


    $q->bindValue(':location', $destination->getName(), PDO::PARAM_INT);
    $q->bindValue(':id', $destination->getId(), PDO::PARAM_INT);
    $q->bindValue(':price', $destination->getGrade(), PDO::PARAM_INT);
    $q->bindValue(':id_tour_operator', $destination->getLink(), PDO::PARAM_INT);

    $q->execute();
  }

  //Setter DB
  public function setDb(PDO $db)
  {
    $this->db = $db;
  }
}