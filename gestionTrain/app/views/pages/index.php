<?php 
    require APPROOT.'/views/includes/head.php' ;
?>

<header class="container-fluid bg-light">
    <?php require APPROOT .'/views/includes/navbar.php' ?>
</header>
<section class="bg-light text-left banner-home">
    <div class="container-xl">
        <div class="d-flex justify-content-around align-items-center">
            <div class="hyper-text">
                <h1>EXPLORE</h1>
                <h2>YOUR TRIP WITH TRAIN</h2>
                <h6>Let's Begin your Journey</h6>
                <button>
                    Book A Trip
                </button>
            </div>
            <img src="<?php echo URLROOT; ?>/public/images/banne-img.png" alt="">
        </div>
    </div>
</section>

<?php 
    require APPROOT.'/views/includes/footer.php' ;
?>