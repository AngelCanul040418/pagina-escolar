<template>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <div id="app" class="min-vh-100 bg-light">
    <header class="navbar text-white p-3 shadow-lg">
      <div class="d-flex align-items-center">
        <img src="@/assets/logo-U_T_P.png" alt="Logo" class="logo me-3" />
        <h2 class="h4 mb-0">Universidad Tecnológica del Poniente</h2>
      </div>
      <nav class="d-flex justify-content-center mt-3">
        <ul class="nav">
          <li class="nav-item">
            <router-link to="/" class="nav-link text-white">Inicio</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link text-white">Conocenos</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/ofertas" class="nav-link text-white">Ofertas Educativas</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/mejorOferta" class="nav-link text-white">Mejor Oferta Educativa</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/servicios" class="nav-link text-white">Servicios</router-link>
          </li>

          <li class="nav-item">
            <router-link to="/Contactos" class="nav-link text-white">Contactos</router-link>
          </li>
        </ul>
      </nav>
    </header>

    <!-- Main Content -->
    <div class="content p-4 bg-white rounded shadow-sm">
      <router-view />
      
      <!-- Authorities Section -->
      
    </div>

    <!-- Footer -->
    <footer class="footer text-center bg-gradient-to-r from-gray-800 via-gray-900 to-black text-white py-4">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center">
            <div class="mb-2 md:mb-0">
                <p class="text-sm md:text-base">
                    © 2024 Universidad Tecnológica del Poniente - Todos los derechos reservados
                </p>
            </div>
            <div class="flex space-x-4">
                <!-- Enlaces a redes sociales -->
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <i class="fab fa-facebook-f"></i>

                </a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="text-gray-400 hover:text-white transition duration-300">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-4 pt-2 text-xs text-gray-500">
            <p>Hecho con ❤️ por el equipo de desarrollo web</p>
        </div>
    </div>
</footer>

  </div>
</template>

<style scoped>
/* Main Layout */
#app {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  background-color: #f3f4f6;
  font-family: Avenir, Helvetica, Arial, sans-serif;
  color: #2c3e50;
}

/* Navbar Styles */
.navbar {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #800020; /* Rojo guinda */
  color: #ffffff;
  position: sticky;
  top: 0;
  z-index: 1000;
  width: 100%;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.navbar .logo {
  width: 50px;
  height: auto;
}

.navbar h2 {
  font-size: 1.5rem;
  font-weight: 600;
}

.nav {
  display: flex;
  gap: 10px;
  list-style: none;
  padding: 0;
  margin: 0;
}

.nav-link {
  padding: 10px 15px;
  border-radius: 6px;
  font-weight: bold;
  color: #ffffff;
  transition: background 0.3s, transform 0.2s;
  text-decoration: none;
}

.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.2);
}

.nav-link.router-link-exact-active {
  color: #42b983;
  background-color: #580101;
  font-weight: 600;
  box-shadow: inset 0 -3px 0 #ffffff;
}

/* Content Styles */
.content {
  background-color: #f9fafb;
  padding: 24px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  text-align: left;
  flex-grow: 1;
}



/* Footer Styles */
.footer {
  background-color: #333;
  color: #fff;
  padding: 10px 0;
  position: relative;
  width: 100%;
}

.footer .container p {
  margin-bottom: 0;
  font-size: 0.875rem;
}
</style>
