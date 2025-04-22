<!-- App.vue -->
<template>

   <div class="product-display">
    <div class="product-container">
        <div class="product-image">
            <!-- imagen -->
        </div>
        <div class="product-info">
      {{ entradas }}
    </div>
    </div>
   </div>

  </template>

  <script>
  export default {
    data() {
      return {
        entradas: 'Entradas'
      }
    }
  }
  </script>

  <style scoped>
  /* Puedes poner estilos aquí */
  </style>
