<?php
require 'config/config.php';
require 'config/database.php';
$id_comic=$_REQUEST['id'];
$db = new Database();
$con = $db->conectar();
$sql = $con->prepare('SELECT ID_Comics, Titulo_Comic, precio_comic, Descripcion_Comic, img_comics FROM productos WHERE activo=1 AND ID_Comics='.$id_comic);
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
        <link rel="stylesheet" href="./css/styles.css">
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
            <div class="container">
                <div class="row">
                    <div class="col-md-6 order-md-1">
                     <?php foreach ($resultado as $row) { ?>
                        <div id="img-comics" class="card shadow-sm">
                            
                            <?php 
                                $id = $row['ID_Comics'];
                                $imagen = $row['img_comics'];
                                if (!file_exists($imagen))[
                                    $imagen = "img/no-foto.jpg"
                                    ]
                            ?>
                            <img id="img2" src="<?php echo $imagen; ?>">
                        </div>

                    </div>
                    <div class="col-md-6 order-md-2 padding-div">
                        <h2><?php echo $row['Titulo_Comic']; ?></h2>
                        <h4><?php echo MONEDA . $row['precio_comic']; ?></h4>
                        <p class="lead">
                            <?php echo $row['Descripcion_Comic']; ?>
                        </p>
                        <div class="d-grid gap-3 col-10 mx-auto">
                            <button class="btn btn-primary" type="button">Comprar ahora</button>
                            <button class="btn btn-outline-primary" type="button" onclick="addProducto(<?php echo $id; ?>)">Agregar al carrito</button>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

        </main>
        <script>
            function addProducto(id){
                let url = 'clases/carrito.php';
                let formData = new FormData()
                formData.append('id', $id)

                fetch(url,{
                    method: 'POST',
                    body: formData,
                    mode: 'cros' 
                })
            }
        </script>
    </body>

    </html>
    