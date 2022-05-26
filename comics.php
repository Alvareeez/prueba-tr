<?php session_start(); 
if(isset($_SESSION['carrito'])){
$carrito_mio=$_SESSION['carrito'];
}
if(isset($_SESSION['carrito'])){
    for($i=0;$i<=count($carrito_mio)-1;$i ++){
        if(isset($carrito_mio[$i])){
        if($carrito_mio[$i]!=NULL){ 
        if(!isset($carrito_mio['cantidad'])){$carrito_mio['cantidad'] = '0';}else{ $carrito_mio['cantidad'] = $carrito_mio['cantidad'];}
        $total_cantidad = $carrito_mio['cantidad'];
    $total_cantidad ++ ;
    if(!isset($totalcantidad)){$totalcantidad = '0';}else{ $totalcantidad = $totalcantidad;}
    $totalcantidad += $total_cantidad;
    }}}
}
     if(!isset($totalcantidad)){$totalcantidad = '';}else{ $totalcantidad = $totalcantidad;}
?>
<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic, img_comics FROM productos WHERE activo=1');
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba-DB</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
     <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #112956;">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Mi tienda</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
           </button>
         <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
               <li class="nav-item">
                 <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red; cursor:pointer;"><i class="fa fa-shopping-cart"></i><?php echo $totalcantidad; ?>
</a>
              </li>
             </ul>
           </div>
      </div>
    </nav>
        <main>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($resultado as $row) { ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php 
                                $id = $row['ID_Comics'];
                                $imagen = $row['img_comics'];
                                if (!file_exists($imagen))[
                                    $imagen = "img/no-foto.jpg"
                                    ]
                            ?>
                            <img id="img" src="<?php echo $imagen; ?>">
                            <div class="card-body">
                                <h5 class="card-tittle"><?php echo $row['Titulo_Comic']; ?></h5>
                                <p class="card-text">€<?php echo $row['precio_comic']; ?></p>
                                    <form id="formulario" name="formulario" method="post" action="cart.php">
                                    <a href="details.php?id=<?php echo $row['ID_Comics']; ?>" class="btn btn-primary">Detalles</a>
                                    <button type="submit" class="btn btn-success">Añadir</button>
                                    <input name="ref" type="hidden" id="ref" value="<?php echo $row['ID_Comics']; ?>">
                                    <input name="precio" type="hidden" id="precio" value="<?php echo $row['precio_comic']; ?>">
                                    <input name="titulo" type="hidden" id="titulo" value="<?php echo $row['Titulo_Comic']; ?>">
                                    <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2">
                                    </form>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </main>
        <?php 

include("../Admin/navbar.php"); 
include("./modal_cart.php"); 
include("../Carrito de compra paso 1/modal_cart.php");

?>
    </body>

    </html>