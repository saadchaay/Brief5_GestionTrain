<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>

<section class="">
    <div class="container d-flex justify-content-center">
        <form action="<?php echo URLROOT; ?>/users/login" method="post">
            <div class="row my-5">
                <h2 class="heading mb-4">Login</h2>
                <div class="col-md-12 rcol">
                    <div class="form-group fone mt-4"> 
                        <i class="fas fa-envelope pl-3"></i> 
                        <input name="username" type="text" class="form-control" placeholder="Username">  
                    </div>
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-lock pl-3"></i> 
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <div id="alert-failed" class="alert alert-danger my-2" role="alert">
                            <?php echo $data["Errors"]; ?>
                        </div>
                    </div>
                    <div class="form-group fone mt-2"> 
                        <button type="submit" class="btn btn-success mt-2">Login</button>
                        <p class="exist mt-4">If you not registered yet? <span>Register</span></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="<?php echo URLROOT; ?>/public/js/message.js"></script>

<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>