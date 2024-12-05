<template>
 <center> <h1 style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Universidad Tecnológica del Poniente</h1></center>
  <div class="carousel-container">
    <div class="carousel-images">
      <div
        v-for="(image, index) in images"
        :key="image.id"
        class="carousel-item"
        :class="{ active: index === currentIndex }"
      >
        <img :src="`http://localhost:8000/storage/${image.path}`" alt="Carousel Image" />
      </div>
    </div>

    <!-- Navegación con puntos -->
    <div class="carousel-nav">
      <span
        v-for="(image, index) in images"
        :key="image.id"
        :class="{ active: index === currentIndex }"
        class="carousel-dot"
        @click="goToSlide(index)"
      ></span>
    </div>
    
  </div>
  <div>
    <div class="quick-access">
    <h2>Accesos rápidos</h2>
    <h1>Selecciona la Información o servicios que requieras consultar.</h1>
    <h4>En esta sección puedes ubicar de manera rápida la información o servicio que necesites consultar.</h4>
  </div>
    <div class="card-dash">
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/inscripciones_.png" alt="">
      </div>
      <h4>
        PROCESO DE INSCRIPCIÓN, REINSCRIPCIÓN Y REINGRESO</h4>
      <p>SEPTIEMBRE-DICIEMBRE 2024</p>
    </div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/product-management.png" alt="">
      </div>
      <h4>
RESULTADOS EXANI II
Examen del 19 de julio</h4>
      <p>
      Proceso del 19 de julio: Los resultados estarán disponibles el día viernes 07 de agosto</p>
    </div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/informe-de-datos.png" alt="">
      </div>
      <h4>INFORMACIÓN DE ESTADIAS PROFECIONALES</h4>
      <p>TECNICO SUPERIOR UNIVERSITARIO MAYO-AGOSTO 2O24</p>
    </div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/calendario3.png" alt="">
      </div>
      <h4>Calendario</h4>
      <p>Consulta nuestro "Calendario Escolar y de Actividades Académico-Administrativas", del ciclo escolar 2024-2025

</p>
    </div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/calendario.png" alt="">
      </div>
      <h4>Agenda una cita desde Facebook</h4>
      <p>


        Agenda una cita desde nuestra página de facebook "Control Escolar-UTP" y dale click al botón azul "Reservar ahora"; y acude a la Universidad a realizar tus trámites.
      </p>
</div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/certificado.png" alt="">
      </div>
      <h4>Obtén tu Cédula Profesional Electrónica</h4>
      <p>Si eres egresado 2018 en adelante, y ya cuentas con tu firma electróncia del SAT, ya puedes obtener tu Cédula Profesional Electrónica. Es indispensable para acudir a recoger tus documentos de egreso.

</p>
    </div>
  </div>
  <div class="card">
    <div class="icon-box animate-hover">
      <div class="text-center p-2">
        <img class="image" src="@/assets/reglas.png" alt="">
      </div>
      <h4>Reglamento de Alumnos</h4>
      <p>

Consulta nuestro "Reglamento de Ingreso, Permanencia y Egreso de Alumnos de la UTP" (RAPEA-UTP), y conoce tus derechos y obligaciones.</p>
    </div>
  </div>
