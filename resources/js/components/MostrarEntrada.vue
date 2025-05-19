<template>
    <div class="container mb-5">
        <div
          v-for="evento in eventos"
          :key="evento.ID_EVENTO">
          <div class="card h-100 shadow-sm mb-5">
            <img
              :src="imagen"
              class="card-img-top"
              alt="Imagen del evento"
            />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ titulo + ' ' + evento.NOMBRE }}</h5>
              <p class="card-text">
                <strong>Fecha:</strong> {{ evento.FECHA }}<br />
                <strong>Lugar:</strong> {{ evento.LUGAR }}<br />
                <strong>Aforo:</strong> {{ evento.AFORO }}<br />
                <strong>Entradas:</strong> {{ evento.ENTRADAS }}<br />
              </p>
              <div v-for="(variante, indice) in variante"
              :key="variante.id"
              @click="updateVariante(indice)"
              class="circulo"><button class="botonVariante">{{ variante.text }}</button></div>
              <p v-if="stock > 10" class="card-text">Stock</p>
              <p v-else-if="stock <= 10 && stock > 0" class="card-text">Poco Stock</p>
              <p v-else="stock" class="card-text">No Stock</p>
              <button
                class="btn btn-primary mt-auto"
                @click="anadirCarro(), comprarEntrada(evento.ID_EVENTO)"
                :disabled="!stock">Comprar Entrada</button>
                <br>
                <button
                class="btn btn-danger mt-auto"
                @click="desanadirCarro()">Descomprar Entrada</button>
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
</template>
<script>
export default {
data() {
      return {
        marca: 'Entradas para',
        varianteSeleccionada: 0,
        eventos: [],
        entrada: null,
        idUsuario: 1, // Simulado, cámbialo cuando tengas auth
        variante: [
            {id: 1024, text: 'Entrada Estandard', imagen: '../public/imgs/IS-2.jpg', cantidad: 50},
            {id: 1025, text: 'Entrada Evento', imagen: '../public/imgs/evento_special.jpg', cantidad: 0},
        ]
      };
    },
    mounted() {
        axios
        .get('evento')
        .then(response => {
            console.log(response)
            this.eventos = response.data
        })
    },
    // mounted() {
    //   fetch("http://localhost/Intermodular-JI/public/api/evento")
    //     .then((res) => res.json())
    //     .then((data) => (this.eventos = data));
    // },
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
      anadirCarro() {
        this.$emit('anadir-carro', this.variante[this.varianteSeleccionada].id)
      },
      desanadirCarro(){
        this.$emit('quitar-carro', this.variante[this.varianteSeleccionada].id);
      },
      updateVariante(indice) {
        this.varianteSeleccionada = indice
      }
    },
    computed: {
        titulo() {
            return this.marca
        },
        imagen() {
            return this.variante[this.varianteSeleccionada].imagen
        },
        stock() {
            return this.variante[this.varianteSeleccionada].cantidad
        }
    }
}
</script>
<style scoped>
:root{
    ---whiteColor: #FDFDFF;
    ---blackColor: #181818;
    ---darkgreenColor: #1D361D;
    ---greenColor: #3f873f;
    ---oliveGreenColor: #7A9F24;
    ---brownColor: #6C480F;
    ---lightbrownColor: #9f683e;
}

  .card-img-top {
    object-fit: cover;
    height: 150px;
  }
  .circulo {
    margin-top: 8px;
    cursor: default;
  }
  .botonVariante{
    background-color: var(---darkgreenColor);
    color: var(---whiteColor);
    border-radius: 5px;
  }
</style>
