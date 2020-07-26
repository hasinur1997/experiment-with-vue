<template>
    <nav class="tabs">
        <div class="container">
            <ul>
                <router-link tag="li" to="/" exact>
                    <a href="#">Home</a>
                </router-link>
                <router-link tag="li" to="/about">
                    <a href="#">About</a>
                </router-link>
                <router-link tag="li" to="/contact">
                    <a href="#">Contact</a>
                </router-link>
                <router-link tag="li" to="/project">
                    <a href="#">Project</a>
                </router-link>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'NavBar'
    }
</script>