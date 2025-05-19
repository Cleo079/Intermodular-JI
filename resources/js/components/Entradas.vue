<template>
    <div class="container mt-5">

      <div class="row">
        <p>Carrito({{ carrito.length }})</p>

        <most-entrada @anadir-carro="updateCarrito"></most-entrada>
      </div>

    </div>
  </template>

  <script>
  export default {
    data() {//eliminar todo menos carrito
      return {
        carrito: []
      };
    },
    methods: {//dejar el apartado methods pero vacia
        updateCarrito(id){
            this.carrito.push(id)
        }
    },
  };
  </script>

  <style scoped>


  </style>
