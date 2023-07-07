<template>
    <div class="search-element" id="box">
        <h3 id="movie-text">Buscar película</h3>
        <input type="text" v-model="searchTerm" placeholder="Buscar títulos: " id="movie-search-box">
        <button @click="loadMovies">Buscar</button>
        <ul>
            <li v-for="movie in movies" :key="movie.imdbID" @click="selectMovie(movie)">
                {{ movie.Title }}
            </li>
        </ul>
        <button v-if="selectedMovie" @click="showMovieDetails">Mostrar película</button>
        <div v-if="selectedMovie">
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
                <tr>
                    <td>{{ selectedMovie.Title }}</td>
                    <td>{{ selectedMovie.Plot }}</td>
                    <td>{{ selectedMovie.Genre }}</td>
                    <td>{{selectedMovie.Actors}}</td>
                    <td>{{ selectedMovie.Rated }}</td>
                    <td>{{ selectedMovie.Released }}</td>
                    <td>{{ selectedMovie.Writer }}</td>
                </tr>
            </table>
            <a href = 'http://localhost/proyecto_mvc/public/'>Base de Datos de películas</a>

        </div>
        <button id ="saveButton" @click="saveData">Guardar</button>
    </div>
</template>
 
  
<script>
const $ = require('jquery')
window.$ = $


export default {
    data() {
        return {
            searchTerm: '',
            movies: [],
            selectedMovie: null
        };
    },
    methods: {
        loadMovies() {
            const apiKey = '8efb52d2';
            const url = `https://www.omdbapi.com/?apikey=${apiKey}&s=${this.searchTerm}`;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: (response) => {
                    if (response.Response === 'True') {
                        this.movies = response.Search;
                        console.log(this.movies);
                    } else {
                        this.movies = [];
                        console.log('No se encontraron películas');
                    }
                },
                error: (error) => {
                    console.error('Error al buscar películas', error);
                }
            });
        },
        selectMovie(movie) {
            this.selectedMovie = movie;
        },
        showMovieDetails() {
            const apiKey = '8efb52d2';
            const url = `https://www.omdbapi.com/?apikey=${apiKey}&i=${this.selectedMovie.imdbID}`;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: (response) => {
                    if (response.Response === 'True') {
                        this.selectedMovie = response;
                        console.log(this.selectedMovie);
                    } else {
                        this.selectedMovie = null;
                        console.log('No se encontró la información de la película');
                    }
                },
                error: (error) => {
                    console.error('Error al obtener detalles de la película', error);
                }
                
            });

            
        },
        saveData(){
            let mtitile, mplot, mgenre, mactors, mrated, mreleased, mwritter;

            mtitile = this.selectedMovie.Title;
            mgenre = this.selectedMovie.Genre;
            mplot = this.selectedMovie.Plot;
            mactors = this.selectedMovie.Actors;
            mrated = this.selectedMovie.Rated;
            mreleased = this.selectedMovie.Released;
            mwritter = this.selectedMovie.Writer;

            var nArray = new Array(7)

            nArray[0] = mtitile
            nArray[1] = mgenre
            nArray[2] = mplot
            nArray[3] = mactors
            nArray[4] = mrated
            nArray[5] = mreleased
            nArray[6] = mwritter



            $.ajax({
                url: 'http://localhost/proyecto_mvc/app/models/post.php',
                type: 'POST',
                data: {'nArray': JSON.stringify(nArray)},
                success: function(response) {
                    console.log('Hecho', response);
                },
                error: function(xhr, status, error) {
                    console.log('No hecho');
                    console.error(error);
                }
                });
        }
    }
};
</script>
  
<style scoped>
#search-element {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

#movie-search-box {
    height: 80px;
    font-size: 1.5rem;
    align-items: center;
    position: center;
    justify-content: center;
    margin: 20px;
    text-align: center;


}

#movie-text {
    font-size: 2rem;
    text-align: center;

}

#box {
    align-items: center;
}

table, th, td{
    border: 1px solid black;

}

th, td {
    padding: 10px;
}
</style>