<template>
  <div>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" :href="landingUrl"><img :src="assets.ironCross" alt="" width="80rem"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="navbar-nav me-auto">
            <!-- Home -->
            <li class="nav-item">
              <a class="nav-link active" :href="landingUrl">Home</a>
            </li>

            <!-- Login solo si no hay usuario -->
            <li class="nav-item" v-if="!user">
              <a class="nav-link" :href="loginUrl">Login</a>
            </li>

            <!-- Crear Evento solo si es organizador -->
            <li class="nav-item" v-if="esFeriante">
              <a class="nav-link" :href="feriaUrl">Crear Evento</a>
            </li>

            <!-- Entradas disponible para todos los roles logueados -->
            <li class="nav-item" v-if="user">
              <a class="nav-link" :href="entradasUrl">Entradas</a>
            </li>

            <!-- Dropdown solo si hay usuario -->
            <li class="nav-item dropdown" v-if="user">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
              <div class="dropdown-menu">
                <!-- Usuarios solo para organizador -->
                <a class="dropdown-item" v-if="esOrganizador" :href="routes.usuarios">Usuarios</a>

                <!-- Eventos para todos -->
                <a class="dropdown-item" :href="routes.eventos">Eventos</a>

                <!-- Estands solo si NO es visitante -->
                <a class="dropdown-item" v-if="!esVisitante" :href="routes.estands">Estands</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data() {
    return {
      routes: window.routes,
      assets: window.assets,
      user: window.user || null
    };
  },
  computed: {
    landingUrl() {
      return 'http://localhost:80/Intermodular-JI/public/';
    },
    loginUrl() {
      return 'http://localhost:80/Intermodular-JI/public/login';
    },
    feriaUrl() {
      return 'http://localhost:80/Intermodular-JI/public/feriaregister';
    },
    entradasUrl() {
      return 'http://localhost:80/Intermodular-JI/public/entradas';
    },
    tipoUsuario() {
      return this.user?.TIPO_USUARIO?.toLowerCase();
    },
    esOrganizador() {
      return this.tipoUsuario === 'organizador';
    },
    esFeriante() {
      return this.tipoUsuario === 'feriante';
    },
    esExpositor() {
      return this.tipoUsuario === 'expositor';
    },
    esVisitante() {
      return this.tipoUsuario === 'visitante';
    }
  }
};
</script>

<style>
/* Puedes añadir estilos si lo necesitas */
</style>
