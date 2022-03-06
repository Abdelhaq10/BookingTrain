<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    // session_start();
    define('CSS_PATH', 'http://localhost/TripReservation/Packages/styles/');
    define('IMG_PATH', 'http://localhost/TripReservation/Packages/Images/');
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DoraExpress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/521340319f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../Packages/styles/style.css"> -->
     <link rel="stylesheet" href="<?=CSS_PATH?>style.css">
      <!-- <link rel="stylesheet" href="<?=CSS_PATH?>bookingStyle.css"> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom ">
            <div class="container-fluid"> <a class="navbar-brand" href="#">Dora Express</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a class="nav-link" aria-current="page" href="http://localhost/TripReservation/Booking/index"><i class="fa-solid fa-house"></i> Home </a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/trips"><i class="fa-solid fa-calendar-plus"></i> Trips</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/contact"><i class="fa-solid fa-plus"></i> Trains</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/reservation"><i class="fa-solid fa-users"></i> Clients</a> </li>
                        <li class="nav-item active"> <a class="nav-link btn-link" href="http://localhost/TripReservation/Booking/Logout">Log Out</a> </li>
                
                    </ul>
                </div>
            </div>
        </nav>
    
</body>
</html>