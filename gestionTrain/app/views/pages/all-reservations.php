<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>
<body style="background-color: #20c997;">
    <div class="container-xl rounded bg-white mt-5">
        <h3 class="text-center">All My Reservations</h3>
        <table class="text-center" style="width: 100%;">
            <thead class="table-dark">
                <tr class="py-5">
                    <th class="py-3" scope="col">Depart</th>
                    <th class="py-3" scope="col">Arrive</th>
                    <th class="py-3" scope="col">Depart time</th>
                    <th class="py-3" scope="col">Arrive time</th>
                    <th class="py-3" scope="col">My departure date</th>
                    <th class="py-3" scope="col">Train</th>
                    <th class="py-3" scope="col">Price</th>
                    <th class="py-3" scope="col">Status</th>
                    <th class="py-3" scope="col">Cancel</th>
                </tr>
            </thead>
            <tbody class="my-3">
                <?php foreach ($data["allRes"] as $row): ?>
                <form action="" method="post">
                <tr class="my-2 py-3">
                    <td class="my-2 py-2"><?php echo $row->garre_depart ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->garre_destination ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->heure_depart ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->heure_destination ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->date_voyage ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->train_name ; ?></td>                      
                    <td class="my-2 py-2"><?php echo $row->prix ; ?></td>
                    <td class="my-2 py-2 status_action">
                        <button class="btn btn-outline-info" disabled>
                            <?php 
                                for ($i=0; $i < count($data["allRes"]); $i++) {
                                    echo ($row->id_reserv == $data["res"][$i]["booking"]->id_reserv)? $data["res"][$i]["status"]:"";
                                }  
                            ?>
                        </button>
                    </td>
                    
                    <?php for ($i=0; $i < count($data["allRes"]); $i++): 
                            if($row->id_reserv == $data["res"][$i]["booking"]->id_reserv && $data["res"][$i]["status"] == "Pending"): ?>
                                <td class="my-2 py-2">
                                    <a href="<?php echo URLROOT. "/pages/cancel_reservation/".$row->id_reserv; ?>" class="btn btn-danger px-2 py-1" >
                                        <i class="fa fa-times-circle" style='color: white'></i>
                                    </a>
                                </td>
                            <?php elseif($row->id_reserv == $data["res"][$i]["booking"]->id_reserv && $data["res"][$i]["status"] == "Expired"):?>
                                <td class="my-2 py-2">
                                    <a href="" class="btn btn-danger px-2 py-1 disabled" >
                                        <i class="fa fa-times-circle" style='color: white'></i>
                                    </a>
                                </td>
                            <?php elseif($row->id_reserv == $data["res"][$i]["booking"]->id_reserv && $data["res"][$i]["status"] == "Depart Soon"):?>
                                <td class="my-2 py-2">
                                    <a href="" class="btn btn-danger px-2 py-1 disabled" >
                                        <i class="fa fa-times-circle" style='color: white'></i>
                                    </a>
                                </td>
                            <?php endif ;?>
                    <?php endfor ; ?>
                    
                </tr> </form>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>