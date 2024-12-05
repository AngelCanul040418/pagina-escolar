<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Ofertas</h1> <!-- Título de la página -->

        <div class="relative">
            <canvas id="usuariosChart" style="height: 400px; width: 100%;"></canvas>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('usuariosChart').getContext('2d');

            // Colores configurables
            const baseColor = 'rgba(54, 162, 235, 0.7)'; // Azul claro
            const hoverColor = 'rgba(255, 99, 132, 0.8)'; // Rojo al pasar el mouse
            const borderColor = 'rgba(54, 162, 235, 1)';  // Azul borde

            // Configuración del gráfico
            const usuariosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($etiquetas), // Etiquetas dinámicas
                    datasets: [{
                        label: '',
                        data: @json($horasTotales), // Datos dinámicos
                        backgroundColor: baseColor, // Color base
                        borderColor: borderColor,   // Color del borde
                        borderWidth: 2,
                        borderRadius: 10,          // Bordes redondeados
                        hoverBackgroundColor: hoverColor, // Color al pasar el mouse
                        hoverBorderColor: hoverColor      // Borde al pasar el mouse
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
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
                            padding: 10,
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
</div>
