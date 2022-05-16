 <?php require_once "includes/header.php"; 
        require_once __DIR__."/cart.php";
 ?>


 <div class="row">
    <div class="col-md-6 left-section">
        <h1 >You Are About To Travel ?</h1>
        <p>Here Is a Modern Way Of Booking Train Tickets Through An Online Train Booking Form That Provides You With The Convenience Of Buying Tickets And Checking Seat Availability.</p>
        <a href="http://localhost/TripReservation/Booking/reservation" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Book Now</a>
    </div>
    <div class="col-md-6 center">
        <img class="img-fluid img" src="<?= IMG_PATH?>Station.png" alt="">
    </div>
</div>

        <style>
             /* body {
     background-color: #f9f9fa
 } */

 .container {
     /* margin-top: 100px */
 }

 .modal.fade .modal-bottom,
 .modal.fade .modal-left,
 .modal.fade .modal-right,
 .modal.fade .modal-top {
     position: fixed;
     z-index: 1055;
     top: 0;
     left: 0;
     right: 0;
     bottom: 0;
     margin: 0;
     max-width: 100%;
 }

 .btn-warning {
     color: #fff;
     display: block;
    height: 50px;
  width: 50px;
  
    position: fixed;
    right: 0px;
    border-radius: 50%;
    top: 90%;
    TRANSITION: ALL 0.3s ease-in-out;
    transform: translateY(-50%);
    Z-INDEX: 100;
 }

 .btn-warning:hover {
     color: #fff
 }

 .modal.fade .modal-right {
     left: auto !important;
     transform: translate3d(100%, 0, 0);
     transition: transform .3s cubic-bezier(.25, .8, .25, 1)
 }

 .modal.fade.show .modal-bottom,
 .modal.fade.show .modal-left,
 .modal.fade.show .modal-right,
 .modal.fade.show .modal-top {
     transform: translate3d(0, 0, 0)
 }

 .w-xl {
     width: 320px
 }

 .modal-content,
 .modal-footer,
 .modal-header {
     border: none
 }

 .h-100 {
     height: 100% !important
 }

 .list-group.no-radius .list-group-item {
     border-radius: 0 !important
 }

 .btn-light {
     color: #212529;
     background-color: #f5f5f6;
     border-color: #f5f5f6
 }

 .btn-light:hover {
     color: #212529;
     background-color: #e1e1e4;
     border-color: #dadade
 }

 .modal-footer {
     display: flex;
     align-items: center;
     justify-content: flex-end;
     padding: 1rem;
     border-top: 1px solid rgba(160, 175, 185, .15);
     border-bottom-right-radius: .3rem;
     border-bottom-left-radius: .3rem
 }
        </style>