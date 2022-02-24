<div class="header2 bg-success-gradiant">
    <div class="">
        <!-- Header 1 code -->
        <nav class="navbar navbar-expand-lg h2-nav"> <a class="navbar-brand" href="#"><?php echo "LOGOO"; ?></a> 
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2" aria-controls="header2" aria-expanded="false" aria-label="Toggle navigation"> 
            <i class="fa fa-list" style="color: white;"></i> 
        </button>  
            <div class="collapse navbar-collapse hover-dropdown" id="header2">
                <ul class="navbar-nav ml-5">
                    <li class="nav-item active mx-5"><a class="nav-link" href="<?php echo URLROOT ;?>/">Home</a></li>
                    <li class="nav-item mx-2"><a class="nav-link" href="<?php echo URLROOT ;?>/pages/booking">Booking</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if(isset($_SESSION['id_client'])): ?>
                        <li class="nav-item active"><a class="btn rounded-pill btn-dark py-2 px-3" href=""><i class="fas fa-user-cog" style="color: white;"></i></a></li>
                        <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-3" href="<?php echo URLROOT ;?>/users/logout"><i class="fas fa-sign-in-alt" style="color: white;"></i></a></li>
                    <?php else: ?>
                        <li class="nav-item active"><a class="btn rounded-pill btn-dark py-2 px-4" href="<?php echo URLROOT ;?>/users/login">Login</a></li>
                        <li class="nav-item"><a class="btn rounded-pill btn-dark py-2 px-4" href="<?php echo URLROOT ;?>/users/register">Sign up</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </nav> <!-- End Header 1 code -->
    </div>
</div>