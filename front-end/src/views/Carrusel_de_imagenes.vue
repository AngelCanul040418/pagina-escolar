<script setup>
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import axios from 'axios';
import { ref, onMounted, watch } from 'vue';
import Swal from 'sweetalert2';

const config = ref({
    itemsToShow: 1.5,       // Cantidad de elementos visibles
    wrapAround: true,       // Hacer que el carrusel sea infinito
    transition: 2000,       // Duración de la transición (ms)
    autoplay: 1000,         // Tiempo entre cada cambio automático (ms)
    pauseAutoplayOnHover: false // Evitar que el autoplay se detenga al pasar el cursor
});


const loading = ref(true);
const images = ref([]); // Todas las imágenes obtenidas de la API
const filteredImages = ref([]); // Imágenes filtradas por el nombre seleccionado
const selectedImageName = ref(''); // Nombre de la imagen seleccionada para filtrar

const loadImages = async () => {
    try {
        const response = await axios.get('http://localhost:8000/api/imagenes');
        console.log('Respuesta de la API:', response.data);

        images.value = response.data.imagenes;
        filteredImages.value = images.value; // Inicialmente, mostrar todas las imágenes
    } catch (error) {
        console.error('Error al cargar las imágenes:', error);
    } finally {
        loading.value = false;
        Swal.close();
    }
};

// Observa los cambios en `selectedImageName` y filtra las imágenes
watch(selectedImageName, (newName) => {
    if (newName) {
        filteredImages.value = images.value.filter(img => img.title === newName);
    } else {
        filteredImages.value = images.value; // Mostrar todas las imágenes si no hay selección
    }
});

onMounted(() => {
    Swal.fire({
        title: 'Cargando...',
        text: 'Por favor espera mientras cargamos las imágenes.',
        showConfirmButton: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    loadImages();
});
</script>

<template>
    <div class="carousel-container">
        <h1>Carrusel de imágenes</h1>

        <!-- Menú desplegable para seleccionar el nombre de la imagen -->
        <div class="image-selector">
            <label for="image-name">Selecciona una imagen:</label>
            <select id="image-name" v-model="selectedImageName">
                <option value="">Todas las imágenes</option>
                <option v-for="(image, index) in images" :key="index" :value="image.title">
                    {{ image.title }}
                </option>
            </select>
        </div>

        <div v-if="!loading">
            <!-- Carrusel para múltiples imágenes -->
            <div v-if="filteredImages.length > 1">
                <Carousel v-bind="config">
                    <Slide v-for="(image, index) in filteredImages" :key="index">
                        <img :src="`http://localhost:8000/storage/${image.path}`" :alt="image.title" class="carousel__item" />
                        <div class="carousel__caption">
                            <h3>{{ image.title }}</h3>
                            <p>{{ image.description }}</p>
                        </div>
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
            </div>

            <!-- Mostrar una sola imagen sin carrusel -->
            <div v-else-if="filteredImages.length === 1" class="single-image-container">
                <img :src="`http://localhost:8000/storage/${filteredImages[0].path}`" :alt="filteredImages[0].title" class="single-image" />
                <div class="single-image-caption">
                    <h3>{{ filteredImages[0].title }}</h3>
                    <p>{{ filteredImages[0].description }}</p>
                </div>
            </div>

            <!-- Mostrar mensaje si no hay imágenes -->
            <div v-else>
                <p>No hay imágenes disponibles para mostrar.</p>
            </div>
        </div>

        <div v-else>
            <p>Por favor espera mientras cargamos las imágenes...</p>
        </div>
    </div>
</template>

<style>
.carousel-container {
    width: 80%;
    margin: 0 auto;
    height: 300px;
    max-width: 1200px;
    perspective: 1500px; /* Agrega perspectiva para el efecto 3D */
}

.image-selector {
    margin-bottom: 20px;
}

.image-selector label {
    margin-right: 10px;
    font-weight: bold;
}

.image-selector select {
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.carousel__slide {
    padding: 5px;
}

.carousel__item {
    width: 100%; /* Ocupa todo el ancho del contenedor */
    height: 300px; /* Define una altura fija para todas las imágenes */
    object-fit: cover; /* Ajusta la imagen para llenar el contenedor */
    border-radius: 8px;
    display: block;
    transform: rotateY(-30deg) translateZ(-50px); /* Aplica el efecto 3D a las imágenes no visibles */
    transition: transform 0.5s ease-in-out;
}

.carousel__slide-active .carousel__item {
    transform: rotateY(0) translateZ(0); /* La imagen activa está en el centro, sin transformación */
}

.single-image-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 20px;
}

.single-image {
    width: 50%;
    border-radius: 8px;
    max-height: 300px;
    object-fit: cover;
    margin-bottom: 10px;
}

.single-image-caption {
    text-align: center;
    background-color: rgba(0, 0, 0, 0.05); /* Fondo tenue */
    padding: 10px;
    border-radius: 8px;
    width: 50%;
}

.single-image-caption h3 {
    margin: 0;
    font-size: 18px;
    color: #333;
}

.single-image-caption p {
    margin: 5px 0 0;
    font-size: 14px;
    color: #666;
}

.carousel__caption {
    position: absolute;
    bottom: 20px;
    left: 20px;
    color: #fff;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 10px;
    border-radius: 5px;
}

.carousel__caption h3 {
    margin: 0;
    font-size: 18px;
}

.carousel__caption p {
    margin: 5px 0 0;
    font-size: 14px;
}
</style>