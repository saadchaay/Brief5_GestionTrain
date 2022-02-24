<?php 
    require APPROOT.'/views/includes/head.php' ;
?>
<body>
    <div class="d-flex" id="wrapper">

        <?php require APPROOT. '/views/includes/sidebar.php'; ?>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            
            <?php require APPROOT. '/views/includes/navbar.php'; ?>

            <div class="table-responsive custom-table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>  
                        <th  class="text-center" scope="col">Voyage</th>
                        <th  class="text-center" scope="col">Date d'annulation</th>
                        <th  class="text-center" scope="col">Depart</th>
                        <th  class="text-center" scope="col">Arrive</th>
                        <th  class="text-center" scope="col">Action</th>
                        </tr>
                    </thead>
                        <tbody>
                            <?php foreach($data['archives'] as $archive): ?>
                            <tr scope="row">
                                <td  class="text-center">
                                    <?php 
                                        for ($i=0; $i < count($data["voyages"]); $i++) { 
                                            echo ($data["voyages"][$i]->id_voyage == $archive->id_voyage_fk)? $data["voyages"][$i]->id_voyage:"" ;
                                        }
                                    ?> 
                                </td>
                                <td  class="text-center"> <?php echo $archive->date_VA ; ?></td>
                                <td  class="text-center">
                                    <small class="d-block">
                                        <?php 
                                            for ($i=0; $i < count($data["voyages"]); $i++) { 
                                                echo ($data["voyages"][$i]->id_voyage == $archive->id_voyage_fk)? $data["voyages"][$i]->garre_depart:"" ;
                                            }
                                        ?>
                                    </small> 
                                </td>
                                <td  class="text-center">  
                                    <small class="d-block">
                                        <?php 
                                            for ($i=0; $i < count($data["voyages"]); $i++) { 
                                                echo ($data["voyages"][$i]->id_voyage == $archive->id_voyage_fk)? $data["voyages"][$i]->garre_destination:"" ;
                                            }
                                        ?>
                                    </small>
                                </td>
                                <td  class="text-center">
                                    <form action="<?php echo URLROOT."/voyages/deleteArchive/". $archive->id_VA; ?>" method="post">
                                        <button class="btn btn-danger px-2 py-1" type="submit">
                                            <i class="fas fa-trash-alt" style='color: white'></i>
                                        </button>
                                    </form>
                                    
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                </table>
            </div>
            
        </div>
    <!-- /#page-content-wrapper -->
    </div>

    <?php require APPROOT. "/views/includes/footer.php" ; ?>
</body>