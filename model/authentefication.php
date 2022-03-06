<?php
require_once __DIR__."/../model/operation.php";



class Authentification extends operation{

public function login($email, $password){
      $query="SELECT * FROM `client` WHERE email = '$email'";
      $logquery =$this->connect()->prepare($query);
      $logquery->execute();
      $result = $logquery->fetch();
      // print_r($result);
      $hashed_password = $result['pass'];
      // echo $result['pass'];
      if(password_verify($password, $hashed_password)){
        return $result;
      } else {
        return false;
      }
    }


    //register funcion
     public function signup($fname,$lname,$adresse,$email,$phone,$password):bool{
         $operation=new operation();
         $operation->insertUser($fname,$lname,$adresse,$email,$phone);
          $last_idUser=$operation->getLastId();
          $iduser= $last_idUser['MAX(idUser)'];
          
        $log="INSERT INTO `client`(`email`, `pass`, `idUser`) VALUES ('$email','$password','$iduser')";
        $queryLog=$this->connect()->prepare($log);
        $test=$queryLog->execute();
        if($test)
          return true;
        return false;
        
    }


    public function clientAlreadyExist($email)
    {
        $sql="SELECT * FROM `client` WHERE email='$email'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetch();
        return $results;
           if($this->connect()->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    //   $this->connect()->query('SELECT * FROM client WHERE `email` = :email');
    //    $this->connect()->bind(':email', $email);

    //    $this->connect()->execute();;
    //     $row=$this->connect()->stmt->fetch();
    //   if($this->connect()->rowCount() > 0){
    //     return true;
    //   } else {
    //     return false;
    //   }
    
    }


    public function loginAdmin($email, $password){
      $query="SELECT * FROM `admin` WHERE email = '$email'";
      $logquery =$this->connect()->prepare($query);
      $logquery->execute();
      $result = $logquery->fetch();
      // print_r($result);
      $hashed_password = $result['pass'];
      // echo $result['pass'];
      if(password_verify($password, $hashed_password)){
        return $result;
      } else {
        return false;
      }
    }

 public function reserveByClient($idTrip,$nbPerson,$price,$iduser)
    {
       $reserveC= new operation();
       $reserveC->addReservationByClient($idTrip,$nbPerson,$price,$iduser);
    }









   
}