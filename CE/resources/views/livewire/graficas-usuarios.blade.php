
    <div class="w-full max-w-6xl bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Ofertas</h1> <!-- Título de la página -->

        <div class="relative">
            <canvas id="usuariosChart" style="height: 400px; width: 100%;"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('usuariosChart').getContext('2d');

            // Definir colores base para el gradiente
            const gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(54, 162, 235, 1)');  // Azul más fuerte en la parte superior
            gradient.addColorStop(1, 'rgba(54, 162, 235, 0.3)');  // Azul más suave en la parte inferior

            // Configuración del gráfico
            const usuariosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($etiquetas), // Etiquetas dinámicas
                    datasets: [{
                        label: 'Horas Totales', // Nombre del dataset
                        data: @json($horasTotales), // Datos dinámicos
                        backgroundColor: gradient, // Gradiente para simular volumen
                        borderColor: 'rgba(54, 162, 235, 1)', // Azul borde
                        borderWidth: 2,
                        borderRadius: 10, // Bordes redondeados para suavizar
                        // Efecto de sombra para simular 3D
                        shadowOffsetX: 5,
                        shadowOffsetY: 5,
                        shadowBlur: 15,
                        shadowColor: 'rgba(0, 0, 0, 0.3)', // Sombra oscura
                        hoverBackgroundColor: 'rgba(255, 99, 132, 0.8)', // Rojo al pasar el mouse
                        hoverBorderColor: 'rgba(255, 99, 132, 1)',      // Borde al pasar el mouse
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                            labels: {
                                color: '#333',
                                font: {
                                    size: 14,
                                    family: 'Arial, sans-serif'
                                }
                            }
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.7)',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            padding: 12,
                            borderColor: '#333',
                            borderWidth: 1,
                            cornerRadius: 8
                        }
                    },
                    scales: {
                        x: {
                            ticks: {
                                color: '#666',
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#666',
                                font: {
                                    size: 12
                                }
                            },
                            grid: {
                                color: 'rgba(200, 200, 200, 0.2)'
                            }
                        }
                    }
                }
            });
        });
    </script>
