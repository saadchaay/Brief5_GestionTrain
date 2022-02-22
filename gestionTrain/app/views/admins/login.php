<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    ADMIN PANEL
                </div>

                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form action="<?php echo URLROOT; ?>/admins/login" method ="POST">
                            <div class="form-group">
                                <label class="form-control-label">USERNAME</label>
                                <input name="username" type="text" class="form-control">
                                <span class="invalidFeedback">
                                    <?php echo $data['usernameError']; ?>
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">PASSWORD</label>
                                <input name="password" type="password" class="form-control" i>
                                <span class="invalidFeedback">
                                    <?php echo $data['passwordError']; ?>
                                </span>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-7 login-btm login-button">
                                    <button type="submit" class="btn btn-outline-primary">LOGIN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6"></div>
            </div>
        </div>




