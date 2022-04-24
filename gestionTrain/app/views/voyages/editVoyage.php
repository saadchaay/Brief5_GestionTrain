<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
<body>
    <div class="d-flex" id="wrapper">

        <?php require APPROOT. '/views/includes/sidebar.php'; ?>

        <div id="page-content-wrapper">
            
            <?php require APPROOT. '/views/includes/navbar.php';?>

           
            <div class="container">
            <?php if($data["Errors"]): ?>
                        <div class="alert alert-danger my-2" role="alert" id="alert-failed">
                            <?php echo $data['Errors']; ?>
                        </div>
                    <?php endif; ?>
                <div class="modal-body">
                    <form action="<?php echo URLROOT. "/voyages/editVoyage/". $data['id']; ?>" method="POST">
                        <div class="row">
                            <div class="col mb-2">
                                <label for="departStation" class="col-form-label">Garre de depart:</label>
                                <input class="form-control" type="text" name="departStation" style="background-color: white;" value="<?php echo $data['voyage']->garre_depart ; ?>">
                            </div>
                            <div class="col mb-2">
                                <label for="departTime" class="col-form-label">Heure de depart:</label>
                                <input type="time" class="form-control" name="departTime">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-2">
                                <label for="arriveStation" class="col-form-label">Garre de destination:</label>
                                <input class="form-control" type="text" name="arriveStation" style="background-color: white;" value="<?php echo $data['voyage']->garre_destination ; ?>">
                            </div>
                            <div class="col mb-2">
                                <label for="arriveTime" class="col-form-label">Heure de destination:</label>
                                <input type="time" class="form-control" name="arriveTime" >
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="train" class="col-form-label">Train</label>
                            <select name="train" class="form-select" aria-label="Default select example">
                                <?php foreach ($data['trains'] as $train): ?>
                                    <option value="<?php echo $train->id_train ;?>"><?php echo $train->train_name ;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                    </form>
                </div>
                    <!-- edit travel -->
                
    

            <!-- model for archive voyage -->

                    

            <!-- fin model -->
            </div>
        </div>
        <?php require APPROOT. "/views/includes/footer.php" ; ?>
        <script src="<?php echo URLROOT ; ?>/public/js/modal.js" ></script>