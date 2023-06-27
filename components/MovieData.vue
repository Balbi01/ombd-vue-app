<template>
    <div id="movie-data">
        <h3 id="title"><b>Título: </b>Avengers Endgame</h3>
        <p id ="year"><b>Año: </b>2018</p>
        <p id ="rated"><b>Clasificación: </b>PG-13</p>
        <p id="released"><b>Estreno:</b> 27 de Abril de 2018</p>
        <p id="genre"><b>Género: </b>Acción, Aventura</p>
        <p id="actors"><b>Elenco: </b>Robert Downey Jr, Chris Evans, Tom Holland, Mark Ruffalo, Bennedict Cumberbacth</p>
        <p id="plot"><b>Sinopsis: </b>El todopoderoso Thanos ha despertado con la promesa de arrasar con todo a su paso, portando el Guantelete del Infinito, que le confiere un poder incalculable. Los únicos capaces de pararle los pies son los Vengadores y el resto de superhéroes de la galaxia, que deberán estar dispuestos a sacrificarlo todo por un bien mayor. Capitán América e Ironman deberán limar sus diferencias, Black Panther apoyará con sus tropas desde Wakanda, Thor y los Guardianes de la Galaxia e incluso Spider-Man se unirán antes de que los planes de devastación y ruina pongan fin al universo. ¿Serán capaces de frenar el avance del titán del caos?</p>

    </div>

</template>

<script>
export default{
    name: 'MovieData',
    props:{
        msg: String
    }
}

</script>

<style scoped>
#movie-data{
    text-align: center;
    color: #fff;
    padding-top: 3rem;
    font-size: 1.5rem;
    padding: 1rem;
    display: grid;
}
#title{
    font-size: 2rem;
    color: rgb(173, 46, 46);
}
#year{
    font-weight: 500;
}
#rated, #rated b{
    background-color: rgb(173, 46, 46);
    display: inline-block;
    padding: 0.5 rem;
    margin: 0.4rem;
    border-radius: 3px;
    font-weight: 600;
}
#genre, #genre b{
    background-color: var(--light-dark-color);
    display: inline-block;
    padding: 0.4rem;
    border-radius: 3px;
}
#plot, #plot b{
    max-width: 500px;
    margin: 1rem auto;
}



</style>