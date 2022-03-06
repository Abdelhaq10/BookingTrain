<?php
 require_once "includes/adminNav.php"; ?>

    <div class="container rounded mt-5 bg-white p-md-5" >
        <?php if(isset($_SESSION['mssg'])) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Succesfully!</strong> <?php echo $_SESSION['mssg'].".";
                 unset($_SESSION['mssg']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        <?php endif ; ?>
          <?php if(isset($_SESSION['active'])) : ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Succesfully!</strong> <?php echo $_SESSION['active'].".";
                 unset($_SESSION['mssg']); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
         </div>
        <?php endif ; ?>
        <div class="row mx-0 mt-2 box">
             <div class="col-md-12 text-right">
            <a type="button" href="http://localhost/TripReservation/Booking/createTrip" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Trip</a>
        </div>
         <div class="h2 font-weight-bold pad">List Trips</div>
      
         <?php print_r($tripsList) ?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Departure Date/Station</th>
                    <th scope="col">Arrival Date/Station</th>
                    <th scope="col">Price</th>
                    <th scope="col">N° Seats</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
             <tbody>
        <?php foreach($tripsList as $trip) : ?>
                <tr class="bg-blue">
                    <td class="pt-3 mt-1"><?=$trip['dateDepart']?><br> <?=$trip['departure'] ?></td>
                    <td class="pt-3"><?=$trip['dateArrive']?><br> <?=$trip['arrival'] ?></td>
                    <td class="pt-3"><?=$trip['prix']?></span></td>
                    <td class="pt-3"><?=$trip['NbSeat']?></span></td>
                    <?php if($trip['status']==1) :?>
                     <td class="pt-3"><span class="fa fa-check pl-3"></span></td>
                     <?php elseif($trip['status']==0) : ?>
                    <td class="pt-3"><i class="fa-solid fa-ban pl-3"></i></span></td>
                    <?php endif; ?>
                   
                    <td class="pt-3"><a href="" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a></span></td>
                   <?php if($trip['status']==1) :?>
                    <td class="pt-3"><a href="http://localhost/TripReservation/Booking/cancel/<?=$trip['idTrip']?>" class="btn btn-danger"><i class="fa-solid fa-ban"></i></a></span></td>
                   <?php elseif($trip['status']==0) :?>
                    <td class="pt-3"><a href="http://localhost/TripReservation/Booking/active/<?=$trip['idTrip']?>" class="btn btn-success"><span class="fa fa-check"></span></a></span></td>
                  <?php endif; ?>
                </tr> 
                <tr id="spacing-row">
                    <td></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>