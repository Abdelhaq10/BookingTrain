<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="../Packages/styles/style.css"> -->
     <link rel="stylesheet" href="<?=CSS_PATH?>bookingStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="booking-form">
                    <div class="form-header">
                        <h1>Make your reservation</h1>
                    </div>
                    <form>
                        <div class="form-group"> <input class="form-control" type="text" placeholder="Country, ZIP, city..."> <span class="form-label">Destination</span> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check In</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="date" required> <span class="form-label">Check out</span> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of rooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Rooms</span> </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Adults</span> </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group"> <select class="form-control" required>
                                        <option value="" selected hidden>no of children</option>
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                    </select> <span class="select-arrow"></span> <span class="form-label">Children</span> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="email" placeholder="Enter your Email"> <span class="form-label">Email</span> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <input class="form-control" type="tel" placeholder="Enter you Phone"> <span class="form-label">Phone</span> </div>
                            </div>
                        </div>
                        <div class="form-btn"> <button class="submit-btn">Book Now</button> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>