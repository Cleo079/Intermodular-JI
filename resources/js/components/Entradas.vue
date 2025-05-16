<template>
    <div class="container mt-5">

      <div class="row">
        <p>Carrito({{ carrito }})</p>

      </div>

    </div>
  </template>

  <script>
  export default {
    data() {//eliminar todo menos carrito
      return {
        carrito: 0
      };
    },
    methods: {//dejar el apartado methods pero vacia

    },
  };
  </script>

  <style scoped>


  </style>
