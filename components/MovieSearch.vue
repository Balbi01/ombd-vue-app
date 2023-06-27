<template>
    <div>
        <input type="text" v-model="searchTerm" placeholder="Buscar película">
        <button @click="searchMovies">Buscar</button>
        <ul>
            <li v-for="movie in movies" :key="movie.imdbID">{{ movie.Title }}</li>
        </ul>
    </div>
</template>
  
<script>

const $ = require('jquery')
window.$ = $

export default {
    data() {
        return {
            searchTerm: '',
            movies: []
        };
    },
    methods: {
        searchMovies() {
            const apiKey = '8efb52d2'; // Reemplaza con tu propia clave de API
            const url = `https://www.omdbapi.com/?apikey=${apiKey}&s=${this.searchTerm}`;

            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: (response) => {
                    if (response.Response === 'True') {
                        this.movies = response.Search;
                    } else {
                        this.movies = [];
                        console.log('No se encontraron películas.');
                    }
                },
                error: (error) => {
                    console.error('Error al buscar películas:', error);
                }
            });
        }
    }
};
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

:root{
    --md-dark-color:#1d1d1d;
    --dark-color: #171717;
    --light-dark-color: #313131;
    --orange-color: #ee5113;
}



</style>
  