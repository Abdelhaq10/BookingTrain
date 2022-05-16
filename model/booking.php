<?php
require_once __DIR__."/../model/operation.php";

class booking extends operation{
 
    // private $nbPerson;
    private $price ;
    private $fname;
    private $lname;
    private $adresse;
    private $email;
    private $phone;
    public function __construct($idTrip,$price,$fname,$lname,$adresse,$email,$phone)
    {   
        $this->idTrip=$idTrip;
        $this->price=$price;
        $this->fname=$fname;
        $this->lname=$lname;
        $this->adresse=$adresse;
        $this->email=$email;
        $this->phone=$phone;
    }
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
    public static function departure()
    {
         $oper=new operation();
        return $oper->getDepart();
    }
     public static function arrival()
    {
         $oper=new operation();
        return $oper->getArrival();
    }
    public static function selectedTrip($idTrip)
    {
        $select=new operation();
		return $select->getTrip($idTrip);
    }
    public function reserve()
    {
        $reserve=new operation();
        $reserve->addReservation($this->idTrip,$this->price,$this->fname,$this->lname,$this->adresse,$this->email,$this->phone);
      
    }
 
}