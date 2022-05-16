<?php  require_once "view/includes/header.php"; ?> 
<link rel="stylesheet" href="<?=CSS_PATH?>login.css">
<div class="container d-flex justify-content-center" id="container">
<div class="card">
    <form action="http://localhost/TripReservation/Booking/login" method="POST">
    <div class="text-left"> 
        <H2>DoraExpress</H2><br> 
         <?php if(isset($_SESSION['loginErr'])) : ?>
        <span><?php echo $_SESSION['loginErr'].".";
                 unset($_SESSION['loginErr']); ?>
            </span> <br>
        <?php endif ; ?>
        <span class="abt">New Here? <a href="http://localhost/TripReservation/Booking/signupPage">Create an account.</a></span> 
    </div>
    <div>
        <div class="inputbox">
             <span>Email</span> <input type="text" name="email" class="form-control" required="required">
        </div>
        <div class="inputbox">
            <div class="d-flex justify-content-between align-items-center"> <span>Password</span>
              </div> <input type="password" name="pass" class="form-control" required="required">
              <a href="http://localhost/TripReservation/Booking/loginAdminPage" class="d-flex justify-content-end">Log as Admin?</a>
        </div>
    </div>
    <div class="mt-2 proceed">
         <button class="btn btn-primary btn-block"> Signin </button>
    </div>
    </form>
</div>
</div>