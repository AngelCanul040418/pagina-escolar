<template>
  <div class="about container my-5 p-4 bg-light rounded shadow">
    <!-- Introducción -->
    <section class="intro text-center mb-5">
      <h1 class="display-4">Sobre Nosotros</h1>
      <p class="lead text-muted">Conoce nuestra historia, misión y valores</p>
      <hr class="my-4">
    </section>

    <!-- Nuestra Historia -->
    <section class="history mb-5">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h2 class="h4">Nuestra Historia</h2>
          <p>
            Fundada en <strong>[Año de Fundación]</strong>, nuestra empresa ha crecido con el compromiso de ofrecer productos y servicios de alta calidad. Innovamos constantemente para satisfacer las necesidades de nuestros clientes, manteniendo siempre nuestros valores fundamentales.
          </p>
        </div>
        <div class="col-md-6 text-center">
          <img src="/images/history.jpg" alt="Nuestra Historia" class="img-fluid rounded shadow-sm">
        </div>
      </div>
    </section>

    <!-- Misión y Visión -->
    <section class="mission-vision mb-5">
      <h2 class="h4 text-center mb-4">Misión y Visión</h2>
      <div class="row text-center">
        <div class="col-md-6">
          <i class="bi bi-flag-fill display-4 mb-3"></i>
          <h3 class="h5">Nuestra Misión</h3>
          <p>
            [En [Nombre de la Empresa], trabajamos para generar un impacto positivo en la vida de nuestros clientes y la sociedad mediante productos de calidad].
          </p>
        </div>
        <div class="col-md-6">
          <i class="bi bi-lightbulb-fill display-4 mb-3"></i>
          <h3 class="h5">Nuestra Visión</h3>
          <p>
            [Ser líderes en nuestro sector, reconocidos por nuestra innovación, calidad y compromiso con la sostenibilidad].
          </p>
        </div>
      </div>
    </section>

    <!-- Nuestros Valores -->
    <section class="values mb-5">
      <h2 class="h4 text-center mb-4">Nuestros Valores</h2>
      <div class="row">
        <div class="col-md-3 text-center">
          <i class="bi bi-shield-check display-4 mb-3"></i>
          <h4 class="h6">Integridad</h4>
          <p>Actuamos con honestidad y transparencia.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-brain display-4 mb-3"></i>
          <h4 class="h6">Innovación</h4>
          <p>Buscamos nuevas ideas y soluciones.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-handshake display-4 mb-3"></i>
          <h4 class="h6">Compromiso</h4>
          <p>Nos esforzamos por superar expectativas.</p>
        </div>
        <div class="col-md-3 text-center">
          <i class="bi bi-tree display-4 mb-3"></i>
          <h4 class="h6">Sostenibilidad</h4>
          <p>Minimizamos nuestro impacto ambiental.</p>
        </div>
      </div>
    </section>

    <!-- Nuestro Equipo -->
    <section class="team mb-5">
      <div class="row align-items-center">
        <div class="col-md-6 text-center">
          <img src="/images/team.jpg" alt="Nuestro Equipo" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-md-6">
          <h2 class="h4">Nuestro Equipo</h2>
          <p>
            Contamos con profesionales apasionados y comprometidos con brindar la mejor experiencia a nuestros clientes. Fomentamos el trabajo en equipo y el desarrollo profesional.
          </p>
        </div>
      </div>
    </section>

    <!-- CTA: Contacto -->
    <section class="cta text-center mt-5">
      <h3 class="h5">¿Te gustaría saber más sobre nosotros?</h3>
      <p>No dudes en <a href="/contacto" class="text-primary font-weight-bold">contactarnos</a>. ¡Estaremos encantados de atenderte!</p>
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
  color: #800020;
}

img {
  max-height: 300px;
}

i {
  color: #4a4a4a; /* Gris oscuro */
}

p, li {
  font-size: 1rem;
  line-height: 1.6;
}

.cta a {
  text-decoration: underline;
}
</style>
