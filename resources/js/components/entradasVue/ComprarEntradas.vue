<template>
    <div>
        <div v-if="!mostrarConfirmacion">
            <button class="btn btn-primary" @click="mostrarConfirmacion = true">
                Comprar Entrada
            </button>
        </div>

        <div v-else>
            <p>¿Estás seguro que quieres comprar una entrada a este evento?</p>
            <button class="btn btn-success" @click="comprar">Sí</button>
            <button class="btn btn-danger" @click="mostrarConfirmacion = false">No</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'comprar-entradas',
    props: ['eventoId'],
    data() {
        return {
            mostrarConfirmacion: false,
            user: window.user || null
        }
    },
    methods: {
        comprar() {
            axios.post('entradasApi', {
                user_id: this.user.ID_USUARIO,
                event_id: this.eventoId
            })
            .then(() => {
                this.$emit('compra-realizada');
                this.mostrarConfirmacion = false;
            })
            .catch(() => {
                alert('Error al comprar la entrada');
            });
        }
    }
}
</script>

<style scoped>
.alert {
    margin-top: 10px;
    padding: 10px;
}
</style>