<?php
    if(!isset($_GET['m']))
        header('location: pedidos');
    
    $mesa = $_GET['m'];

?>

<?php include("app/inc/header.php"); ?>
    <section class="content-section">
        <div class="container">
            <div class="content-section-heading text-center">
                <h2 class="mb-5">Mesa <?=$mesa?></h2>
                <div class="row">
                    <div class="col-4"><a class="btn btn-primary btn-xl" href="">Agregar producto</a></div>
                    <div class="col-4"><a class="btn btn-success btn-xl" href="">Pedir orden</a></div>
                    <div class="col-4"><a class="btn btn-danger btn-xl" href="">Cancelar orden</a></div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-section" id="portfolio">
        <div class="container">
            <div class="content-section-heading text-center">
                <h5 class="mb-5">Productos</h5>
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group list-group-flush">
                            
                            <li class="list-group-item">
                                <div class="row" style="border: 1;">
                                    <div class="col-5">Producto</div>
                                    <div class="col-3">Cantidad</div>
                                    <div class="col-4"><a class="badge badge-danger badge-pill" href="">Eliminar</a></div>
                                </div>
                            </li>
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include("app/inc/footer.php");?>
