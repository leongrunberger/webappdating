<template>
    <div class="app">
        <Nav />
        <Welcome />
        <Footer />
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </div>
</template>

<script>

import Nav from './Nav.vue'
import Welcome from './Welcome.vue'
import Footer from './Footer.vue'

export default {
    components: {
        Nav,
        Welcome,
        Footer
    },
}


</script>

<style scoped>

</style>
