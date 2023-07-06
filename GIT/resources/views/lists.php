<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>


<body>
    <div class="container">
        <div class= "row">
            <div class="col-xl-12">
            <h1>Listado de películas</h1>
            </div>
            <div class= "col-xs-12">
                <form class="form-inline" action ="index.php" method="GET">
                    <div class ="form-group mr-2">
                        <label for="num-tablas">Cantidad de tablas:</label>
                        <input id="num-tablas" name="num-tablas" class="form-control" type="number" min="1" max="10" value="<?= $_GET['num-tablas'] ?? 5 ?>">
                    </div>
                </form>

                <table>
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
                        <tr>
                            <th><a href="?sort=title&direction=asc">Título: </a></th>
                            <th><a href="?sort=plot&directions=asc">Trama: </a></th>
                            <th><a href="?sort=genre&directions=asc">Género: </a></th>
                            <th><a href="?sort=actors&directions=asc">Actores: </a></th>
                            <th><a href="?sort=rated&directions=asc">Clasificación: </a></th>
                            <th><a href="?sort=released&directions=asc">Fecha de estreno: </a></th>
                            <th><a href="?sort=writer&directions=asc">Escritores: </a></th>
                        </tr>

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
                </table>

                <nav aria-label="Barra de navegación">
                    <ul class="pagination justify-content-center">
                        <?php if ($products->currentPage() > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="<?= $products->previousPageUrl() ?>">Anterior</a>
                            </li>
                        <?php endif; ?>

                        <li class="page-item disabled">
                            <span class="page-link">
                                Mostrando del <?= $products->firstItem() ?> al <?= $products->lastItem() ?> de un total de <?= $products->total() ?> resultados
                            </span>
                        </li>

                        <?php if ($products->currentPage() < $products->lastPage()) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?= $products->currentPage() + 1 ?>">Siguiente</a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $products->lastPage(); $i++) : ?>
                        <?php
                            $queryParams = array_merge($_GET, ['page' => $i]);
                            $url = '?'.http_build_query($queryParams);
                        ?>
                        <li class="page-item <?= $i == $products->currentPage() ? 'active' : '' ?>">
                            <a class="page-link" href="<?= $url ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if ($products->currentPage() < $products->lastPage()) : ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $products->nextPageUrl() ?>">Siguiente</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
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











