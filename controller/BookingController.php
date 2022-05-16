<?php
require_once __DIR__."/../model/booking.php";
require_once __DIR__."/../model/authentefication.php";
require_once __DIR__."/../model/manage.php";

//phpMailer
require __DIR__.'/../Packages/includes/PHPMailer.php';
require __DIR__.'/../Packages/includes/SMTP.php';
require __DIR__.'/../Packages/includes/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();
class BookingController
{
    	public function __construct()
	{
		if(isset($_SESSION['idUser']))

		{$reservation = new operation();
		$_SESSION['reserve'] = $reservation->getClientReservation($_SESSION['idUser']);}
		// require_once __DIR__."/../view/index.php";
		// require_once __DIR__."/../view/reservation.php";
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
		// require_once __DIR__."/../view/contact.php";
	}
	public function createTrip()
	{
		$manage = new Manage();
		$trains=booking::selectTrain();
		require_once __DIR__."/../view/addTrip.php";
	}
	public function addTrip()
	{
		$manage = new Manage();
		$dateD =$_POST['start-date'];
		$dateA =$_POST['end-date'];
		$departure = strtolower($_POST['depart']);
		$arrival = strtolower($_POST['arrive']);
		$idTrain = $_POST['idtrain'];
		$price = $_POST['price'];
		$manage->addTrip($dateD,$dateA,$departure,$arrival,$idTrain,$price);
		$_SESSION['added'] = "Trip Created Successfully !!!";
		header("Location: http://localhost/TripReservation/booking/createTrip");
	}

	public function reservation()
	{
		
		$trains=booking::selectTrain();
		$trips=booking::selectTrip();
		$depart = booking::departure();
		$arrive = booking::arrival();
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
			$cancelTrips = $manage->CancelAllReservation($idTrip);
			$refresh = $manage->refrechPlaces($idTrip);
			$_SESSION['cancel'] = "Sorry This Trip Has been Canceled By Admin !!!";
			header("Location: http://localhost/TripReservation/booking/trips");
	}
	public function active($idTrip)
	{
			$manage = new Manage();
			$_SESSION['active']="Activated";
			$active=$manage->active($idTrip);
			header("Location: http://localhost/TripReservation/booking/trips");
	}

