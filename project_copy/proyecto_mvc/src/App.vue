<template>
  <div id="app">  
    <PageLogo class="title"/>
    <SearchContainer @movie-selected="updateSelectedMovie" />    
    </div>
</template>

<script>

const $ = require('jquery')
window.$ = $

import SearchContainer from './components/SearchContainer.vue'
import PageLogo from './components/PageLogo.vue'


export default {
  name: 'App',
  components:{
    SearchContainer,
    PageLogo,
  },
  data() {
    return {
      selectedMovie: null
    };
  },
  methods: {
    updateSelectedMovie(movie){
      this.selectedMovie = movie;
    }
    }
  
}
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');

:root{
    --md-dark-color:#1d1d1d;
    --dark-color: #171717;
    --light-dark-color: #313131;
    --orange-color: #ee5113;
}

*{
    padding: 10px;
    margin: 0;
    box-sizing: border-box;

}

img{
  width: 100px;

}
body{
    font-family: 'Inter', sans-serif;
}
a{
    text-decoration: none;
}


</style>

