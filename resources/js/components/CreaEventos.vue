<template>
    <div>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card p-4 shadow-lg" style="width: 350px;">
                <h3 class="text-center mb-4">Crear Evento</h3>
                <form @submit.prevent="crearEvento">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" v-model="evento.Nombre" placeholder="Introduzca nombre Evento">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descripcion</label>
                        <textarea class="form-control" id="description" v-model="evento.Descripcion" placeholder="Introduzca descripcion"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="fecha" v-model="evento.Fecha">
                    </div>

                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora</label>
                        <input type="time" class="form-control" id="hora" v-model="evento.Hora">
                    </div>

                    <div class="mb-3">
                        <label for="lugar" class="form-label">Lugar</label>
                        <input type="text" class="form-control" id="lugar" v-model="evento.Lugar">
                    </div>

                    <div class="mb-3">
                        <label for="aforo" class="form-label">Aforo</label>
                        <input type="number" class="form-control" id="aforo" v-model="evento.Aforo">
                    </div>

                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-select" id="estado" v-model="evento.Estado">
                            <option value="activa">Activa</option>
                            <option value="inactiva">Inactiva</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicacion</label>
                        <input type="text" class="form-control" id="ubicacion" v-model="evento.Ubicacion">
                    </div>

                    <div class="mb-3">
                        <label for="id_organizador" class="form-label">Id_Organizador</label>
                        <input type="number" class="form-control" id="id_organizador" v-model="evento.Id_Organizador">
                    </div>

                    <div class="text-danger" v-if="error">{{ error }}</div>
                    <div class="text-success" v-if="mensaje">{{ mensaje }}</div>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Crear Evento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data(){
        return{
            evento:{
                Nombre: '',
                Descripcion: '',
                Fecha: '',
                Hora: '',
                Lugar: '',
                Aforo: '',
                Estado: '',
                Ubicacion: '',
                Id_Organizador: ''
            },
            mensaje: '',
            error: ''
        };
    },
    methods:{
        async crearEvento() {
            this.mensaje = '';
            this.error = '';
            try{
                const response = await axios.post('http://localhost/Intermodular-JI/public/api/evento', this.evento);
                this.mensaje = response.data.message;
                this.evento = {Nombre: '', Descripcion: '', Fecha: '', Hora: '', Lugar: '', Aforo: '', Estado: '', Ubicacion: '', Id_Organizador: ''};
            }catch(error){
                this.error = error.response?.data?.error || 'Error al crear evento';
            }
        }
    }
};
</script>
<style>

</style>
