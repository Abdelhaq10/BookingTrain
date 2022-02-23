<?php
 require_once "includes/header.php"; ?>
     
                                    <!-- Seaching Form for Trip -->

    <div class="container-fluid px-1 px-sm-4 py-5 mx-auto">
    <form  method="POST">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-9 col-xl-8">
                <div class="card border-0">
                    <div class="card text-center">
                        <div class="card-header">Schedule Your Trip</div>
                        <?= $message ?>
                        <div class="card-body">
                            <div class="row px-4">
                                <div class="col-md-6 pl-0 pr-0 pr-md-2 mb-2"> 
                                    <input type="datetime-local" name="start-date" id="start"  required> 
                                </div>
                                <div class="col-md-6 pl-0 pl-md-2 pr-0"> 
                                    <input type="datetime-local" name="end-date" id="end" required> 
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row px-4 mb-2">
                        <div class="card-body">

                            <div class="row px-4">
                                <div class="col-md-6 pl-0 pr-0 pr-md-2 mb-2"> 
                                        <select name="stationDep" class="form-control">
                                                <option selected disabled>Station Depart</option>
                                                <?php foreach($trains as $train) : ?>
                                                <option value="<?= $train['departureStation'] ?>"><?= $train['departureStation'] ?></option>
                                                <?php endforeach ?>
                                        </select>
                                </div>
                                <div class="col-md-6 pl-0 pl-md-2 pr-0"> 
                                     <select name="stationAri" class="form-control">
                                                <option selected disabled>Station D'arrive</option>
                                                 <?php foreach($trains as $train) : ?>
                                                <option value="<?= $train['arrivalStation'] ?>"><?= $train['arrivalStation'] ?></option>
                                                <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-footer d-flex justify-content-end text-muted">
                            <button class="btn btn-success ml-auto" id="searchbtn"><span class="fa fa-search"></span> &nbsp;&nbsp;Search</button>
                    </div>
         </div>
        </div>
    </form>
    </div>


                                <!-- Trips List -->
    
    <div class="container rounded mt-5 bg-white p-md-5" id="listTrip">
    <div class="h2 font-weight-bold">Trips List</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Departure Date/Station</th>
                    <th scope="col">Arrival Date/Station</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</div>

<script src="../Packages/scripts/script.js"></script>
<script>
     const trips = JSON.parse('<?php echo json_encode($trips); ?>');
     console.log(trips);
     var search=document.querySelector("#searchbtn");
     const dateDep=document.querySelector("#start");
     const dateArr=document.querySelector("#end");
     search.addEventListener("click", ()=>
     {
         var dateD=dateDep.value;
         dateD = dateD.substring(0,10)+" "+dateD.substring(11,16);
          console.log(dateD);
          var t=trips.filter(tr=>tr.dateDepart.substring(0,10)+" "+tr.dateDepart.substring(11,16) === dateD );
             listTrips(t);
           console.log(t);
     });
</script>