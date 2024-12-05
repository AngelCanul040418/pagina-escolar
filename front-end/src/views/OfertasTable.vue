<template>
  <div class="container my-4 p-4 bg-light rounded shadow-sm">
    <!-- Barra de búsqueda -->
    <div class="search-bar mb-4">
      <input type="text" v-model="buscar" placeholder="Buscar ofertas educativas..." class="form-control" />
    </div>

    <!-- Encabezado -->
    <header class="header mb-4 text-center">
      <h2 class="h4 text-white">Ofertas Educativas</h2>
    </header>

    <!-- Spinner de carga -->
    <div v-if="loading" class="text-center py-5">
      <div class="spinner-border text-primary" role="status"></div>
      <p class="mt-3 text-secondary">Cargando ofertas...</p>
    </div>

    <!-- Contenido principal -->
    <div v-else>
      <!-- Ofertas disponibles -->
      <div v-if="ofertasFiltradas.length > 0" class="row">
        <div v-for="oferta in ofertasFiltradas" :key="oferta.id" class="col-lg-4 col-md-6 mb-4">
          <div class="card oferta-card shadow h-100">
            <img v-if="oferta.imagen" :src="`http://localhost:8000/storage/${oferta.imagen}`" alt="Imagen de la oferta"
              class="card-img-top oferta-img" />
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">{{ oferta.nombre }}</h5>
              <p class="card-text mb-3">
                <strong>Etapa Inicial:</strong> {{ oferta.etapa_inicial }} <br />
                <strong>Duración Inicial:</strong> {{ oferta.duracion_cuatri_in }} cuatrimestres<br />
                <strong>Etapa Continuidad:</strong> {{ oferta.etapa_continuidad }} <br />
                <strong>Duración Continuidad:</strong> {{ oferta.duracion_cuatri_con }} cuatrimestres<br />
                <strong>Duración Total:</strong> {{ oferta.duracion_total_programa }} <br />
                <strong>Horas Totales:</strong> {{ oferta.horas_totales }} <br />
                <strong>Créditos Totales:</strong> {{ oferta.creditos_totales }}
              </p>
              <div class="mt-auto">
                <a v-if="oferta.mapa_curricular" :href="`http://localhost:8000/storage/${oferta.mapa_curricular}`"
                  target="_blank" class="btn btn-primary">
                  Ver Mapa Curricular
                </a>

                <p v-else class="text-muted text-center">
                  Mapa curricular no disponible
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Sin resultados -->
      <div v-if="ofertasFiltradas.length === 0" class="text-center">
        <div class="alert alert-warning" role="alert">
          <strong>No se encontraron resultados para:</strong> "{{ buscar }}"
        </div>
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
      buscar: "", 
      loading: true, 
    };
  },
  computed: {
   
    ofertasFiltradas() {
      if (!this.buscar) return this.ofertas; 
      const term = this.buscar.toLowerCase();
      return this.ofertas.filter((oferta) =>
        oferta.nombre.toLowerCase().includes(term)
      );
    },
  },
  mounted() {
    this.fetchOfertas(); 
  },
  methods: {
    
    fetchOfertas() {
      Swal.fire({
        title: "Cargando...",
        text: "Por favor espera mientras cargamos las ofertas.",
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading(),
      });

      axios
        .get("http://localhost:8000/api/list-of")
        .then((response) => {
          this.ofertas = response.data.ofertas;
        })
        .catch((error) => {
          console.error("Error al obtener las ofertas:", error);
        })
        .finally(() => {
          this.loading = false;
          Swal.close();
        });
    },
  },
};
</script>

<style scoped>
/* Contenedor general */
.container {
  max-width: 1200px;
  margin: auto;
  background-color: #ffffff;
  border-radius: 10px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

/* Barra de búsqueda */
.search-bar input {
  font-size: 1rem;
  padding: 12px;
  border-radius: 8px;
  border: 1px solid #ddd;
  transition: all 0.3s ease;
}

.search-bar input:focus {
  border-color: #800020;
  outline: none;
  box-shadow: 0 0 10px rgba(128, 0, 32, 0.2);
}

/* Encabezado */
.header {
  background: linear-gradient(90deg, #800020, #e04e4e);
  padding: 20px;
  border-radius: 8px;
  color: white;
}

.header h2 {
  margin: 0;
  font-weight: bold;
}

/* Tarjetas de ofertas */
.oferta-card {
  border: none;
  border-radius: 12px;
  background-color: #f8f9fa;
  transition: all 0.3s ease;
}

.oferta-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.card-title {
  font-size: 1.2rem;
  color: #800020;
  font-weight: bold;
}

.card-text {
  font-size: 0.9rem;
  color: #333;
  line-height: 1.6;
}

/* Spinner */
.spinner-border {
  width: 3rem;
  height: 3rem;
}

/* Alertas */
.alert {
  font-size: 1rem;
  padding: 15px;
  border-radius: 8px;
}

/* Imagen en las tarjetas */
.oferta-img {
  max-height: 200px;
  object-fit: cover;
  border-radius: 12px 12px 0 0;
}
</style>