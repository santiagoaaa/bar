<?php include("app/inc/header.php"); ?>
   
    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h2 class="mb-5">Mesas</h2>
            </div>
            <div class="row no-gutters">

                <?php for($i=0;$i<25;$i++): ?>
              
                    <div class="col-4">
                        <a class="portfolio-item" href="pedido.php?m=<?=$i+1?>">
                            <div class="caption">
                                <div class="caption-content">
                                    <h5>Mesa</h5>
                                    <p class="mb-0"><?=$i+1?></p>
                                </div>
                            </div>
                            <img class="img-fluid" src="img/table2.png" alt="Mesa">
                        </a>
                    </div>
                
                <?php endfor;?>

            </div>
        </div>
    </section>
<?php include("app/inc/footer.php");?>
