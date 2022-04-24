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
        width: 60%;
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

<section id="login">
    <div class="container">
    	<div class="row">
    	    <div class="col-xs-12">
    
        	    <div class="form-wrap">
                <h1>Create an account</h1>
                 
                    <form id="login-form" action="<?php echo URLROOT; ?>/users/register" method="POST">
                        
                        <div class="row">

                            <div class="col form-group">
                                <label for="fullName" class="sr-only">fullName</label>
                                <input type="name" name="fullName" id="fullName" class="form-control" placeholder="Full name">
                                <?php if(!empty($data["fullNameError"])): ?>
                                    <span style="color: red; font-size: .7em;" >
                                        <?php echo $data['fullNameError']; ?>
                                    </span>
                                <?php endif ;?>
                            </div>

                            <div class="col form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                                <?php if(!empty($data["usernameError"])): ?>
                                    <span style="color: red; font-size: .7em;" >
                                        <?php echo $data['usernameError']; ?>
                                    </span>
                                <?php endif ;?>
                            </div>
                                    
                        </div>

                        <div class="row">

                            <div class="col form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email@example.com">
                                <?php if(!empty($data["emailError"])): ?>
                                    <span style="color: red; font-size: .7em;">
                                        <?php echo $data['emailError']; ?>
                                    </span>
                                <?php endif ;?>
                            </div>
                            
                            <div class="col form-group">
                                <label for="phone" class="sr-only">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone">
                            </div>

                        </div>

                        <div class="row">

                            <div class="col form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                <?php if(!empty($data["passwordError"])): ?>
                                    <span style="color: red; font-size: .7em;">
                                        <?php echo $data['passwordError']; ?>
                                    </span>
                                <?php endif ;?>
                            </div>
                            
                            <div class="col form-group">
                                <label for="confirmPassword" class="sr-only">Confirm Password</label>
                                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm Password">
                                <?php if(!empty($data["confirmPasswordError"])): ?>
                                    <span style="color: red; font-size: .7em;">
                                        <?php echo $data['confirmPasswordError']; ?>
                                    </span>
                                <?php endif ;?>
                            </div>
                            
                        </div>
                    
                        <?php if(!empty($data["Errors"])): ?>
                            <div class="alert alert-danger my-2" role="alert" id="alert-failed">
                                <?php echo $data['Errors']; ?>
                            </div>
                        <?php endif ;?>

                        <div class="checkbox">
                            <p class="exist mt-4">Already have an account? <span><a href="<?php echo URLROOT; ?>/users/login">Login</a></span></p>
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Sign Up Now">
                    </form>
                    <hr>
        	    </div>
    		</div> 
    	</div> 
    </div> 
</section>

<!-- <script>
    var fullName = document.getElementById("fullName").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var password = document.getElementById("key").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var form = document.getElementById("login-form");
    function saveValues() {
        localStorage.setItem("fullName", fullName);
        localStorage.setItem("username", username);
        localStorage.setItem("email", email);
        localStorage.setItem("phone", phone);
        localStorage.setItem("password", password);
        localStorage.setItem("confirmPassword", confirmPassword);
        getValues();
        form.setAttribute('action','<?php echo URLROOT; ?>/users/register');
        form.setAttribute('method','POST');
        
    }
    function getValues() {
        fullName = localStorage.getItem("fullName");
        username = localStorage.getItem("username");
        email = localStorage.getItem("email");
        phone = localStorage.getItem("phone");
        password = localStorage.getItem("password");
        confirmPassword = localStorage.getItem("confirmPassword");
        document.getElementById("fullName").value = fullName;
        document.getElementById("username").value = username;
        document.getElementById("email").value = email;
        document.getElementById("phone").value = phone;
        document.getElementById("key").value = password;
        document.getElementById("confirmPassword").value = confirmPassword;
    }

</script> -->

<script src="<?php echo URLROOT; ?>/public/js/message.js"></script>

<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>