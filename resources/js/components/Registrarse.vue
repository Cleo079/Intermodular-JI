vue <template>
    <div>
        <div class="d-flex justify-content-center align-items-center vh-100">
            <div class="card p-4 shadow-lg" style="width: 350px;">
                <h3 class="text-center mb-4">Registrarse</h3>
                <form @submit.prevent="registrarUsuario">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" v-model="usuario.Nombre" placeholder="Introduce tu nombre">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" v-model="usuario.Email" placeholder="Introduce tu email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" v-model="usuario.Contrasenya" placeholder="Introduce tu contraseña">
                    </div>

                    <div class="mb-3">
                        <label for="tipoUsuario" class="form-label">Tipo de usuario</label>
                        <select class="form-select" id="tipoUsuario" v-model="usuario.Tipo">
                            <option value="espectador">Espectador</option>
                            <option value="feriante">Feriante</option>
                        </select>
                    </div>

                    <div class="text-danger" v-if="error">{{ error }}</div>
                    <div class="text-success" v-if="mensaje">{{ mensaje }}</div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Registrarse</button>
                        <a href="{{ url('formulario') }}" class="btn btn-secondary">Iniciar Sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            usuario: {
                Nombre: '',
                Email: '',
                Contrasenya: '',
                Tipo: 'espectador'
            },
            mensaje: '',
            error: ''
        };
    },
    methods: {
        async registrarUsuario() {
            this.mensaje = '';
            this.error = '';
            try {
                const response = await axios.post('http://localhost/Intermodular-JI/public/api/usuario', this.usuario);
                this.mensaje = response.data.message;
                this.usuario = { Nombre: '', Email: '', Contrasenya: '', Tipo: 'espectador' };
            } catch (error) {
                this.error = error.response?.data?.error || 'Error al registrar usuario';
            }
        }
    }
};
</script>
