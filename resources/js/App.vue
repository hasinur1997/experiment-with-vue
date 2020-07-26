<template>
    <div>
        <Header></Header>
        <section>
            <div class="container">
                <router-view></router-view>
            </div>
        </section>
    </div>
</template>

<script>
    import Header from './components/Header'
    export default {
        name: 'App',
        components: {
            Header
        }
    }
</script>


