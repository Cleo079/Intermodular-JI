<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="../../img/logo_prueba_2.jfif" alt="" width="80rem"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link active" href="#">Home
                    <span class="visually-hidden">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ url('usuario') }}">Usuarios</a>
                </div>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
</template>
<script>

</script>
<style>

</style>
