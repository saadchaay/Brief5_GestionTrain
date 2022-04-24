<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>
<style>
    /*    --------------------------------------------------
	:: Login Section
	-------------------------------------------------- */
    #login {
        padding-top: 50px
    }
    #login .form-wrap {
        width: 30%;
        margin: 0 auto;
    }
    #login h1 {
        color: #1fa67b;
        font-size: 18px;
        text-align: center;
        font-weight: bold;
        padding-bottom: 20px;
    }
    #login .form-group {
        margin-bottom: 25px;
    }
    #login .checkbox {
        margin-bottom: 20px;
        position: relative;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
    #login .checkbox.show:before {
        content: '\e013';
        color: #1fa67b;
        font-size: 17px;
        margin: 1px 0 0 3px;
        position: absolute;
        pointer-events: none;
        font-family: 'Glyphicons Halflings';
    }
    #login .checkbox .character-checkbox {
        width: 25px;
        height: 25px;
        cursor: pointer;
        border-radius: 3px;
        border: 1px solid #ccc;
        vertical-align: middle;
        display: inline-block;
    }
    #login .checkbox .label {
        color: #6d6d6d;
        font-size: 13px;
        font-weight: normal;
    }
    #login .btn.btn-custom {
        font-size: 14px;
        margin-bottom: 20px;
    }
    #login .forget {
        font-size: 13px;
        text-align: center;
        display: block;
    }

    /*    --------------------------------------------------
        :: Inputs & Buttons
        -------------------------------------------------- */
    .form-control {
        color: #212121;
    }
    .btn-custom {
        color: #fff;
        background-color: #1fa67b;
    }
    .btn-custom:hover,
    .btn-custom:focus {
        color: #fff;
    }

    /*    --------------------------------------------------
        :: Footer
        -------------------------------------------------- */
    #footer {
        color: #6d6d6d;
        font-size: 12px;
        text-align: center;
    }
    #footer p {
        margin-bottom: 0;
    }
    #footer a {
        color: inherit;
    }
</style>

<!-- <section class="">
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
</section> -->
<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
        	    <div class="form-wrap">
                <h1>Log in to your account</h1>
                    <form role="form" action="<?php echo URLROOT; ?>/users/login" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div id="alert-failed" class="alert alert-danger my-2" role="alert">
                            <?php echo $data["Errors"]; ?>
                        </div>
                        <div class="checkbox">
                            <p class="exist mt-4">If you not registered yet? <span><a href="<?php echo URLROOT; ?>/users/register">Register</a></span></p>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>
                    <hr>
        	    </div>
    		</div> <!-- /.col-xs-12 -->
    	</div> <!-- /.row -->
    </div> <!-- /.container -->
</section>

<script src="<?php echo URLROOT; ?>/public/js/message.js"></script>

<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>