<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">  <!-- CSS tomado de bootstrap -->
</head>


<body>
    <div class="container">
        <div class= "row">
            <div class="col-xl-12">
            <h1>Listado de películas</h1>
            </div>
            <div class= "col-xl-12">
                <!-- Se envía el dato del número de tablas requeridas por el método GET -->
                <form class="form-inline" action ="index.php" method="GET"> 
                    <div class ="form-group mr-2">
                        <!-- Barra de selección de tablas -->
                        <label for="num-tablas">Cantidad de tablas:</label>
                        <!-- Tabla de selección limitada de 1 a 10, dato enviado por método GET -->
                        <input id="num-tablas" name="num-tablas" class="form-control" type="number" min="1" max="10" value="<?= $_GET['num-tablas'] ?? 5 ?>"> 
                    </div>
                </form>

                <table>
                    <!-- Barras de filtrado, datos enviados al backend a través de GET con input name -->
                    <tr>
                        <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="title" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="plot" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="genre" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="actors" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="rated" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="released" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>
                    <th><nav class="navbar navbar-light float-right">
                <form class="form-inline" action="index.php" method="GET">
                    <input name="writer" class="form-control mr-sm-2" type="search" placeholder="Filtrar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
                </nav></th>

                    </tr>
            
                <form method="post">
                    <!-- Headers de la tabla, también se agregó un botón que configura el link para reordenar los datos de manera ascendente -->
                        <tr>
                            <th><a href="?sort=title&direction=asc">Título: </a></th>
                            <th><a href="?sort=plot&directions=asc">Trama: </a></th>
                            <th><a href="?sort=genre&directions=asc">Género: </a></th>
                            <th><a href="?sort=actors&directions=asc">Actores: </a></th>
                            <th><a href="?sort=rated&directions=asc">Clasificación: </a></th>
                            <th><a href="?sort=released&directions=asc">Fecha de estreno: </a></th>
                            <th><a href="?sort=writer&directions=asc">Escritores: </a></th>
                        </tr>

                    
                <!-- PHP que toma los datos de la base de datos a través del Modelo de Eloquent y el Controlador, se iteran los datos n veces dependiendo del número de entradas en la base de datos y se agregan en la tabla -->
                <?php 
                foreach ($products as $product){
                    echo "
                        <tr>
                            <td>{$product->title}</td>
                            <td>{$product->plot}</td>
                            <td>{$product->genre}</td>
                            <td>{$product->actors}</td>
                            <td>{$product->rated}</td>
                            <td>{$product->released}</td>
                            <td>{$product->writer}</td>
                        </tr>
                    ";
                    

                }
                ?>
                <!-- Se cierra la tabla fuera de la iteración para que no se genere una nueva con cada entrada generada -->
                </table>

                <!-- Barra de paginación -->

                <nav aria-label="Barra de navegación">
                    <ul class="pagination justify-content-center">

                        <!-- Si la página actual es la segunda en adelante, aparecera el botón de página anterior -->
                        <?php if ($products->currentPage() > 1 ) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $products->currentPage() - 1 ?>">Anterior</a>
                            </li>
                        <?php endif; ?>
                        
                        <!-- Muestra la caja con el numero de resultados mostrados, así como el número de resultados totales -->
                        <li class="page-item disabled">
                            <span class="page-link">
                                Mostrando del <?= $products->firstItem() ?> al <?= $products->lastItem() ?> de un total de <?= $products->total() ?> resultados
                            </span>
                        </li>
                        <!-- Si la página actual es menor que la última página, se agrega un botón de siguiente que enlaza a la página siguiente -->
                        <?php if ($products->currentPage() < $products->lastPage()) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $products->currentPage() + 1 ?>">Siguiente</a>
                            </li>
                        <?php endif; ?>

                        <!-- Muestra los números de página disponibles para navegar entre los resultados y crea una URL con el número de página como parámetro y muestra cada número de página como un enlace. La página actual se resalta agregando la clase "active" al elemento li correspondiente. -->
                        <?php for ($i = 1; $i <= $products->lastPage(); $i++) : ?>
                        <?php
                            $queryParams = array_merge($_GET, ['page' => $i]);
                            $url = '?'.http_build_query($queryParams);
                        ?>
                        
                        <li class="page-item <?= $i == $products->currentPage() ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $url ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    
                </ul>
            </nav>
            <!-- Se agrega un botón para exportar la página actual a un PDF -->
                <hr>
                <p>
                    <a href="pdf.php">Exportar en PDF</a>
                </p>
            </div>
        </div>
    </div>

    <br></br>

    


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<style>
table, th, td{
    border: 1px solid black;

}

th, td {
    padding: 10px;
}

</style>











