<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
    $villes = [
        "Fes","Oujda","Taourirt","El Jadida","Benguerir","Safi","Nador","Tangier","Marrakech","Casablanca"
    ];
?>

<body style="background-color: #20c997;">
    <div class="container rounded shadow-sm mt-5 p-4" style="background-color: white;">
    <?php if(!empty($data["Errors"])): ?>
        <div class="alert alert-danger my-2" role="alert" id="alert-failed">
            <?php echo $data['Errors']; ?>
        </div>
    <?php endif ;?>
        <form action="<?php echo URLROOT ;?>/pages/booking" method="post">
            <div class="row">
                <div class="col-md-2 pe-0 col-sm-12">
                    <div class="btn radio-btn my-3"> <label class="radio"> <input type="radio" value="One way" name="book" checked> One way <span></span> </label> </div>
                </div>
                <div class="col-md-2 pe-0 col-sm-12">
                    <div class="btn radio-btn my-3"> <label class="radio"> <input type="radio" value="Roundtrip" name="book"> Roundtrip <span></span> </label> </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-12 mb-4">
                    <div class="form-control d-flex flex-column" style="height: 70px;">
                        <p class="h-blue">TRAVEL FROM</p> 
                        <select name="departStation" id="" class="border-0 outline-none">
                            <option value="" hidden selected>Select city</option>
                            <?php foreach($villes as $ville): ?>
                                <option value="<?php echo $ville ?>"><?php echo $ville; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-12 mb-4">
                    <div class="form-control d-flex flex-column" style="height: 70px;">
                        <p class="h-blue">TRAVEL TO</p> 
                        <select name="arriveStation" id="" class="border-0 outline-none">
                            <option value="" hidden selected>Select city</option>
                            <?php foreach($villes as $ville): ?>
                                <option value="<?php echo $ville ?>"><?php echo $ville; ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-12 mb-4">
                    <div class="form-control d-flex flex-column" style="height: 70px;">
                        <p class="h-blue">DEPARTING</p> <input name="departTime" class="inputbox textmuted" type="date">
                    </div>
                </div>
                <div class="col-md-3 col-12 mb-4">
                    <div class="form-control d-flex flex-column" style="height: 70px;">
                        <p class="h-blue">RETURNING</p> <input name="arriveTime" class="inputbox textmuted " type="date">
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="form-control d-flex flex-column" style="height: 70px;">
                        <p class="h-blue">ADULTS(18+)</p> 
                        <select name="places" class="border-0 outline-none">
                            <?php for ($i=1; $i < 11; $i++): ?>
                                <option value="<?php echo $i ?>"><?php echo $i; ?></option>
                                
                            <?php endfor ?><option value="<?php echo $i+110 ?>"><?php echo $i+110; ?></option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="text-center my-2">
                        <button type="submit" class="btn btn-primary px-5">SHOW</button>
                    </div>
                </div>
            </div>
            
        </form>
    </div>
<?php if(!empty($data["results"])): ?>
    <div class="container rounded shadow-sm my-5 py-3" style="background-color: white;">
            <table class="text-center" style="width: 100%;">
            <h4 class="text-center">Trips Available</h4>
                <thead class="table-dark">
                    <tr class="py-5">
                        <th class="py-3" scope="col">Depart</th>
                        <th class="py-3" scope="col">Arrive</th>
                        <th class="py-3" scope="col">Depart time</th>
                        <th class="py-3" scope="col">Arrive time</th>
                        <th class="py-3" scope="col">Train</th>
                        <th class="py-3" scope="col">Price</th>
                        <th class="py-3" scope="col">Booking</th>
                    </tr>
                </thead>
                <tbody class="mt-2">
                    <?php foreach ($data["results"] as $voyage): ?>
                    <tr>
                        <td><?php echo $voyage->garre_depart; ?></td>
                        <td><?php echo $voyage->garre_destination; ?></td>
                        <td><?php echo $voyage->heure_depart; ?></td>
                        <td><?php echo $voyage->heure_destination; ?></td>
                        <td>
                            <?php 
                                for ($i=0; $i < count($data['trains']); $i++) { 
                                    echo ($data['trains'][$i]->id_train == $voyage->id_train_fk)?$data['trains'][$i]->train_name:"" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                for ($i=0; $i < count($data['trains']); $i++) { 
                                    echo ($data['trains'][$i]->id_train == $voyage->id_train_fk)?$data['trains'][$i]->prix."DH":"" ;
                                }
                            ?>
                        </td>
                        <td>
                            <?php if(!empty($data["returning"])): ?>
                                <form action="<?php echo URLROOT."/pages/results/".$voyage->id_voyage."/".$data["departing"]."/".$data["returning"]."/".$data["places"];?>" method="post">
                                    <button type="submit" class="btn btn-success" value="<?php echo $voyage->id_voyage?>">
                                        Book Now
                                    </button>
                                </form>
                            <?php else: ?>
                                <form action="<?php echo URLROOT."/pages/results/".$voyage->id_voyage."/".$data["departing"]."/"."null"."/".$data["places"];?>" method="post">
                                    <button type="submit" class="btn btn-success" value="<?php echo $voyage->id_voyage?>">
                                        Book Now
                                    </button>
                                </form>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>  
                       
    </div>
<?php endif ?>  
</body>

<?php 
    require APPROOT.'/views/pages/footer.php' ;
?>