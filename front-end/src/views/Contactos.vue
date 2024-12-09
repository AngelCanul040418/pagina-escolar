<template>
    <div class="contact-container">
        <!-- Encabezado -->
        <header class="header">
            <h1>Contáctanos</h1>
            <p>Estamos aquí para resolver tus dudas y apoyarte</p>
        </header>

        <!-- Contenido Principal -->
        <main class="main-content">
            <!-- Mapa e Información de Contacto -->
            <section class="info-section">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14940.935257868057!2d-90.008301!3d20.578507!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85f89d851f5db031%3A0x88bb1c96205029da!2sUniversidad%20Tecnol%C3%B3gica%20del%20Poniente!5e0!3m2!1ses-419!2sus!4v1733721051109!5m2!1ses-419!2sus"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
                <div class="contact-info">
                    <div class="info-card">
                        <h3><i class="fas fa-map-marker-alt"></i> Dirección</h3>
                        <p>Calle 29, Col. Tres Cruces, Maxcanú, Yucatán, C.P. 97800</p>
                    </div>
                    <div class="info-card">
                        <h3><i class="fas fa-envelope"></i> Email</h3>
                        <a href="mailto:contacto@utponiente.edu.mx">contacto@utponiente.edu.mx</a>
                    </div>
                    <div class="info-card">
                        <h3><i class="fas fa-phone-alt"></i> Teléfono</h3>
                        <a href="tel:+529979712162">997 971 21 62</a>
                    </div>
                </div>
            </section>

            <!-- Formulario de Contacto -->
            <section class="form-section">
                <h2>Envíanos un Mensaje</h2>
                <form @submit.prevent="handleSubmit">
                    <div class="form-group">
                        <label for="name">Nombre Completo</label>
                        <input type="text" id="name" required placeholder="Tu nombre" />
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" required placeholder="Tu correo electrónico" />
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <textarea id="message" rows="5" required placeholder="Escribe tu mensaje aquí..."></textarea>
                    </div>
                    <button type="submit" class="submit-button">Enviar Mensaje</button>
                </form>
            </section>
        </main>
    </div>
</template>

<script>
export default {
    name: "ContactComponent",
    methods: {
        handleSubmit() {
            alert("Mensaje enviado con éxito.");
        },
    },
};
</script>

<style scoped>
/* General */
.contact-container {
    font-family: 'Arial', sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

header.header {
    background: linear-gradient(135deg, #800020, #a52a2a); /* Cambiado a rojo guinda */
    color: #fff;
    text-align: center;
    padding: 2rem 1rem;
}

header.header h1 {
    font-size: 2.5rem;
    margin: 0;
}

header.header p {
    font-size: 1.2rem;
    margin-top: 0.5rem;
}

/* Contenido principal */
main.main-content {
    max-width: 1200px;
    margin: 2rem auto;
    padding: 1rem;
}

.info-section {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;
    margin-bottom: 3rem;
}

.map-container {
    flex: 1;
    min-width: 300px;
}

.map-container iframe {
    width: 100%;
    height: 400px;
    border: none;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.contact-info {
    flex: 1;
    min-width: 300px;
    display: flex;
    flex-direction: column;
    gap: 1.5rem;
}

.info-card {
    background: #f9f9f9;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.info-card h3 {
    margin: 0;
    font-size: 1.2rem;
    color: #800020; /* Cambiado a rojo guinda */
}

.info-card a {
    color: #800020; /* Cambiado a rojo guinda */
    text-decoration: none;
}

.info-card a:hover {
    text-decoration: underline;
}

/* Formulario */
.form-section {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 0.5rem;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 0.8rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

.form-section h2 {
    margin-bottom: 1rem;
    color: #800020; /* Cambiado a rojo guinda */
    text-align: center;
}

.submit-button {
    background: #800020; /* Cambiado a rojo guinda */
    color: #fff;
    padding: 0.8rem 1.5rem;
    border: none;
    border-radius: 4px;
    font-size: 1.2rem;
    cursor: pointer;
    display: block;
    margin: 0 auto;
    transition: background 0.3s ease;
}

.submit-button:hover {
    background: #6b001a; /* Más oscuro al pasar el mouse */
}

.submit-button:active {
    background: #4c0012; /* Más oscuro al hacer clic */
}

</style>
