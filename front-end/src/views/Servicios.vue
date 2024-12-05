<template>
  <div class="container-fluid py-3 bg-light">
    <header class="text-center mb-5">
      <h1 class="display-4 fw-bold">Nuestros Servicios</h1>
      <p class="lead text-muted">
        Descubre nuestros servicios destacados y cómo podemos ayudarte.
      </p>
    </header>

    <div v-if="!servicios.length" class="text-center py-5">
      <div class="spinner-border" role="status"></div>
      <p class="mt-3">Cargando servicios...</p>
    </div>

    <div v-else class="row g-4">
      <div
        v-for="(servicio, index) in servicios"
        :key="servicio.id"
        class="col-12"
        :class="{ 'animate-left': index % 2 === 0, 'animate-right': index % 2 !== 0 }"
        :ref="el => serviciosRefs[index] = el"
      >
        <div class="card h-100 shadow border-0">
          <div class="row g-0" :class="{ 'flex-row-reverse': index % 2 !== 0 }">
            <div class="col-md-4">
              <img
                v-if="servicio.imagen"
                :src="`http://localhost:8000/storage/${servicio.imagen}`"
                :alt="servicio.nombre"
                class="img-fluid rounded-start"
                style="object-fit: cover; height: 200px;"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title fw-bold">
                  {{ servicio.nombre }}
                </h5>
                <h6 class="card-subtitle mb-3 text-secondary">
                  <strong>Tipo:</strong> {{ servicio.tipo_de_servicio }}
                </h6>
                <p class="card-text">
                  {{ servicio.contenido || "Sin descripción disponible." }}
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      servicios: [],
      serviciosRefs: [],
    };
  },
  mounted() {
    this.fetchServicios();
  },
  updated() {
    this.initObserver();
  },
  methods: {
    fetchServicios() {
      axios
        .get("http://localhost:8000/api/list-Sevicio")
        .then((response) => {
          this.servicios = response.data.servicios;
        })
        .catch((error) => {
          console.error("Error al obtener los servicios:", error);
        });
    },
    initObserver() {
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("visible");
            }
          });
        },
        { threshold: 0.2 }
      );

      this.$nextTick(() => {
        this.serviciosRefs.forEach((el) => {
          if (el) observer.observe(el);
        });
      });
    },
  },
};
</script>

<style scoped>
.container-fluid {
  max-width: 1200px;
  margin: 0 auto;
}

h1 {
  font-size: 2.5rem;
  color: #800020;
}

p.lead {
  font-size: 1.25rem;
  color: #6c757d;
}

.card {
  border-radius: 16px;
  transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease, color 0.3s ease;
  background-color: #f8f9fa;
  border: 1px solid #dee2e6;
}

.card:hover {
  transform: translateY(-10px);
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  background-color: #343a40;
  color: #f8f9fa;
}

.card:hover h5.card-title {
  color: #ffc107;
}

.card:hover h6.card-subtitle {
  color: #adb5bd;
}

.card:hover p.card-text {
  color: #e9ecef;
}

.card-body h5.card-title {
  color: #800020;
}

.card-body h6.card-subtitle {
  color: #6c757d;
}

.card-body p.card-text {
  color: #212529;
}

.animate-left,
.animate-right {
  opacity: 0;
  transform: translateX(-50px);
  transition: all 0.6s ease-in-out;
}

.animate-right {
  transform: translateX(50px);
}

.animate-left.visible,
.animate-right.visible {
  opacity: 1;
  transform: translateX(0);
}

.spinner-border {
  width: 3rem;
  height: 3rem;
}
</style>
