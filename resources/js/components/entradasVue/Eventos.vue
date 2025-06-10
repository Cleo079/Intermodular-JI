<template>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Eventos Disponibles</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre del Evento</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="evento in eventos" :key="evento.ID_EVENTO">
                                        <td>{{ evento.NOMBRE }}</td>
                                        
                                        <td class="text-end">
                                            <button class="btn btn-success" @click="comprarEntrada(evento.ID_EVENTO)">
                                                Comprar Entradas
                                            </button>
                                        </td>
                                    </tr>
                                    <tr v-if="eventos.length === 0">
                                        <td colspan="2" class="text-center">No hay eventos disponibles</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            eventos: []
        };
    },
    mounted() {
        axios.get('eventoApi')
            .then(response => {
                this.eventos = response.data;
            })
            .catch(error => {
                console.log('Error:', error);
            });
    },
    methods: {
        comprarEntrada(idEvento) {
            // Aquí puedes implementar la lógica de compra
            console.log('Comprando entrada para el evento:', idEvento);
        }
    }
}
</script>

<style scoped>
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.table {
    margin-bottom: 0;
}

.btn-success {
    transition: all 0.3s ease;
}

.btn-success:hover {
    transform: translateY(-2px);
}
</style>