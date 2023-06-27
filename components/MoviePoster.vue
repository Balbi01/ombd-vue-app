<template>
    <div id="movie-poster">
        <img src="../assets/cover-1.jpg" alt="movieposter">

    </div>
</template>

<script>
export default{
    name: 'MoviePoster',
}


</script>

<style scoped>
img{
    width: 100%;
    display: block;
}
#movie-poster{
    max-width: 500px;
    margin: 0 auto;
    border: 4px solid #fff;
}

</style>