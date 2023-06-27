<template>
    <div id="logo">
        <h1>Reel<span>Corn.</span></h1>
    </div>


</template>

<script>
export default{
    name: 'PageLogo',
    props:{
        msg: String
    }
}

</script>

<style scoped>

#logo {
    font-size: 3rem;
    color: white;
    font-weight: bold;
    background-color: var(--light-dark-color);
}
#logo h1 span{
    color: rgb(173, 46, 46);
    font-weight: 650
}


</style>