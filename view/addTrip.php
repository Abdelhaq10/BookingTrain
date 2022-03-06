 <?php
 require_once "includes/adminNav.php"; ?>
  <link rel="stylesheet" href="<?=CSS_PATH?>bookingStyle.css">
 <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Make your reservation</h1>
                      <?php  
                     
                    //   print_r($selectedTrip);
                    //   $var = $selectedTrip;
                    //   print_r($var); 
                      

                      //Array ( [idTrip] => 1 [dateDepart] => 2022-02-02 20:15:04 
                     // [dateArrive] => 2022-02-17 20:15:04 [departure] => Safi [arrival] => Fes [idTrain] => 3 [prix] => 120 [status] => 1 )
                      ?>
                    </div>
                    <form action="http://localhost/TripReservation/Booking/reserve" method="POST">
                        <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                  
                                <div class="form-group">    <input class="form-control" type="text" placeholder="Departure Destination..."  onlyread> <span class="form-label">Departure Destination</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" type="text"  placeholder="Arrival Destination..."  > <span class="form-label">Arrival Destination</span> 
                                </div>
                              </div>
                         </div>


                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group"> <input class="form-control" name="end-date" type="datetime-local"  required> <span class="form-label">Departure Destination</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" name="start-date" type="datetime-local"  required> <span class="form-label">Arrival Destination</span> </div>
                            </div>
                        </div>
 

                         <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">  <input class="form-control" type="text" name="price" placeholder="Price...." > <span class="form-label">Price</span> </div>
                                </div>
                                <div class="col-md-6">
                                   <div class="form-group"> <input class="form-control" type="number" name="nbperson" placeholder="number of place" value="1"> <span class="form-label">Places</span> </div>
                                </div>
                         </div>
                         



                             


                        <div class="form-btn"> <button class="submit-btn">Book Now</button> </div>
                    </form>
                </div>
            </div>
        </div>