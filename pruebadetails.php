<?php
require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic FROM productos WHERE activo=1');
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
    </head>

    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <header>
            <div class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a href="#" class="navbar-brand">
                        <strong>Prueba-BD</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarHeader">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">Catalogo</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ">Contacto</a>
                            </li>
                        </ul>
                        <a href="carrito.php" class="btn btn-primary">Carrito</a>
                    </div>
                </div>
            </div>
        </header>
        <main>
                <?php foreach ($resultado as $row)  ?>

                <div class="container">
                  <div class="row">
                        <div class="col-md-6 order-md-1">
                         <img src="img/productos/1/prueba.jpg">
                         </div>
                        <div class="col-md-6 order-md-2">
                         <h2><?php echo $row['Titulo_Comic']; ?></h2>
                         <h5><?php echo $row['precio_comic']; ?></h5>
                        </div>
                    </div>
                    <?php  ?>
                </div>                           

        </main>
    </body>

    </html>