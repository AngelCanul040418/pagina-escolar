<template>
  <div class="container my-5 p-4 bg-light rounded shadow-lg">
    <header class="header mb-4">
      <h2 class="h4 text-white text-center">La Mejor Oferta Educativa</h2>
    </header>

    <div v-if="loading" class="text-center py-5">
      <div class="spinner-border text-primary" role="status"></div>
      <p class="mt-3">Cargando la mejor oferta...</p>
    </div>

    <div v-else>
      <div v-if="ofertas.length > 0" class="card oferta-card mx-auto shadow-lg">
        <div class="card-header text-white bg-primary text-center">
          <h5 class="mb-0">{{ ofertas[ofertas.length - 1].oferta_educativa?.nombre || "N/A" }}</h5>
        </div>
        <div class="card-body">
          <p class="card-text">
            <strong>Etapa Inicial:</strong> {{ ofertas[ofertas.length - 1].etapa_inicial }}
          </p>
          <p class="card-text">
            <strong>Etapa Continuidad:</strong> {{ ofertas[ofertas.length - 1].etapa_continuidad }}
          </p>
        </div>
        <div class="card-footer text-muted text-center">
          Actualizado automáticamente cada 10 segundos
        </div>
      </div>

      <div v-else class="alert alert-warning text-center">
        <strong>No hay ofertas disponibles.</strong>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  data() {
    return {
      ofertas: [], 
      loading: true, 
      isFirstLoad: true, 
    };
  },
  mounted() {
    this.fetchOfertas();
    this.autoRefresh();
  },
  beforeDestroy() {
    clearInterval(this.refreshInterval); 
  },
  methods: {
    fetchOfertas() {
      if (this.isFirstLoad) {
        Swal.fire({
          title: "Cargando...",
          text: "Por favor espera mientras cargamos la oferta.",
          showConfirmButton: false,
          allowOutsideClick: false,
          didOpen: () => Swal.showLoading(),
        });
      }

      axios
        .get("http://localhost:8000/api/mejor-oferta")
        .then((response) => {
          this.ofertas = response.data.ofertas;
        })
        .catch((error) => {
          console.error("Error al obtener la oferta:", error);
        })
        .finally(() => {
          this.loading = false;
          Swal.close();
          if (this.isFirstLoad) this.isFirstLoad = false;
        });
    },
    autoRefresh() {
      this.refreshInterval = setInterval(() => {
        this.fetchOfertas();
      }, 10000);
    },
  },
};
</script>

<style scoped>
.header {
  background-color: #800020; 
  padding: 15px 20px;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.header h2 {
  margin: 0;
  font-weight: bold;
  color: #fff;
}

.oferta-card {
  max-width: 500px;
  border-radius: 10px;
  overflow: hidden;
}

.oferta-card .card-header {
  font-weight: bold;
  font-size: 1.2rem;
}

.oferta-card .card-body {
  padding: 20px;
  font-size: 1rem;
}

.oferta-card .card-footer {
  font-size: 0.85rem;
  background-color: #f8f9fa;
}

/* Spinner */
.spinner-border {
  width: 3rem;
  height: 3rem;
}
</style>
