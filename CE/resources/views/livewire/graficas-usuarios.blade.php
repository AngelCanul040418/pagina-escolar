<div>
    <canvas id="usuariosChart" width="400" height="200"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('usuariosChart').getContext('2d');
            const usuariosChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Total de Usuarios'], // Etiquetas del gráfico
                    datasets: [{
                        label: 'Usuarios',
                        data: [{{ $totalUsuarios }}], // Datos del gráfico
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
