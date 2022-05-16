 <?php
 require_once "includes/adminNav.php"; ?>
  <link rel="stylesheet" href="<?=CSS_PATH?>bookingStyle.css">
 <div class="container">
            <div class="row">
                <div class="booking-form">
                  <?php if(isset($_SESSION['added'])) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
         <?php echo $_SESSION['added'].".";
                 unset($_SESSION['added']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        <?php endif ; ?>
                    <div class="form-header">
                        <h1>Make your reservation</h1>
                      <?php  
                     
                    
                                

                      //Array ( [idTrip] => 1 [dateDepart] => 2022-02-02 20:15:04 
                     // [dateArrive] => 2022-02-17 20:15:04 [departure] => Safi [arrival] => Fes [idTrain] => 3 [prix] => 120 [status] => 1 )
                      ?>
                    </div>
                    <form action="http://localhost/TripReservation/Booking/addTrip" method="POST">
                        <div class="form-group">
                              <div class="row">
                                 <div class="col-md-6">
                
                                <div class="form-group">
                                  <select id="stationAri" name="idtrain" class="form-control">
                                            <?php foreach($trains as $train) : ?>
                                               <option value="<?= $train['idTrain'] ?>"><?= $train['idTrain'] ?></option>
                                             <?php endforeach ; ?>
                                    </select>
                                 </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group"> <input name="depart" class="form-control" type="text" placeholder="Departure Destination..." minlength="3" required> <span class="form-label">Departure Destination</span> </div>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" name="arrive" type="text"  placeholder="Arrival Destination..." minlength="3" required > <span class="form-label">Arrival Destination</span> 
                                </div>
                              </div>
                         </div>
                        <div class="row">
                            <div class="col-md-6">
                              <div class="form-group"> <input class="form-control" name="start-date" type="datetime-local" placeholder="Departure"   required> <span class="form-label">Departure Destination</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" name="end-date" type="datetime-local" placeholder="Arrival"  required> <span class="form-label">Arrival Destination</span> </div>
                            </div>
                        </div>
 

                         <div class="form-group">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">  <input class="form-control" type="text" name="price" placeholder="Price...." minlength="1" required> <span class="form-label">Price</span> </div>
                                </div>
                            
                         </div>
                         



                             


                        <div class="form-btn"> <button class="submit-btn">Book Now</button> </div>
                    </form>
                </div>
                <script>
                    var today = new Date().toISOString().slice(0, 16);
                  var tomorrow = new Date().toISOString().slice(0, 16);
                      document.getElementsByName("start-date")[0].min = today;
                  document.getElementsByName("end-date")[0].min = tomorrow;

                </script>
            </div>
        </div>