<?php
require_once __DIR__."/../model/operation.php";



class Manage extends operation
{
    public function getTrips()
    {
        $sql="SELECT * FROM `trip` join train on trip.idTrain = train.idTrain;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
      public function getReservation()
    {
        $sql="SELECT trip.dateDepart,trip.dateArrive,trip.departure,trip.arrival,trip.status,booking.Nperson,booking.payment,user.Fname,user.Lname,user.email FROM `booking` join trip on booking.idTrip=trip.idTrip join user on booking.idUser=user.idUser;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
    public function countTrips()
    {
        $sql="SELECT COUNT(*) FROM trip;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }
     public function countReservation()
    {
        $sql="SELECT COUNT(*) FROM booking;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }
      public function countClients()
    {
        $sql="SELECT COUNT(*) FROM client;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
    }
    public function cancel($idTrip)
    {
        $sql="UPDATE `trip` SET `status` = '0' WHERE `trip`.`idTrip` = '$idTrip';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
      public function active($idTrip)
    {
        $sql="UPDATE `trip` SET `status` = '1' WHERE `trip`.`idTrip` = '$idTrip';";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
    public function addTrip($dateD,$dateA,$departure,$arrival,$idTrain,$price)
    {
        $sql="INSERT INTO `trip`(`dateDepart`, `dateArrive`, `departure`, `arrival`, `idTrain`, `prix`, `status`) VALUES ('$dateD','$dateA','$departure','$arrival','$idTrain','$price','1')";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}