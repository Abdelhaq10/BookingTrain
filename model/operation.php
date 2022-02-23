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
    public function getSpecifedTrip()
    {
        $sql="SELECT trip.idTrip ,trip.dateDepart ,trip.dateArrive ,trip.departure , trip.arrival , trip.prix , trip.status FROM `trip` JOIN train ON (trip.idTrain=train.idTrain);";
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
    public function addReservation($idTrip,$nbPerson,$price,$fname,$lname,$adresse,$email,$phone)
    {
        $payment=$price * $nbPerson;
        $this->insertUser($fname,$lname,$adresse,$email,$phone);
        $last_idUser = $this->getLastId();
        $iduser= $last_idUser['MAX(idUser)'];
      
        $res="INSERT INTO `booking`(`idTrip`, `Nperson`, `payment`, `idUser`) VALUES ('$idTrip','$nbPerson','$payment','$iduser')";
        $queryReserve=$this->connect()->prepare($res);
        $queryReserve->execute();
    }
    public function addReservationByClient($idTrip,$nbPerson,$price,$iduser)
    {
        $payment=$price * $nbPerson;
         $res="INSERT INTO `booking`(`idTrip`, `Nperson`, `payment`, `idUser`) VALUES ('$idTrip','$nbPerson','$payment','$iduser')";
        $queryReserve=$this->connect()->prepare($res);
        $queryReserve->execute();
    }
// authentification

}