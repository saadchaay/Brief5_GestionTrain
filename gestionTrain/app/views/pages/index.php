<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>

<section class="home-sec">
    <div class="container">
        <div class="d-flex justify-content-center content flex-column">
            <h2 class="text-left my-3">WELCOME TO BOOK YOUR TRAIN</h2>
            <h5 class="text-left mt-1 mb-4">We saves your time both while purchasing <br> the check-in and during the travel.</h5>
            <button onclick="window.location.href='<?php echo URLROOT; ?>/pages/booking';" class="btn my-3">Book Now</button>
        </div>
    </div>
</section>

<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>