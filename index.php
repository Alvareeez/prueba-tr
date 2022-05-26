<?php  session_start();
include("../Admin/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>

<script src="../Alert/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="../Alert/sweetalert.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

 <!-- ESTILO CURSOS DE PROGRAMACION -->
 <link rel="stylesheet" href="../css/style_cp.css">


<title>Carrito paso 2</title>
</head>
<body>


<style>
.container_card{    margin: 0 auto;    padding:  0px 20px 20px 20px;    display: grid;    /* width: 800px; */    grid-template-columns: 1fr 1fr ;   grid-gap:1em;        /* grid-row-gap: 60px; */}
.blog-post{    position: relative;    margin-bottom: 15px;    margin: 30px;}
.blog-post img{    width: 100%;    height: 450px;    object-fit: cover;    border-radius: 10px;    }
.blog-post .category{    position: absolute;    top: 20px;    left: 20px;    padding: 10px 15px;  font-size: 14px;    text-decoration: none;    background-color: #e67e22;    color: #fff;    border-radius: 5px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.1);    text-transform: uppercase;}
.text-content{    position: absolute;    bottom: -30px;    padding: 20px;    background-color: #fff;    width: calc(100% - 20px);    left: 50%;    transform: translateX(-50%);    border-radius: 10px;    box-shadow: 1px 1px 8px rgba(0,0,0,0.08);/* padding-top: 50px; */}
.text-content h2{    font-size: 20px;    font-weight: 400;    /* margin-bottom: 30px; */}
.text-content img{    height: 70px;    width: 70px;    border: 5px solid rgba(0,0,0,0.1);    border-radius: 50%;    position: absolute;    top: -35px;    left: 35px;}
.tags a{    color: #888;    font-weight: 700;    text-decoration: none;    margin-right: 15px;    transition: 0.3s ease;}
.tags a:hover{    color: #000;}
@media screen and (max-width: 1100px) {    .container_card{        grid-template-columns: 1fr 1fr;        grid-row-gap: 60px;    }}
@media screen and (max-width: 600px) {    .container_card{        grid-template-columns: 1fr;        grid-row-gap: 60px;    }}
</style>


<!-- NAVBAR -->
<?php 

include("../Admin/navbar.php"); 
include("../Carrito de compra paso 1/nav_cart.php"); 
include("../Carrito de compra paso 1/modal_cart.php");

?>















<!-- vista B -->
<div class="center mt-5">
    <div class="card pt-3" >
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Mi pedido</p>
        <div class="container-fluid p-2">
<table class="table">
<thead>
<tr>
<th scope="col">#</th>
<th scope="col">Imagen</th>
<th scope="col">Cantidad</th>
<th scope="col">Artículo</th>
<th scope="col">Precio</th>
<th scope="col">Total</th>
</tr>
</thead>
<tbody>
    




<div class="container_card">
 
 <?php
 if(isset($_SESSION['carrito'])){
 $total=0;
 for($i=0;$i<=count($carrito_mio)-1;$i ++){
 if(isset($carrito_mio[$i])){
 if($carrito_mio[$i]!=NULL){
 ?>
<?php if ($carrito_mio[$i]['ref'] != 'portes'){ ?>
<tr>
<th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
<td>
 <img src="../Insertar artículo/articulos/<?php echo $carrito_mio[$i]['ref']; ?>.jpg" alt="" width="100px">
</td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['cantidad'] ?></td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['titulo'] ?></td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] ?>€</td>
<td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']; ?>€</td>
</tr>    
<?php } ?>
<?php
                 $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                 }
                 }
                 }
                 }
                 ?>

</tbody>
</table>


<li class="list-group-item d-flex justify-content-between">
                 <span  style="text-align: left; color: #000000;"><strong>Total (EUR)</strong></span>
                 <strong  style="text-align: left; color: #000000;"><?php
                 if(isset($_SESSION['carrito'])){
                 $total=0;
                 for($i=0;$i<=count($carrito_mio)-1;$i ++){
                     if(isset($carrito_mio[$i])){
                 if($carrito_mio[$i]!=NULL){ 
                 $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                 }
                 }}}
                 if(!isset($total)){$total = '0';}else{ $total = $total;}
                 echo number_format($total, 2, ',', '.');  ?> €</strong>
                 </li>



 </div>
</div>
<a type="button" class="btn btn-success my-4" href="../Carrito de compra paso 3/index.php">Continuar pedido</a>
</div>
</div>
<!-- END vista B -->











<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>








