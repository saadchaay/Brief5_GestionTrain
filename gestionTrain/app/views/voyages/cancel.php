<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
<body>
    <div class="d-flex" id="wrapper">

        <?php require APPROOT. '/views/includes/sidebar.php'; ?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php require APPROOT. '/views/includes/navbar.php'; ?>

            <div class="alert alert-danger my-2 mx-4" role="alert" id="alert-cancel">
                <?php echo $data['Error']; ?>
            </div>
            <div class="d-flex flex-wrap justify-content-around align-items-center">
                <div class="card bg-light m-3 col-sm-6">
                    <div class="card-header">
                        Voyage details
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-center">
                                <h4>Départ</h4>
                                <h3><?php echo $data["voyage"]->heure_depart;  ?></h3>
                                <h6><?php echo($data["voyage"]->garre_depart);  ?></h6>
                            </div>
                            <div class="col text-center">
                                <h4>Arrivée</h4>
                                <h3><?php echo($data["voyage"]->heure_destination);  ?></h3>
                                <h6><?php echo($data["voyage"]->garre_destination);  ?></h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card bg-light m-3 col-sm-6" style="width: 18rem;">
                    <div class="card-header">
                        Date d'annulation
                    </div>
                    <div class="card-body">
                        <form action="<?php echo URLROOT. "/voyages/cancel/". $data["voyage"]->id_voyage ;?>" method="POST">
                        <div class="row-sm-6">
                            <div class="col-sm-12 text-center">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input name="dateArchive" type='date' class="form-control" />
                                        <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-sm-6">
                            <button class="btn btn-success" type="submit">submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php require APPROOT. "/views/includes/footer.php" ; ?>
    <script>
        var alert_ = document.getElementById("alert-cancel");

        if(alert_.innerText == ""){
            alert_.setAttribute('style','display:none;');
        } else {
            alert_.removeAttribute('style');
        }
    </script>
</body>