	public function success()
	{
		require_once __DIR__."/../Packages/SuccesMssgs/addedsuccess.php";
	}
	public function reserved()
	{
		require_once __DIR__."/../Packages/Errors/noSeats.php";
	}
	public function canceled()
	{
		require_once __DIR__."/../Packages/SuccesMssgs/Canceled.php";
	}
	public function cancelError()
	{
		require_once __DIR__."/../Packages/Errors/CancelErr.php";
	}
	public function bookingTrip($idTrip)
	{
		
		$selectedTrip=booking::selectedTrip($idTrip);
		
		// print_r($selectedTrip);	
	
		require_once __DIR__."/../view/tripBooking.php";
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
			  $_SESSION['Adresse'] = $isLogged['Adresse'];
			  $_SESSION['Fname'] = $isLogged['Fname'];
			 $_SESSION['Lname'] = $isLogged['Lname'];
			   $_SESSION['phone'] = $isLogged['phone'];
     		//  require_once __DIR__."/../view/index.php";
			  	header("Location: http://localhost/TripReservation/booking/index");
          } else {
            $_SESSION['loginErr'] = 'Email or password is invalid';
			header("Location: http://localhost/TripReservation/booking/loginPage");
          }
        } else {
          // Load view with errors
		  	$emailError="smthng is wrong";
			header("Location: http://localhost/TripReservation/booking/loginPage");
        }
	 	} 
		 else {
        // Load view
			$emailError="smthng is wrong";
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
			print($password);
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
			 $_SESSION['idAdmin'] = $isLogged['idAdmin'];
     		 $_SESSION['email'] = $isLogged['email'];
     		 $_SESSION['pass'] = $isLogged['pass'];
			header("Location: http://localhost/TripReservation/booking/dashboard");
    
          } else {
               $_SESSION['loginErrAd'] = 'Email or password is invalid';
           
			header("Location: http://localhost/TripReservation/Booking/loginAdminPage");
          }
        } else {
	
          header("Location: http://localhost/TripReservation/Booking/loginAdminPage");
        }


      } else {
        // Load view
		$emailError="smthng is wrong";
        header("Location: http://localhost/TripReservation/Booking/loginAdminPage");
      }
    }





	// Send information of trip 
	// public function information($idTrip,$name,$lname,$email,$phone,$dateD,$adresse)
	public function information($idT,$fname,$lname,$tel,$adresse,$email,$date)
	{
			$body="Thank you for your reservation at DoraExpress. Your reservation is confirmed with the following info :
				Code : $idT
				Name: $fname $lname.
				Email: '.$email.'
				Phone Number: $tel .
				Dates:  $date .
				Address: $adresse .
				I will contact you 24 hours prior to checkin to coordinate key pickup and to provide more info. Thanks again and have a good trip!";
			$mail= new PHPMailer();
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPAuth= "true";
			//$mail->SMTPSecure = "tls";
			$mail->port="465";
			$mail->Username = "paymenttest1900@gmail.com";
			$mail->Password = "abdelhaq1999";
			// $mail->Subject = "test test allah allah";
			$mail->Subject ="Your reservation at $date";
			$mail->setFrom("paymenttest1900@gmail.com");
			$mail->Body = "$body";
			$mail->addAddress("$email");//sent To
			$mail->Send() ;
			$mail->smtpClose();
}


	public function reserve()
	{	
		$operator = new operation();
		
		
		$idT=$_POST['idTrip'];
		$price=$_POST['price'];
		$date=date("Y/m/d");
	//    echo $_SESSION['idUser'];
		$countRes = $operator->numReservation($idT);
		$numPlaces = $operator->numPlaces($idT);
		$reserveCli=new Authentification();
		// $isEmpty = $numPlaces['NbSeat'] - $countRes['COUNT(idBooking)'];
		if(isset($_SESSION['idClient']))
		{
			if($numPlaces['NbSeat'] > 0)
			{
				$num=$numPlaces['NbSeat'] - 1;
				$reserveCli->reserveByClient($idT,$price,$_SESSION['idUser']);
				
					$this->information($idT,$_SESSION['Fname'],$_SESSION['Lname'],$_SESSION['phone'],$_SESSION['Adresse'],$_SESSION['email'],$date);
					$operator->updatePlaces($idT,$num);
					if(isset($_SESSION['tripCanceled']))
					{unset($_SESSION['tripCanceled']); } 
					require_once __DIR__."/../Packages/SuccesMssgs/addedsuccess.php";
				
			}
			else{
				require_once __DIR__."/../Packages/Errors/noSeats.php";
			}
			
		}
		else{
				$fname=$_POST['fname'];
				$lname=$_POST['lname'];
				$adresse=$_POST['adresse'];
				$tel=$_POST['tel'];
				$email=$_POST['email'];
				if($numPlaces['NbSeat'] > 0)
				{
					$num=$numPlaces['NbSeat'] - 1;
					$booking=new booking($idT,$price,$fname,$lname,$adresse,$email,$tel);
					$booking->reserve();
					$message ="added succesfully";
					$this->information($idT,$fname,$lname,$tel,$adresse,$email,$date);
					$operator->updatePlaces($idT,$num);
					if(isset($_SESSION['tripCanceled']))
					{unset($_SESSION['tripCanceled']); }
					header("Location: http://localhost/TripReservation/booking/success");
				}
				else{
						header("Location: http://localhost/TripReservation/booking/reserved");
					}
			}
		
	}
public function cancelReservation($id)
	{		$operator = new operation();
			$dateD = $operator->getDate($id);
			$dep = $dateD["dateDepart"];
			$idT = $operator->getIdTrip($id);
			$day = strtotime($dep);
            $time =  $day - strtotime('now') + 60 * 60;
			echo $day-strtotime('now') . " " . $idT["idTrip"] . " " . $id;
			$manage = new Manage();
			if($time > 1)
			{
			$cancel=$operator->cancelReserv($id);
			$numPlaces = $operator->numPlaces($idT["idTrip"]);
			$num=$numPlaces['NbSeat'] + 1;
			$operator->updatePlaces($idT["idTrip"],$num);
			header("Location: http://localhost/TripReservation/booking/canceled");
			}
			else{
				header("Location: http://localhost/TripReservation/booking/CancelError");
			}
	}





	public function Logout()
	{
		 unset($_SESSION['idClient']);
     	 unset($_SESSION['email']);
     	 unset($_SESSION['password']);
		 unset($_SESSION['idUser']);
		 session_unset();
      	 session_destroy();
		   $this->index();
	}	
}