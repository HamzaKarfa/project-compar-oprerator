<?php

class Manager
{
  private $db;
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  


//----------------- CREATE -------------//  



//NEW TOUR OPERATOR
  public function addOperatorTour($operatorTour)
  {
    $q = $this->db->prepare('INSERT INTO tour_operators(name , grade, link, is_premium ) VALUES(:name , :grade , :link, :is_premium)');
    $q->bindValue(':nom', $operatorTour->getNom());
    $q->bindValue(':grade', $operatorTour->getGrade());
    $q->bindValue(':link', $operatorTour->getLink());
    $q->bindValue(':is_premium', $operatorTour->getIsPremium());
    $q->execute();
    
    $operatorTour->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);
  }


//NEW DESTINATION
  public function addDestination($destination)
  {
    $q = $this->db->prepare('INSERT INTO destinations(location , price, id_tour_operator ) VALUES(:location , :price , :id_tour_operator)');
    $q->bindValue(':location', $destination->getLocation());
    $q->bindValue(':price', $destination->getPrice());
    $q->bindValue(':id_tour_operator', $destination->getIdTourOperator());
    $q->execute();
    
    $destination->hydrate([
      'id' => $this->db->lastInsertId(),
    ]);
  }

// --------------- COUNT ------------------//
  public function count()
  {
//TOUR OPERATOR
    return $this->db->query('SELECT COUNT(*) FROM tour_operators')->fetchColumn();
//DESTINATION
    return $this->db->query('SELECT COUNT(*) FROM destinations')->fetchColumn();
  }
  
// --------------- DELETE ------------------//

//TOUR OPERATOR

  public function deleteOperatorTour($operatorTour)
  {
    $this->db->exec('DELETE FROM personnages WHERE id = '.$operatorTour->id());
  }
//DESTINATION
  public function deleteDestination($destination)
  {
    $this->db->exec('DELETE FROM personnages WHERE id = '.$destination->id());
  }


// --------------- SELECT ------------------//

//TOUR OPERATOR
  public function getOperatorTour($operatorTourInfo)
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

//DESTINATION
  public function getDestination($destinationInfo)
  {
    if (is_int($destinationInfo))
     
    {
      $q = $this->db->query('SELECT id, location, price, id_tour_operator FROM destinations WHERE id = '.$destinationInfo);
      $donnees = $q->fetch(PDO::FETCH_ASSOC);
      var_dump($donnees);
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
//TOUR OPERATOR
  public function getListOperatorTour($name)
  {
    
    $operatorTour = [];

    $q = $this->db->prepare('SELECT id, name, grade, link, is_premium FROM tour_operators WHERE name <> :name ORDER BY name');
    $q->execute([':name' => $name]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    array_push ($operatorTour, new OperatorTour($donnees));


    return $operatorTour;
  }

//DESTINATION
  public function getListDestination($location)
  {

    $destinationList = [];

    $q = $this->db->prepare('SELECT id, location, price, id_tour_operator FROM destinations WHERE location <> :location ORDER BY id_tour_operator');
    $q->execute([':location' => $location]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);
    
    array_push ($destinationList, new OperatorTour($donnees));
    
    return $destinationList;

  }



// --------------- UPDATE ------------------//

//TOUR OPERATOR
  public function updateOperatorTour($operatorTour)
  {
    $q = $this->db->prepare('UPDATE tour_operators SET name = :name, grade = :grade, link = :link, is_premium = :is_premium WHERE id = :id');
    

    $q->bindValue(':name', $operatorTour->getName(), PDO::PARAM_INT);
    $q->bindValue(':id', $operatorTour->getId(), PDO::PARAM_INT);
    $q->bindValue(':grade', $operatorTour->getGrade(), PDO::PARAM_INT);
    $q->bindValue(':link', $operatorTour->getLink(), PDO::PARAM_INT);
    $q->bindValue(':is_premium', $operatorTour->getIsPremium(), PDO::PARAM_INT);

    $q->execute();
  }
  
//DESTINATION
public function updateDestination($destination)
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