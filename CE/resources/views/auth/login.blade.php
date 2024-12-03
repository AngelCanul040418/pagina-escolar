<x-guest-layout>
    <x-authentication-card>
        <style>
            body {
                background: linear-gradient(135deg, #4A90E2, #50BFE6);
                font-family: 'Arial', sans-serif;
                color: #333;
            }

            .card {
                background: white;
                border-radius: 10px;
                padding: 30px;
                max-width: 500px;
                margin: 50px auto;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.5s ease-in-out;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .card-header {
                text-align: center;
                margin-bottom: 20px;
            }

            .card-header img {
                max-width: 100px;
                margin-bottom: 10px;
            }

            .card-header h1 {
                font-size: 20px;
                color: #2C3E50;
                margin-bottom: 10px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .card-header h2 {
                font-size: 24px;
                color: #2C3E50;
                margin-top: 10px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                color: #34495E;
                margin-bottom: 5px;
            }

            .form-group input {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
                transition: border-color 0.3s, box-shadow 0.3s;
            }

            .form-group input:focus {
                border-color: #2980B9;
                box-shadow: 0 0 5px rgba(41, 128, 185, 0.5);
                outline: none;
            }

            .btn {
                display: block;
                width: 100%;
                background: #2980B9;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn:hover {
                background: #21618C;
            }

            .terms {
                font-size: 14px;
                color: #2980B9;
                text-align: center;
                margin-top: 15px;
            }

            .terms a {
                text-decoration: none;
                color: #2980B9;
            }

            .terms a:hover {
                text-decoration: underline;
            }

            .already-registered {
                text-align: center;
                margin-top: 20px;
                font-size: 14px;
            }

            .already-registered a {
                color: #2980B9;
                text-decoration: none;
            }

            .already-registered a:hover {
                text-decoration: underline;
            }

            .alert {
                background: #E74C3C;
                color: white;
                padding: 10px;
                border-radius: 5px;
                text-align: center;
                margin-bottom: 15px;
                font-size: 14px;
            }
        </style>

        <div class="card">
            <!-- Título y logo -->
            <div class="card-header">
                <h1 style="color: #E74C3C">UNIVERSIDAD TECNOLOGICA DEL PONIENTE</h1>
                <h2>Iniciar Sesión</h2>
            </div>

            <!-- Mensaje de error -->
            <x-validation-errors class="mb-4 alert" />

            @if (session('status'))
                <div class="alert">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus />
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" name="password" required />
                </div>

                <!-- Recordarme -->
                <div class="remember-me">
                    <input type="checkbox" id="remember_me" name="remember">
                    <label for="remember_me">{{ __('Recuérdame') }}</label>
                </div>

                <!-- Botón de inicio de sesión -->
                <button type="submit" class="btn">{{ __('Iniciar Sesión') }}</button>

                <!-- ¿Olvidaste tu contraseña? -->
                @if (Route::has('password.request'))
                    <div class="forgot-password">
                        <a href="{{ route('password.request') }}">{{ __('¿Olvidaste tu contraseña?') }}</a>
                        <a href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                    </div>
                @endif
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
