<template>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top bg-dark">
        <p class="col-md-4 mb-0 text-white">© 2024 Tankfest</p>

        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a :href="landingUrl" class="nav-link px-2 text-white">Home</a></li>
        <li class="nav-item"><a :href="routes.eventos" class="nav-link px-2 text-white">Eventos</a></li>
        <li class="nav-item"><a :href="routes.estands" class="nav-link px-2 text-white">Estands</a></li>
        </ul>
    </footer>
</template>
<script>
export default {
    data() {
        return {
            routes: window.routes,
            assets: window.assets
        };
    },
  computed: {
    landingUrl() {
        return 'http://localhost:80/Intermodular-JI/public/';
    }
  }
}
</script>
<style>

</style>
