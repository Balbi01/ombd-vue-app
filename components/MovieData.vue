<template>
    <div id="movie-data">
        <h3 id="title"><b>Título: </b>{{ movie.Title }}</h3>
        <p id="year"><b>Año: </b>{{ movie.Year }}</p>
        <p id="rated"><b>Clasificación: </b>{{ movie.Rated }}</p>
        <p id="released"><b>Estreno: </b>{{ movie.Released }}</p>
        <p id="genre"><b>Género: </b>{{ movie.Genre }}</p>
        <p id="actors"><b>Elenco: </b>{{ movie.Actors }}</p>
        <p id="plot"><b>Sinopsis: </b>{{ movie.Plot }}</p>
    </div>

</template>

<script>
export default{
    name: 'MovieData',
    props:{
        movie: Object
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