</div>

  </div>
  <div>
    <section class="authorities mt-4">
        <h3 class="text-center">Autoridades de la Universidad</h3>
        <div class="d-flex authorities-row mt-3">
          <div class="text-center authority-item">
            <img src="@/assets/RECTOR.jpg" alt="Rector" class="img-fluid mb-2">
            <h5>Mtro. Rafael Chan Magaña</h5>
            <p class="text-muted">Rector</p>
          </div>
          <div class="text-center authority-item">
            <img src="@/assets/VINCULACION.jpg" alt="Vinculación" class="img-fluid mb-2">
            <h5>Mtra. Josefina Maribel Quintal Rosado</h5>
            <p class="text-muted">Directora de vinculación</p>
          </div>
          <div class="text-center authority-item">
            <img src="@/assets/FINANZAS_.jpg" alt="Finanzas" class="img-fluid mb-2">
            <h5>C.P. Carlos Joan Montero Chi</h5>
            <p class="text-muted">Director de administración y finanzas</p>
          </div>
          <div class="text-center authority-item">
            <img src="@/assets/CARRERAS.jpg" alt="Carreras" class="img-fluid mb-2">
            <h5>Mtro. Julio Hernán Che Zapata</h5>
            <p class="text-muted">Director de carreras</p>
          </div>
        </div>
      </section>
  </div>
  
  <div class="quick-access">
    <h2>COSTOS</h2>
    <h1>Costo educativo: Cuotas</h1>
    <h4>El pago de las cuotas se realiza al inicio de cada cuatrimestre.</h4>
  </div>
  <div class="card-dash">
    <div class="card cost-card">
      <h4 class="card-title">Costo educativo: Cuotas</h4>
      <p class="card-description">El pago de las cuotas se realiza al inicio de cada cuatrimestre.</p>
    </div>

    <div class="card cost-card">
      <h4 class="card-title">Registro EXANI II / Registro TSU</h4>
      <p class="card-price">$350 / por examen</p>
      <p class="card-description">El pago corresponde al costo del EXANI II y/o al registro al nivel TSU, y se paga una sola vez, y es un requisito necesario para poder ingresar a cualquiera de nuestras carreras.</p>
    </div>

    <div class="card cost-card">
      <h4 class="card-title">Técnico Superior Universitario</h4>
      <p class="card-price">$300 / cuatrimestral</p>
      <p class="card-description">Pago correspondiente a la cuota de reinscripción de nivel TSU, que se debe realizar al inicio de cada cuatrimestre. Éste pago es parte de los requisitos de reinscripción y te dan derecho a nuestros servicios educativos.</p>
    </div>

    <div class="card cost-card">
      <h4 class="card-title">Continuidad</h4>
      <p class="card-title">Registro a nivel licenciatura</p>
      <p class="card-price">$350 / pago único</p>
      <p class="card-description">Este pago corresponde a la cuota de registro a la continuidad de estudios de nivel licenciatura. Se realiza una sola vez en el momento que acudes a solicitar tu permanencia en la carrera que deseas continuar estudiando.</p>
    </div>

    <div class="card cost-card">
      <h4 class="card-title">Licenciatura</h4>
      <p class="card-price">$500 / cuatrimestral</p>
      <p class="card-description">Pago correspondiente a la cuota de reinscripción de nivel Licenciatura, que se debe realizar al inicio de cada cuatrimestre. Éste pago es parte de los requisitos de reinscripción y te dan derecho a nuestros servicios educativos.</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      currentIndex: 0,
      images: []
    };
  },
  methods: {
    goToSlide(index) {
      this.currentIndex = index;
    },
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.images.length;
    },
    prevSlide() {
      this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
    }
  },
  created() {
    axios.get('http://localhost:8000/api/imagenes')
      .then(response => {
        this.images = response.data.imagenes;
      })
      .catch(error => {
        console.error("Error al cargar las imágenes:", error);
      });

    setInterval(this.nextSlide, 3000);
  }
};
</script>

<style scoped>
.carousel-container {
  position: relative;
  width: 600px;
  margin: 0 auto;
  overflow: hidden;
}

.carousel-images {
  display: flex;
  transition: transform 0.5s ease;
}

.carousel-item {
  min-width: 100%;
  transition: opacity 0.5s ease;
}

.carousel-item img {
  width: 100%;
  height: auto;
}

.carousel-nav {
  text-align: center;
  position: absolute;
  bottom: 10px;
  width: 100%;
}

.carousel-dot {
  display: inline-block;
  width: 10px;
  height: 10px;
  background-color: #ddd;
  margin: 0 5px;
  border-radius: 50%;
  cursor: pointer;
}

.carousel-dot.active {
  background-color: #840000;
}

.carousel-item.active {
  opacity: 1;
}

.carousel-item:not(.active) {
  opacity: 0.5;
}

.card-dash {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.quick-access {
  text-align: center;
  margin: 40px 0;
}

.quick-access h2 {
  font-size: 2rem;
  font-weight: 600;
  color: #333;
  margin-bottom: 20px;
}

.quick-access h1 {
  font-size: 2.5rem;
  font-weight: 700;
  color: #003366;
  margin-bottom: 15px;
}

.quick-access h4 {
  font-size: 1.2rem;
  color: #666;
  font-weight: 400;
  max-width: 800px;
  margin: 0 auto 30px;
}

@media (max-width: 768px) {
  .quick-access h1 {
    font-size: 2rem;
  }

  .quick-access h2 {
    font-size: 1.8rem;
  }

  .quick-access h4 {
    font-size: 1rem;
  }
}

.card {
  flex: 1 1 calc(25% - 20px);
  max-width: 300px;
  background: #ffffff;
  border: none;
  border-radius: 10px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  padding: 20px;
  height: auto;
  transition: background-color 0.3s ease;
}

.card:hover {
  background-color: #f0f0f0;
  transform: translateY(-3px);
  box-shadow: 0 4px 8px rgb(131, 130, 130);
}

.icon-box {
  text-align: left;
  padding: 20px;
}

.icon-box img {
  max-width: 100px;
  height: auto;
  margin-bottom: 10px;
}

.icon-box h4 {
  font-size: 1rem;
  font-weight: 600;
  margin-bottom: 8px;
  color: #333;
}

.icon-box p {
  font-size: 0.9rem;
  color: #555;
}

@media (max-width: 992px) {
  .card {
    flex: 1 1 calc(33.33% - 20px);
  }
}

@media (max-width: 768px) {
  .card {
    flex: 1 1 calc(50% - 20px);
  }
}

@media (max-width: 576px) {
  .card {
    flex: 1 1 100%;
  }
}

.cost-card .card-title {
  background-color: #840000;
  color: white;
  border-radius: 2%;
}

.authorities-row {
  display: flex;
  justify-content: space-around;
  align-items: center;
  flex-wrap: nowrap;
  gap: 1px;
}

.authority-item {
  flex: 1;
  max-width: 180px;
  margin: 0 5px;
}

.authority-item img {
  width: 200px;
  object-fit: cover;
  border-radius: 8px;
}
</style>

