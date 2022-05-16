<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-sm-6"> <button class="btn btn-warning btn-circle mr-3 d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#modal-left" data-toggle-class="modal-open-aside">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-check-fill" viewBox="0 0 16 16">
                     <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm-1.646-7.646-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L8 8.293l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                </svg>
            </button>
                <div id="modal-left" class="modal fade"  data-backdrop="true">
                    <div class="modal-dialog modal-left w-xl">
                        <div class="modal-content h-100 no-radius">
                            <div class="modal-header">
                                <div class="modal-title text-md">My Reservations</div>
                              
                                 <button class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                            
                            <?php foreach($_SESSION['reserve'] as $res) : ?>
                              <?php if($res['state'] !=0) : ?>  
                                <div class="d-flex px-2 px-md-4 border-bottom">
                                    <div>
                                        <div class="d-flex mb-2">
                                            <input class="form-control" type="hidden" name="dateDepart"  value="<?= $res['dateDepart'] ?>"   required>
                                            <h6 class="mt-1"><?= $res['dateDepart'] ?></h6> 
                                        </div>
                                        <p class="light"><?= $res['payment'] ?> DH </p>
                                        <p>From : <?= $res['departure'] ?> &nbsp;&nbsp;&nbsp;To : <?=$res['arrival'] ?></p>
                                        <a href="http://localhost/TripReservation/Booking/cancelReservation/<?=$res['idBooking']?>" class="d-flex justify-content-end mb3">Cancel</a>
                                    </div>
                                    </div>
                               <?php endif ;?>  
                            <?php endforeach ; ?>
                                <?php if(isset($_SESSION['tripCanceled'])) : ?>
                                            <span>
                                                 <?php echo $_SESSION['tripCanceled'].".";?>
                                            </span>
                                <?php endif ; ?>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
 
</style>