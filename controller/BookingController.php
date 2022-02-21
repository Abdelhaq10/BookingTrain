<?php
require_once __DIR__."/../model/booking.php";
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
	public function bookingTrip()
	{
		require_once __DIR__."/../view/tripBooking.php";
	}
}