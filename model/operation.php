<?php
require_once __DIR__."/../model/DbConnection.php";
class operation extends Dbconnect {

    public function getTrains()
    {
        $sql="SELECT * FROM train";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
     public function getDepart()
    {
        $sql="SELECT DISTINCT departure from trip";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
      public function getArrival()
    {
        $sql="SELECT DISTINCT arrival from trip";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public function getSpecifedTrip()
    {
        // $sql="SELECT trip.idTrip ,trip.dateDepart ,trip.dateArrive ,trip.departure , trip.arrival , trip.prix , trip.status FROM `trip` JOIN train ON (trip.idTrain=train.idTrain);";
        $sql ="SELECT trip.idTrip ,trip.dateDepart ,trip.dateArrive ,trip.departure , trip.arrival , trip.prix , trip.status , train.departureStation , train.arrivalStation FROM `trip` JOIN train ON (trip.idTrain=train.idTrain);";
        $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public function getTrip($idTrip)
    {
        $sql="SELECT * FROM `trip` WHERE idTrip='$idTrip'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }
            //reserve Trip
    public function insertUser($fname,$lname,$adresse,$email,$phone)
    {
        $str="INSERT INTO `user`( `Fname`, `Lname`, `Adresse`, `email`, `phone`) VALUES(:fname, :lname,:adresse,:email,:phone)";
		$query=$this->connect()->prepare($str);
        $query->bindValue(':fname', $fname);
        $query->bindValue(':lname', $lname);
        $query->bindValue(':adresse', $adresse);
        $query->bindValue(':email', $email);
        $query->bindValue(':phone', $phone);
		$query->execute();
    }
    public function getLastId()
    {
        $last_id="SELECT MAX(idUser) FROM user";
        $query=$this->connect()->prepare($last_id);
        $query->execute();
         $results = $query->fetch();
        return $results;
    }
    public function addReservation($idTrip,$price,$fname,$lname,$adresse,$email,$phone)
    {
        // $payment=$price * $nbPerson;
        $this->insertUser($fname,$lname,$adresse,$email,$phone);
        $last_idUser = $this->getLastId();
        $iduser= $last_idUser['MAX(idUser)'];
      
        $res="INSERT INTO `booking`(`idTrip`, `state`, `payment`, `idUser`) VALUES ('$idTrip','1','$price','$iduser')";
        $queryReserve=$this->connect()->prepare($res);
        $queryReserve->execute();
    }
    public function addReservationByClient($idTrip,$price,$iduser)
    {
        // $payment=$price * $nbPerson;
         $res="INSERT INTO `booking`(`idTrip`, `state`, `payment`, `idUser`) VALUES ('$idTrip','1','$price','$iduser')";
        $queryReserve=$this->connect()->prepare($res);
        $queryReserve->execute();
    }
// client reservation
  function getClientReservation($id)
   {
        $sql = "SELECT trip.dateDepart,trip.departure,trip.arrival,booking.idBooking,booking.payment,booking.state FROM `trip` join booking on trip.idTrip=booking.idTrip WHERE booking.idUser=$id";
         $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
          $results = $stmt->fetchAll();
        return $results;
   }
   function numReservation($id)
   {
        $sql = "SELECT COUNT(idBooking) FROM `booking` WHERE idTrip=$id;";
         $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
          $results = $stmt->fetch();
        return $results;
   }
     function updatePlaces($id,$num)
   {
        $sql = "UPDATE `train` join trip on train.idTrain=trip.idTrain SET `NbSeat` = '$num' WHERE `trip`.`idTrip` = $id;";
         $stmt=$this->connect()->prepare($sql);
        $stmt->execute();
          $results = $stmt->fetch();
        return $results;
   }
      function numPlaces($id)
   {
        $sql = "SELECT train.NbSeat FROM `train` join trip ON train.idTrain=trip.idTrain WHERE trip.idTrip=$id;";
         $stmt=$this->connect()->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetch();
        return $results;
   }
      public function cancelReserv($id)
    {
        $sql="UPDATE `booking` SET `state` = '0' WHERE `booking`.`idBooking` = '$id';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
    public function getDate($id)
    {
      $sql = "SELECT trip.dateDepart FROM `trip` join booking on booking.idTrip=trip.idTrip where booking.idBooking=$id;";
         $stmt=$this->connect()->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetch();
        return $results;
    }
    public function getIdTrip($id)
    {
        $sql = "SELECT booking.idTrip FROM `booking` join trip on booking.idTrip = trip.idTrip where booking.idBooking=$id;";
         $stmt=$this->connect()->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetch();
        return $results;
    }
     public function getIdBooking($id)
    {
        $sql = "SELECT booking.idBooking FROM `booking` join trip on booking.idTrip = trip.idTrip where trip.idTrip=$id;";
         $stmt=$this->connect()->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetch();
        return $results;
    }
}