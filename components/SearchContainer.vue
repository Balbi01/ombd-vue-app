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
            <h3>{{ selectedMovie.Title }}</h3>
            <p>{{ selectedMovie.Plot }}</p>
            <p>{{ selectedMovie.Genre }}</p>
            <p>{{ selectedMovie.Actors }}</p>
            <p>{{ selectedMovie.Rated }}</p>
            <p>{{ selectedMovie.Released }}</p>
            <p>{{ selectedMovie.Writer }}</p>
      <!--       <button @click="saveData">Guardar</button> -->
            <!-- Mostrar los demás datos de la película aquí -->
        </div>
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
           /*  saveData(){
            let mtitile, mplot, mgenre, mactors, mrated, mreleased, mwritter;

            mtitile = selectedMovie.Title;
            mgenre = selectedMovie.Genre;
            mplot = selectedMovie.Plot;
            mactors = selectedMovie.Actors;
            mrated = selectedMovie.Rated;
            mreleased = selectedMovie.Released;
            mwritter = selectedMovie.Writer;

            console.log(mtitile, mgenre, mplot, mactors, mrated, mreleased, mwritter);
        } */
        },
      


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
</style>