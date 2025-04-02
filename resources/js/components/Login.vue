<template>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 350px;">
            <h3 class="text-center mb-4">Login</h3>
            <form @submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input v-model="email" type="email" class="form-control" id="email" placeholder="Introduce tu email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input v-model="contrasenya" type="password" class="form-control" id="password" placeholder="Introduce tu contraseña">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </div>
                <p v-if="error" class="text-danger text-center mt-3">{{ error }}</p>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            email: '',
            contrasenya: '',
            error: ''
        };
    },
    methods: {
    async login() {
        this.error = ''; // Reiniciar el error
        try {
            const response = await axios.post('http://localhost/Intermodular-JI/public/api/usuario/login', {
                email: this.email,
                contrasenya: this.contrasenya
            });

            // Verificar si la respuesta contiene el usuario
            if (response.data && response.data.usuario) {
                console.log('Usuario autenticado:', response.data.usuario);

                // Guardar usuario en localStorage
                localStorage.setItem('usuario', JSON.stringify(response.data.usuario));

                // // Redireccionar
                // this.$router.push('/landing');
            } else {
                this.error = 'No se recibió información de usuario válida.';
            }
        } catch (err) {
            // Manejo del error
            this.error = err.response?.data?.error || 'Error al iniciar sesión';
        }
    }
}

};
</script>
