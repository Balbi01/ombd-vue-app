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
                <form method="post">
                <table>
                        <tr>
                            <th>Título: </th>
                            <th>Trama: </th>
                            <th>Género: </th>
                            <th>Actores: </th>
                            <th>Clasificación: </th>
                            <th>Fecha de estreno: </th>
                            <th>Escritores: </th>
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
