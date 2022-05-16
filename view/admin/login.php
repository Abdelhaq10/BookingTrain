<?php  require_once "view/includes/header.php"; ?> 
<link rel="stylesheet" href="<?=CSS_PATH?>login.css">
<div class="container d-flex justify-content-center" id="container">
<div class="card">
    <form action="http://localhost/TripReservation/Booking/Admin" method="POST">
    <div class="text-left"> 
        <H2>DoraExpress</H2><br> 
          <?php if(isset($_SESSION['loginErrAd'])) : ?>
        <span><?php echo $_SESSION['loginErrAd'].".";
                 unset($_SESSION['loginErrAd']); ?>
            </span>
        
        
        <?php endif ; ?>
    </div>
    <div>
        <div class="inputbox">
             <span>Email</span> <input type="email" name="email" class="form-control" required="required"> 
        </div>
        <div class="inputbox">
            <div class="d-flex justify-content-between align-items-center"> <span>Password</span>
              </div> <input type="password" name="pass" class="form-control" required="required">
              <a href="http://localhost/TripReservation/Booking/loginPage" class="d-flex justify-content-end">Log as Client?</a>
        </div>
    </div>
    <div class="mt-2 proceed">
         <button class="btn btn-primary btn-block"> Signin </button>
    </div>
    </form>
</div>
</div>