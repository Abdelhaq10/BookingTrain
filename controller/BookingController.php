<?php
require_once __DIR__."/../model/booking.php";
require_once __DIR__."/../model/authentefication.php";
require_once __DIR__."/../model/manage.php";
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
	public function contact()
	{
		require_once __DIR__."/../view/contact.php";
	}
	public function createTrip()
	{
		require_once __DIR__."/../view/addTrip.php";
	}

	public function addTrip()
	{
	
	}
	public function reservation()
	{
		
		$trains=booking::selectTrain();
		$trips=booking::selectTrip();
		require_once __DIR__."/../view/reservation.php";
	}
		public function trips()
	{
		$manage = new Manage();
		$tripsList = $manage->getTrips();
		require_once __DIR__."/../view/trips.php";
	}
	public function cancel($idTrip)
	{
			$manage = new Manage();
			$cancel=$manage->cancel($idTrip);
			$_SESSION['mssg']="Canceled";
			header("Location: http://localhost/TripReservation/booking/trips");
	}
	public function active($idTrip)
	{
			$manage = new Manage();
			$_SESSION['active']="Activated";
			$active=$manage->active($idTrip);
			header("Location: http://localhost/TripReservation/booking/trips");
	}
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
			require_once __DIR__."/../Packages/SuccesMssgs/addedsuccess.php";
			
		}
		else{
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$adresse=$_POST['adresse'];
			$tel=$_POST['tel'];
			$email=$_POST['email'];
			 $booking=new booking($idT,$nbPerson,$price,$fname,$lname,$adresse,$email,$tel);
			$booking->reserve();
			$message ="added succesfully";
			require_once __DIR__."/../Packages/SuccesMssgs/addedsuccess.php";$this->reservation();
			
		}
		
	}
	public function loginPage()
	{
		$Error='';
		require_once __DIR__."/../view/client/login.php";
	}
	public function loginAdminPage()
	{
		$Error='';
		require_once __DIR__."/../view/admin/login.php";
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
          $emailError = 'Pleae enter email';
        }

        // Validate Password
        if(empty($password)){
          $passError = 'Please enter password';
        }
        if(!empty($email) && !empty($password)){
          $isLogged = $signup->login($email,$password);

          if($isLogged){
           
			 $_SESSION['idClient'] = $isLogged['idClient'];
			//  echo $_SESSION['idClient'];
     		 $_SESSION['email'] = $isLogged['email'];
     		 $_SESSION['password'] = $isLogged['pass'];
			  $_SESSION['idUser'] = $isLogged['idUser'];
     		//  require_once __DIR__."/../view/index.php";
			  	header("Location: http://localhost/TripReservation/booking/index");
          } else {
            $Error = 'Email or password is invalid';

            // require_once __DIR__."/../view/client/login.php";
				header("Location: http://localhost/TripReservation/booking/loginClientPage");
          }
        } else {
          // Load view with errors
		  $emailError="smthng is wrong";
        //   require_once __DIR__."/../view/client/login.php";
			header("Location: http://localhost/TripReservation/booking/loginClientPage");
        }


      } else {
        // Load view
		$emailError="smthng is wrong";
        // require_once __DIR__."/../view/client/login.php";
			header("Location: http://localhost/TripReservation/booking/loginClientPage");
      }
    }

	public function dashboard()
	{
		if(isset($_SESSION['idAdmin']))
	{	
		$manage=new Manage();
		$listTrips=$manage->getReservation();
		$nbTrips=$manage->countTrips()['COUNT(*)'];
		$nbBooking=$manage->countReservation()['COUNT(*)'];
		$nbClient=$manage->countClients()['COUNT(*)'];
		require_once __DIR__."/../view/manage.php";
			
	}
		else{
			
			header("Location: http://localhost/TripReservation/booking/loginAdminPage");
		}
	}


	 public function Admin(){
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
         $emailError = 'Pleae enter email';
        }

        // Validate Password
        if(empty($password)){
          $passError = 'Please enter password';
        }
        if(!empty($email) && !empty($password)){
     
          $isLogged = $signup->loginAdmin($email,$password);

          if($isLogged){
            // Create Session
				// session_start();
            // $this->createUserSession($isLogged);
			 $_SESSION['idAdmin'] = $isLogged['idAdmin'];
			//  echo $_SESSION['idClient'];
     		 $_SESSION['email'] = $isLogged['email'];
     		 $_SESSION['pass'] = $isLogged['pass'];
			header("Location: http://localhost/TripReservation/booking/dashboard");
     		//  require_once __DIR__."/../view/manage.php";
          } else {
            $Error = 'Email or password is invalid';
            require_once __DIR__."/../view/admin/login.php";
          }
        } else {
          // Load view with errors
		  $emailError="smthng is wrong";
          require_once __DIR__."/../view/admin/login.php";
        }


      } else {
        // Load view
		$emailError="smthng is wrong";
        require_once __DIR__."/../view/admin/login.php";
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