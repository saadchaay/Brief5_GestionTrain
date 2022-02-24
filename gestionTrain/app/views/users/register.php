<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>

<section class="">
    <div class="container d-flex justify-content-center">
        <form action="<?php echo URLROOT;?>/users/register" method="post">
            <div class="row my-5"><h2 class="heading mb-4">Sign up </h2>
                <div class="col-md-6 rcol">
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-user pl-3"></i>
                        <input name="fullName" type="name" class="form-control" placeholder="Full Name"> 
                    </div>
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-envelope pl-3"></i> 
                        <input name="email" type="email" class="form-control" placeholder="Work email">
                    </div>
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-envelope pl-3"></i> 
                        <input name="phone" type="text" class="form-control" placeholder="Phone"> 
                    </div>
                    
                </div>
                <div class="col-md-6 rcol">
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-envelope pl-3"></i> 
                        <input name="username" type="text" class="form-control" placeholder="Username">  
                    </div>
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-lock pl-3"></i> 
                        <input name="password" type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group fone mt-2"> 
                        <i class="fas fa-lock pl-3"></i> 
                        <input name="confirmPassword" type="password" class="form-control" placeholder="Confirm Password">
                    </div>
                    <p class="exist mt-4">Existing user? <span>Log in</span></p>
                    <button type="submit" class="btn btn-success">Register Now</button>
                </div>
            </div>
        </form>
    </div>
</section>


<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>