<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php";
    if(empty($data)){
        $data["places"] = 1;
    }
?>

<body style="background-color: #20c997;">
    <?php 
        if(!is_logged_user()):
    ?>
    <div class="container rounded shadow-sm col-md-8 mt-5 p-4" style="background-color: white;">
        <?php if(!empty($data["Errors"])): ?>
            <div class="alert alert-danger my-2" role="alert" id="alert-failed">
                <?php echo $data['Errors']; ?>
            </div>
        <?php endif ;?>
        <form class="p-2" action="" method="post"> 
            <?php 
                for ($i=0; $i < $data["places"]; $i++): 
            ?>
                <b> Passager <?php echo $i+1 ;?> </b>:
            <div class="form-row  my-2">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Full Name</label>
                    <input name="<?php echo "fullName".$i+1; ?>" type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email</label>
                    <input name="<?php echo "email".$i+1; ?>" type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Phone Number</label>
                    <input name="<?php echo "phone".$i+1; ?>" type="number" class="form-control" id="inputPassword4">
                </div>
            </div>
            <?php 
                endfor;
            ?>
            <button name="addPassagers" type="submit" class="btn btn-primary mt-3 px-4">Submit</button>
        </form>
    </div>
    <?php 
        else : 
    ?>
    <div class="container rounded shadow-sm col-md-8 mt-5 p-4" style="background-color: white;">
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
        <form class="p-2" action="<?php echo URLROOT."/pages/results/".$data["id_voyage"]."/".$data["departing"]."/".$data["returning"]."/".$data["places"];?>" method="post"> 
            <b>Client: </b> 
            <div class="form-row  my-2">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Full Name</label>
                    <input value="<?php echo $data["client"]->full_name ?>" name="<?php echo "fullName1"; ?>" type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email</label>
                    <input value="<?php echo $data["client"]->email ?>" name="<?php echo "email1"; ?>" type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Phone Number</label>
                    <input value="<?php echo $data["client"]->telephone ?>" name="<?php echo "phone1"; ?>" type="number" class="form-control" id="inputPassword4">
                </div>
            </div>
            <?php 
                for ($i=1; $i < $data["places"]; $i++): 
            ?>
                <b> Passager <?php echo $i+1 ;?> </b>:
            <div class="form-row  my-2">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Full Name</label>
                    <input name="<?php echo "fullName".$i+1; ?>" type="text" class="form-control" id="inputPassword4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Email</label>
                    <input name="<?php echo "email".$i+1; ?>" type="email" class="form-control" id="inputEmail4">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Phone Number</label>
                    <input name="<?php echo "phone".$i+1; ?>" type="number" class="form-control" id="inputPassword4">
                </div>
            </div>
            <?php 
                endfor;
            ?>
            <button name="addPassagers" type="submit" class="btn btn-primary mt-3 px-4">Submit</button>
        </form>
    </div>
    <?php endif ;?>
</body>
<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>