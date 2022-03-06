<?php
 require_once "includes/adminNav.php"; ?>



<div class="container rounded mt-5 bg-white p-md-5" >
     <div class="row mx-0 mt-2 box">
            <div class="col-md-4 p-0 border-end">
                <div class="viewbox">
                    <p class="blue"><?=$nbBooking ?></p>
                    <p>Number Of Reservation</p>
                </div>
            </div>
            <div class="col-md-4 p-0 border-end">
                <div class="viewbox">
                    <p class="blue"><?=$nbClient ?></p>
                    <p>Number Of Clients</p>
                </div>
            </div>
            <div class="col-md-4 p-0">
                <div class="viewbox">
                    <p class="blue"><?=$nbTrips ?></p>
                    <p>Number Of Trips</p>
                </div>
            </div>
        </div>
    <div class="h2 font-weight-bold pad">List Reservations</div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Departure Date/Station</th>
                    <th scope="col">Arrival Date/Station</th>
                    <th scope="col">Price</th>
                    <th scope="col">Person(s)</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
        <?php foreach($listTrips as $trip) : ?>
                <tr class="bg-blue">
                    <td class="pt-3 mt-1"><?=$trip['dateDepart']?><br> <?=$trip['departure'] ?></td>
                    <td class="pt-3"><?=$trip['dateArrive']?><br> <?=$trip['arrival'] ?></td>
                    <td class="pt-3"><?=$trip['payment']?></span></td>
                    <td class="pt-3"><?=$trip['Nperson']?></span></td>
                    <td class="pt-3"><?=$trip['Fname']?> <?=$trip['Lname']?></span></td>
                    <td class="pt-3"><?=$trip['email']?></span></td>
                    <?php if($trip['status']==1) :?>
                     <td class="pt-3"><span class="fa fa-check pl-3"></span></td>
                     <?php elseif($trip['status']==0) : ?>
                    <td class="pt-3"><i class="fa-solid fa-ban pl-3"></i></span></td>
                    <?php endif; ?>
                    <td class="pt-3"><button class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button></span></td>
                    <td class="pt-3"><button class="btn btn-danger"><i class="fa-solid fa-ban"></i></button></span></td>
                </tr> 
                <tr id="spacing-row">
                    <td></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
