<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
<body>
    <div class="d-flex" id="wrapper">

        <?php require APPROOT. '/views/includes/sidebar.php'; ?>

        <div id="page-content-wrapper">
            
            <?php require APPROOT. '/views/includes/navbar.php'; 
                $villes = [
                    "Fes","Oujda","Taourirt","El Jadida","Benguerir","Safi","Nador","Tangier","Marrakech","Casablanca"
                ];
            ?>
    
            <div class="container">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Ajouter voyage</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une voyage</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo URLROOT;?>/voyages/voyage" method="POST">
                                        <div class="row">
                                            <div class="col mb-2">
                                                <label for="departStation" class="col-form-label">Garre de depart:</label>
                                                <select name="departStation" class="form-select" aria-label="Default select example">
                                                    <?php foreach ($villes as $ville): ?>
                                                        <option value="<?php echo $ville ;?>"><?php echo $ville ;?></option>
                                                    <?php endforeach ; ?>
                                                </select>
                                            </div>
                                            <div class="col mb-2">
                                                <label for="departTime" class="col-form-label">Heure de depart:</label>
                                                <input type="time" class="form-control" name="departTime" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-2">
                                                <label for="arriveStation" class="col-form-label">Garre de destination:</label>
                                                <select name="arriveStation" class="form-select" aria-label="Default select example">
                                                    <?php foreach ($villes as $ville): ?>
                                                        <option value="<?php echo $ville ;?>"><?php echo $ville ;?></option>
                                                    <?php endforeach ; ?>
                                                </select>
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
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger my-2" role="alert" id="alert-failed">
                        <?php echo $data['Errors']; ?>
                    </div>
                    <div class="alert alert-primary my-2" role="alert" id="alert-success">
                        <?php echo $data['Success']; ?>
                    </div>
                <div class="table-responsive custom-table-responsive">
                    <table class="table custom-table">
                    <thead>
                        <tr>  
                        <th scope="col">Voyage</th>
                        <th scope="col">Train</th>
                        <th scope="col">Depart</th>
                        <th scope="col">Arrive</th>
                        <th scope="col">Places</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['voyages'] as $voyage): ?>
                        <tr scope="row">
                            <td> <?php echo $voyage->id_voyage ;?> </td>
                            <td> <?php
                                for ($i=0; $i < count($data['trains']); $i++) { 
                                    echo ($data['trains'][$i]->id_train == $voyage->id_train_fk)?$data['trains'][$i]->train_name:"" ;
                                }
                            ?></td>
                            <td>
                                <small class="d-block"><?php echo $voyage->garre_depart. " ( ".$voyage->heure_depart. " )"; ?></small> 
                            </td>
                            <td>  
                                <small class="d-block"><?php echo $voyage->garre_destination. " ( ".$voyage->heure_destination. " )"; ?></small>
                            </td>
                            <td><?php
                                for ($i=0; $i < count($data['trains']); $i++) { 
                                    echo ($data['trains'][$i]->id_train == $voyage->id_train_fk)?$data['trains'][$i]->places:"" ;
                                }
                            ?></td>
                            <td>
                                <button type="button" class="btn btn-success px-2 py-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever=""><i class="fas fa-edit" style='color: white'></i></button>
                                <a href="<?php echo URLROOT. "/voyages/cancel/". $voyage->id_voyage ?>"
                                    class="btn btn-danger px-2 py-1" >
                                    <i class="fa fa-archive" style='color: white'></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                    </table>
                </div>
    

            <!-- model for archive voyage -->

                    <div class="modal fade" id="exampleModalCanceled" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Archive un voyage</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo URLROOT;?>/voyages/voyage" method="POST">
                                        <div class="row">
                                            <div class="col mb-2">
                                                <label for="departStation" class="col-form-label">Enter la date de annulation:</label>
                                                <input class="form-control" type="date" name="dateCanceled" id="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button value="<?php ?>" name="canceledVoyage" type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            <!-- fin model -->
            </div>
        </div>
        <?php require APPROOT. "/views/includes/footer.php" ; ?>
        <script src="<?php echo URLROOT ; ?>/public/js/modal.js" ></script>