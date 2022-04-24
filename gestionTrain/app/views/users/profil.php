<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>

<body style="background-color: #20c997;">
    <div class="container rounded bg-white mt-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" src="https://i.imgur.com/0eg0aG0.jpg" width="90">
                    <span class="font-weight-bold"><?php echo $data["fullName"] ;?></span>
                    <span class="text-black-50"><?php echo $data["email"] ;?></span>
                </div>
            </div>
            <div class="col-md-8">
            <?php if(!empty($data["Errors"])): ?>
                <div class="alert alert-danger my-2" role="alert" id="alert-failed">
                    <?php echo $data['Errors']; ?>
                </div>
            <?php endif ;?>
            <?php if(!empty($data["Success"])): ?>
                <div class="alert alert-success my-2" role="alert" id="alert-failed">
                    <?php echo $data['Success']; ?>
                </div>
            <?php endif ;?>
                <form action="<?php echo URLROOT; ?>/users/profil" method="post">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex flex-row align-items-center back"><i class="fa fa-long-arrow-left mr-1 mb-1"></i>
                                <h6><a href="<?php echo URLROOT ;?>/page/index">Back to home</a> </h6>
                            </div>
                            <h6 class="text-right">Edit Profile</h6>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><input name="fullName" type="text" class="form-control" placeholder="Full Name" value="<?php echo $data["fullName"] ;?>"></div>
                            <div class="col-md-6"><input name="username" type="text" class="form-control" value="<?php echo $data["username"] ;?>" placeholder="Username"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo $data["email"] ;?>"></div>
                            <div class="col-md-6"><input name="phone" type="text" class="form-control" value="<?php echo $data["phone"] ;?>" placeholder="Phone number"></div>
                        </div>
                        <div>
                            <?php  ?>
                            <a id="btn-password" class="btn btn-success mt-3" onclick="displayPassaword()" >Update password</a>
                        </div>
                        <div class="row mt-3" id="password-form">
                            <div class="col-md-4"><input id="new-pass" name="newPassword" type="password" class="form-control" placeholder="New Password"></div>
                            <div class="col-md-4"><input id="conf-new-pass" name="confirmNewPassword" type="password" class="form-control" placeholder="Confirm New Password"></div>
                        </div>
                        <div class="mt-4 text-right"><button type="submit" class="btn btn-primary profile-button">Save Profile</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo URLROOT; ?>/public/js/profilUser.js"></script>
<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>