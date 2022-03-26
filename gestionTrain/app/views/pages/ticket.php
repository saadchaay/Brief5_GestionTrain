<?php 
    require APPROOT. "/views/pages/head.php" ;
?>

<?php 
    require APPROOT. "/views/pages/navbar.php" ;
?>

<body>
    <?php if(!empty($data["Success"])): ?>
        <div class="d-flex justify-content-center flex-column">
            <div class="container" style="width: 400px;">
                <div class="alert alert-success my-2 text-center" role="alert" id="alert-failed">
                    <?php echo $data["Success"]. "<br> Get Your Ticket." ?>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5" >
                <div class="card text-center" style="width: 18rem;">
                    <a style="font-size: 1.2em;" class="badge badge-dark m-3" href="<?php echo URLROOT ;?>/"> <b><?php echo "EasyGetTrain"; ?></b> </a>
                    <h3><?= $data["voyage"]->date_voyage;  ?></h3>
                    <div class="d-flex justify-content-around mt-4">
                        <span> <b> <?= $data["voyage"]->garre_depart;  ?> </b></span>
                        <i class="fa fa-train" style="font-size:24px"></i>
                        <span><b><?= $data["voyage"]->garre_destination;  ?></b></span>
                    </div>
                <div class="card-body">
                        <h5 class="card-title"><span>Ticket Number: </span> <?= $data["ticket_details"]["ticketNum"]; ?></h5>
                        <div class="d-flex justify-content-around mt-4">
                            <div class="">
                                <span>departure</span>
                                <p> <b> <?= $data["voyage"]->heure_depart;  ?> </b></p>
                            </div>
                            <div class="">
                                <span>Arrivale</span>
                                <p> <b> <?= $data["voyage"]->heure_destination;  ?> </b></p>
                            </div>
                        </div>
                        

                        <img id='barcode' 
                                src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100" 
                                alt="" 
                                title="HELLO" 
                                width="100" 
                                height="100" />
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
    <div class="container rounded shadow-sm mt-5 p-4" style="background-color: white;">
        <div class="row justify-content-center">
            <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
                <form action="<?php echo URLROOT ;?>/pages/ticket" class="domain-form" method="post">
                    <div class="form-group d-md-flex"> <input name="ticketNum" type="number" class="form-control px-4" placeholder="Enter Your Ticket Number..."> <input type="submit" class="search-domain btn btn-primary px-5" value="Searh Ticket"> </div>
                </form>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <?php unset($_SESSION["Ticket"]); ?>
</body>