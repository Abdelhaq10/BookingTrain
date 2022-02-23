<?php
require_once __DIR__."/../model/booking.php";
require_once __DIR__."/../model/authentefication.php";
session_start();
class BookingController
{
    	public function __construct()
	{
		
	}

	public function index()
	{
		require_once __DIR__."/../view/index.php";
	}
	public function about()
	{
		require_once __DIR__."/../view/about.php";
	}
	public function createTrip()
	{
		require_once __DIR__."/../view/trips.php";
	}

	public function save()
	{
	
	}
	public function reservation()
	{
		$message ="";
		$trains=booking::selectTrain();
		$trips=booking::selectTrip();
		require_once __DIR__."/../view/reservation.php";
	}
	// 	public function trip()
	// {
	// 	require_once __DIR__."/../view/trips.php";
	// }
	// public function findTrip()
	// {
	// 	$dateD=$_POST['start-date'];
	// 	$dateA=$_POST['end-date'];
	// 	$stationD=$_POST['stationDep'];
	// 	$stationA=$_POST['stationAri'];
	// 	$trips=new booking($dateD,$dateA,$stationD,$stationA);
	// 	$trips->selectTrip();
		
	// 	header("Location: http://localhost/TripReservation/booking/trip");
	// }
	public function editTrip()
	{
	    echo "getting the trip with the exact id";
	}

	public function updateTrip()
	{
		echo "update Page";
	}
	public function cancelTrip()
	{
		echo "cancel function";
	}
	public function bookingTrip($idTrip)
	{
		
		$selectedTrip=booking::selectedTrip($idTrip);
		
		// print_r($selectedTrip);	
	
		require_once __DIR__."/../view/tripBooking.php";
	}
	public function reserve()
	{	
		
		$idT=$_POST['idTrip'];
		$nbPerson=$_POST['nbperson'];
		$price=$_POST['price'];
		
	//    echo $_SESSION['idUser'];
		$reserveCli=new Authentification();
		if(isset($_SESSION['idClient']))
		{
			$reserveCli->reserveByClient($idT,$nbPerson,$price,$_SESSION['idUser']);
			$this->reservation();
			
		}
		else{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$adresse=$_POST['adresse'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			 $booking=new booking($idT,$nbPerson,$price,$fname,$lname,$adresse,$email,$tel);
			$booking->reserve();
		//	$this->reservation()->message ="added succesfully";
			$this->reservation();
			
		}
		
		// require_once __DIR__."/../view/reservation.php";
	}
	public function loginPage()
	{
		require_once __DIR__."/../view/client/login.php";
	}
	public function signupPage()
	{
		require_once __DIR__."/../view/client/signup.php";
	}

	//Authentification
	//signUp
	public function signUp()
	{
			
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		
		{
			$signup=new Authentification();
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
			$emailError='';
			$passError='';
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$adresse=$_POST['adresse'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			// $ques=$signup->signup($fname,$lname,$adresse,$email,$tel,$password);
			// echo "is it :    " . $ques ;
				if(empty($email))
				{
          			$emailError = 'Pleae enter email';
        		} 
				if($signup->clientAlreadyExist($email))
				{
          			$emailError = 'Email is already exist';
        		} 
				if(empty($password))
				{
					$passError="please enter password";
				}
				if(empty($emailError) && empty($passError))
				{
					$password=password_hash($password, PASSWORD_DEFAULT);
					
					$test=$signup->signup($fname,$lname,$adresse,$email,$tel,$password);
				
					if($test)	
					{		
						 require_once __DIR__."/../view/client/login.php";
					}
					else{

						
						die('something went wrong');
					}
				}else
				{	
						$emailError;
						$passError;
						require_once __DIR__."/../view/client/signup.php";
				}
			
	    }
	}




	//login
	 public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
			$signup=new Authentification();
			$emailError='';
			$passError='';
			$email=$_POST['email'];
			$password=$_POST['pass'];
        // Validate Email
        if(empty($email)){
          $data['email_err'] = 'Pleae enter email';
        }

        // Validate Password
        if(empty($password)){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        // if($use->findUserByEmail($data['email'])){
          // User found
        // } else {
          // User not found
        //   $data['email_err'] = 'No user found';
        // }

        // Make sure errors are empty
        if(!empty($email) && !empty($password)){
          // Validated
          // Check and set logged in user
          $isLogged = $signup->login($email,$password);

          if($isLogged){
            // Create Session
				// session_start();
            // $this->createUserSession($isLogged);
			 $_SESSION['idClient'] = $isLogged['idClient'];
			//  echo $_SESSION['idClient'];
     		 $_SESSION['email'] = $isLogged['email'];
     		 $_SESSION['password'] = $isLogged['pass'];
			  $_SESSION['idUser'] = $isLogged['idUser'];
     		 require_once __DIR__."/../view/index.php";
          } else {
            $passError = 'Password incorrect';

            require_once __DIR__."/../view/client/login.php";
          }
        } else {
          // Load view with errors
          require_once __DIR__."/../view/client/login.php";
        }


      } else {
        // Load view
        require_once __DIR__."/../view/client/login.php";
      }
    }
	public function Logout()
	{
		 unset($_SESSION['idClient']);
     	 unset($_SESSION['email']);
     	 unset($_SESSION['password']);
		 unset($_SESSION['idUser']);
      	 session_destroy();
		   $this->index();
	}	
}