<template>
  <div class="about container my-5 p-4 bg-light text-dark rounded shadow-lg">
    <!-- Introducción -->
    <section class="intro text-center mb-5">
      <h1 class="display-4 text-primary">Sobre Nosotros</h1>
      <p class="lead text-muted">Conoce nuestra historia, misión y valores</p>
      <hr class="my-4 bg-secondary">
    </section>

    <!-- Nuestra Historia -->
    <section class="history mb-5">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="h4 text-success">Nuestra Historia</h2>
          <p>
            Fundada en <strong>[Año de Fundación]</strong>, nuestra empresa ha crecido con el compromiso de ofrecer productos y servicios de alta calidad. Innovamos constantemente para satisfacer las necesidades de nuestros clientes, manteniendo siempre nuestros valores fundamentales.
          </p>
        </div>
        <div class="col-md-6 text-center">
          <img src="https://th.bing.com/th/id/R.49d8ef6c7747eaccec1b06498a0271b3?rik=ENUXnOo4CDnBHQ&riu=http%3a%2f%2futponiente.edu.mx%2futpold%2fimg%2fpanoramica.png&ehk=WRJ51DagpcL72S%2fQ%2fw4PuCUmONcbaN4wE1Rw%2bnNaE28%3d&risl=&pid=ImgRaw&r=0" alt="Nuestra Historia" class="img-fluid rounded shadow-sm about-img">
        </div>
      </div>
    </section>

    <!-- Misión y Visión -->
    <section class="mission-vision mb-5">
      <h2 class="h4 text-center mb-4 text-primary">Misión y Visión</h2>
      <div class="row text-center">
        <div class="col-md-6">
          <i class="bi bi-flag-fill display-4 mb-3 text-success"></i>
          <h3 class="h5 text-dark">Nuestra Misión</h3>
          <p>
            [En [Nombre de la Empresa], trabajamos para generar un impacto positivo en la vida de nuestros clientes y la sociedad mediante productos de calidad].
          </p>
        </div>
        <div class="col-md-6">
          <i class="bi bi-lightbulb-fill display-4 mb-3 text-warning"></i>
          <h3 class="h5 text-dark">Nuestra Visión</h3>
          <p>
            [Ser líderes en nuestro sector, reconocidos por nuestra innovación, calidad y compromiso con la sostenibilidad].
          </p>
        </div>
      </div>
    </section>

    <!-- Nuestros Valores -->
    <section class="values mb-5">
      <h2 class="h4 text-center mb-4 text-warning">Nuestros Valores</h2>
      <div class="row">
        <div class="col-md-3 text-center">
          <i class="bi bi-shield-check display-4 mb-3 text-info"></i>
          <h4 class="h6 text-dark">Integridad</h4>
          <p>Actuamos con honestidad y transparencia.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-brain display-4 mb-3 text-primary"></i>
          <h4 class="h6 text-dark">Innovación</h4>
          <p>Buscamos nuevas ideas y soluciones.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-handshake display-4 mb-3 text-success"></i>
          <h4 class="h6 text-dark">Compromiso</h4>
          <p>Nos esforzamos por superar expectativas.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-tree display-4 mb-3 text-warning"></i>
          <h4 class="h6 text-dark">Sostenibilidad</h4>
          <p>Minimizamos nuestro impacto ambiental.</p>
        </div>
      </div>
    </section>

    <!-- Nuestro Equipo -->
    <section class="team mb-5">
      <div class="row align-items-center">
        <div class="col-md-6 text-center">
          <img src="https://www.trener.mx/wp-content/uploads/2022/12/motivacion-equipo-de-trabajo.jpg" alt="Nuestro Equipo" class="img-fluid rounded shadow-sm about-img">
        </div>
        <div class="col-md-6">
          <h2 class="h4 text-primary">Nuestro Equipo</h2>
          <p>
            Contamos con profesionales apasionados y comprometidos con brindar la mejor experiencia a nuestros clientes. Fomentamos el trabajo en equipo y el desarrollo profesional.
          </p>
        </div>
      </div>
    </section>

    <!-- CTA: Contacto -->
    <section class="cta text-center mt-5">
      <h3 class="h5 text-primary">¿Te gustaría saber más sobre nosotros?</h3>
      <p>No dudes en <a href="/contactos" class="text-danger font-weight-bold">contactarnos</a>. ¡Estaremos encantados de atenderte!</p>
    </section>
  </div>
</template>

<script>
export default {
  name: "AboutUs",
};
</script>

<style scoped>
.container {
  max-width: 1000px;
  margin: auto;
}

h1, h2, h3, h4 {
  font-weight: bold;
  color: #343a40; /* Gris oscuro */
}

h3, h4 {
  color: #e8c218; /* Amarillo cálido */
}

img {
  max-height: 350px;
  transition: transform 0.3s ease;
}

img:hover {
  transform: scale(1.05);
}

i {
  color: #495057; /* Gris medio */
}

p, li {
  font-size: 1rem;
  line-height: 1.6;
  color: #5a5a5a; /* Gris más suave */
}

.cta a {
  text-decoration: underline;
  font-weight: bold;
}

.cta h3 {
  color: #007bff; /* Azul */
}

.about-img {
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.about-img:hover {
  box-shadow: 0 6px 10px rgba(0, 0, 0, 0.3);
}

/* Contorno o sombra al card */
.about {
  border: 2px solid #dee2e6; /* Contorno suave gris claro */
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra sutil */
  border-radius: 8px; /* Bordes redondeados */
}

.about:hover {
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada al hacer hover */
}

@media (max-width: 768px) {
  .about-img {
    max-height: 250px;
  }
}
</style>
