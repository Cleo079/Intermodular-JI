<template>
    <div class="container mt-5">

      <div class="row">
        <div
          v-for="evento in eventos"
          :key="evento.ID_EVENTO"
          class="col-md-4 mb-4"
        >
          <div class="card h-100 shadow-sm">
            <img
              src="https://via.placeholder.com/300x150"
              class="card-img-top"
              alt="Imagen del evento"
            />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ evento.NOMBRE }}</h5>
              <p class="card-text">
                <strong>Fecha:</strong> {{ evento.FECHA }}<br />
                <strong>Lugar:</strong> {{ evento.LUGAR }}
              </p>
              <button
                class="btn btn-primary mt-auto"
                @click="comprarEntrada(evento.ID_EVENTO)"
              >
                Comprar Entrada
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Entrada generada -->
      <div v-if="entrada" class="mt-5">
        <div class="card border-success shadow-sm">
          <div class="card-header bg-success text-white">
            Entrada Generada
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ entrada.evento.NOMBRE }}</h5>
            <p class="card-text">
              <strong>Fecha de compra:</strong> {{ entrada.FECHA_ENTRADA }}<br />
              <strong>Fecha del evento:</strong> {{ entrada.evento.FECHA }}
            </p>
          </div>
        </div>
      </div>

    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        eventos: [],
        entrada: null,
        idUsuario: 1, // Simulado, cámbialo cuando tengas auth
      };
    },
    mounted() {
      fetch("http://localhost/Intermodular-JI/public/api/evento")
        .then((res) => res.json())
        .then((data) => (this.eventos = data));
    },
    methods: {
      comprarEntrada(idEvento) {
        fetch("http://localhost/Intermodular-JI/public/api/entradas", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            ID_USUARIO: this.idUsuario,
            ID_EVENTO: idEvento,
          }),
        })
          .then((res) => res.json())
          .then((data) => {
            this.entrada = data.entrada;
          });
      },
    },
  };
  </script>

  <style scoped>
  .card-img-top {
    object-fit: cover;
    height: 150px;
  }
  </style>
