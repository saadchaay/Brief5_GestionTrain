<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
<body>
    <div class="d-flex" id="wrapper">

        <?php require APPROOT. '/views/includes/sidebar.php'; ?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php require APPROOT. '/views/includes/navbar.php'; ?>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $data['allVoyages'] ;?></h3>
                                <p class="fs-5">Voyages a jour</p>
                            </div>
                            <i class="fas fa-suitcase-rolling fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $data['reservation'] ;?></h3>
                                <p class="fs-5">Reservation</p>
                            </div>
                                 <i class=""></i>
                                <i class="fas fa-tags fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                            </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $data['trains'] ;?></h3>
                                <p class="fs-5">Trains</p>
                            </div>
                            <i class="fa fa-train fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?php echo $data['clients'] ;?></h3>
                                <p class="fs-5">Clients</p>
                            </div>
                            <i class="fas fa-user-check fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php require APPROOT. "/views/includes/footer.php" ; ?>
</body>