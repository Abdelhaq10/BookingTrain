<?php
class BookingController
{
    	public function __construct()
	{
		
	}

	public function index()
	{
		require_once __DIR__."/../view/index.php";
	}

	public function createTrip()
	{
		require_once __DIR__."/../view/trips.php";
	}

	public function save()
	{
	
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

}