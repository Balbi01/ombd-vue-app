<template>
    <div class="search-element" id="box">
        <h3 id="movie-text">Buscar película</h3>
        <input type="text" class="form-control"
        placeholder="Buscar títulos: " id="movie-search-box" 

        
        
        
        ><!-- onkeyup="findMovies()" -->
    </div>
    


</template>

<script>
/* const movieSearchBox = document.getElementById('movie-search-box')
function findMovies(){
    let searchTerm = (movieSearchBox.value).trim():
    if(searchTerm.lenght > 0){
        
    }
} */

</script>

<style scoped>
#search-element{
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
}

#movie-search-box{
    background-color: var(--light-dark-color);
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;


}
#movie-text{
    color: white;
    font-size: 1.5rem;
    text-align: center;
    background-color: rgb(173, 46, 46);
    display: inline-block;

}
#box{
    align-items: center;
}
</style>