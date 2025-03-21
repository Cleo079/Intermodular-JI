<template>
    <!-- <div>
        <nav>
            <ul>
                <li><a href=""><img src="../../img/d37d71157227099fc2e46ff70a09572d.jpg" alt="Hannya mask" width="80rem"></a></li>
                <li><a href="">Result</a></li>
                <li><a href="">Ullr</a></li>
            </ul>
        </nav>
    </div> -->
    <div>
        <header>
            <nav class="navbar">
            <div class="logo">MiLogo</div>
            <div class="hamburger" id="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="nav-menu" id="nav-menu">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Servicios</a></li>
                <li><a href="#">Acerca de</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            </nav>
        </header>
    </div>
</template>
<script>
const hamburger = document.getElementById("hamburger");
const navMenu = document.getElementById("nav-menu");

hamburger.addEventListener("click", () => {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
});
</script>
<style>
/* ul{
    position: sticky;
    top: 0;
}
li{
    display: inline;
}
a{
    padding: 8px;
    text-decoration: none;
} */
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background-color: #333;
  padding: 10px 20px;
}

.logo {
  color: white;
  font-size: 24px;
  font-weight: bold;
}

.nav-menu {
  list-style: none;
  display: flex;
  margin: 0;
  padding: 0;
}

.nav-menu li {
  margin-left: 20px;
}

.nav-menu a {
  color: white;
  text-decoration: none;
  font-size: 18px;
}

/* Estilos para el menú hamburguesa */
.hamburger {
  display: none;
  flex-direction: column;
  cursor: pointer;
}

.bar {
  width: 25px;
  height: 3px;
  background-color: white;
  margin: 4px 0;
}

/* Estilos responsivos */
@media (max-width: 768px) {
  .hamburger {
    display: flex;
  }

  .nav-menu {
    position: absolute;
    top: 60px;
    left: -100%;
    flex-direction: column;
    background-color: #333;
    width: 100%;
    text-align: center;
    transition: 0.3s;
  }

  .nav-menu.active {
    left: 0;
  }

  .nav-menu li {
    margin: 15px 0;
  }
}

</style>
