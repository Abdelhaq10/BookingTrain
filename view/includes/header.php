<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
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
    <!-- <link rel="stylesheet" href="../Packages/styles/style.css"> -->
     <link rel="stylesheet" href="<?=CSS_PATH?>style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light border-bottom ">
            <div class="container-fluid"> <a class="navbar-brand" href="#">Dora Express</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
                <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"> <a class="nav-link" aria-current="page" href="http://localhost/TripReservation/Booking/index">Home</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/about">About</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/contact">Contact</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="http://localhost/TripReservation/Booking/reservation">Reservation</a> </li>
                        <li class="nav-item">  
                            <button type="button" class="btn nav-link" data-toggle="modal" data-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                </svg>&nbsp;&nbsp;Cart
                            </button> 
                        </li>
                        
                        <li class="nav-item active"> <a class="nav-link btn-link" href="http://localhost/TripReservation/Booking/login">Login</a> </li>
                    </ul>
                </div>
            </div>
        </nav>
    
</body>
</html>