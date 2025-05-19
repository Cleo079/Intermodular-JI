<template>
    <div class="container mt-5">

      <div class="row">
        <p>Carrito({{ carrito.length }})</p>

        <most-entrada @anadir-carro="updateCarrito" @quitar-carro="removeCarrito"></most-entrada>
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
        },
        removeCarrito(id) {
    const index = this.carrito.lastIndexOf(id);
    if (index !== -1) {
      this.carrito.splice(index, 1);
    }
  }
    },
  };
  </script>

  <style scoped>


  </style>
