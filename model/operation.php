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
}