
<?php  require_once "view/includes/header.php"; ?> 
<link rel="stylesheet" href="<?=CSS_PATH?>SIGNUP.css">

<div class="container d-flex justify-content-center" id="container">
<div class="card">
    <form action="http://localhost/TripReservation/Booking/signUp" method="POST">
        <div class="text-left"> 
            <H2>DoraExpress</H2><br> 
        </div>
        <div>
            <div class="d-flex justify-content-around">
                <div class="inputbox">
                    <span>First Name</span> <input type="text" name="fname" class="form-control" required="required">
                </div>
                <div class="inputbox">
                    <span>Last Name</span> <input type="text" name="lname" class="form-control" required="required">
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div class="inputbox">
                    <span>Adresse</span> <input type="text" name="adresse" class="form-control" required="required"> 
                </div>
                <div class="inputbox">
                    <span>Phone</span> <input type="tel" name="tel" class="form-control" required="required"> 
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <div class="inputbox">
                    <span>Email</span> <input type="email" name="email" class="form-control" required="required"> <span></span>
                </div>
                
                <div class="inputbox">
                    <span>Password</span>
                    <input type="password" name="password" class="form-control" required="required"><span></span>
                </div>
            </div>
        </div>
        <div class="mt-2 proceed">
            <button class="btn btn-primary btn-block"> Signin </button>
        </div>
    </form>
</div>
</div>