<template>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Mis Entradas</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Evento</th>
                                <th>Fecha de Compra</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="entrada in entradas" :key="entrada.ID_USUARIO + entrada.ID_EVENTO">
                                <td>{{ entrada.evento.NOMBRE }}</td>
                                <td>{{ entrada.FECHA_ENTRADA }}</td>
                            </tr>
                            <tr v-if="entradas.length === 0">
                                <td colspan="2" class="text-center">No tienes entradas compradas</td>
                            </tr>
                        </tbody>
                    </table>
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
            entradas: [],
            user: window.user || null
        }
    },
    mounted() {
        if (this.user) {
            axios.get('entradasApi', {
                params: {
                    user_id: this.user.ID_USUARIO
                }
            })
            .then(response => {
                this.entradas = response.data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }
}
</script> 