<?php
require_once __DIR__."/../model/operation.php";
class booking extends operation{
 

    public static function selectTrain()
    {
        $oper=new operation();
        return $oper->getTrains();
    }
    public static function selectTrip()
    {

        $oper=new operation();
        return $oper->getSpecifedTrip();
    }
}