<x-guest-layout>
    <x-authentication-card>
        <style>
            body {
                background: #05031b;
                font-family: 'Arial', sans-serif;
                color: #fff;
            }

            .card {
                background: #05031b;
                /* Azul para el fondo de la card externa */
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
                max-width: 180px;
                /* Aumenté el tamaño del logo */
                margin-bottom: 20px;
                display: block;
                margin-left: auto;
                margin-right: auto;
                /* Alineación centrada */
            }

            .card-header h1 {
                font-size: 24px;
                color: #fff;
                margin-bottom: 10px;
                font-weight: bold;
                text-transform: uppercase;
            }

            .card-header h2 {
                font-size: 20px;
                color: #fff;
                margin-top: 10px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-group label {
                display: block;
                font-size: 14px;
                color: #fff;
                /* Blanco para las etiquetas */
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
                border-color: #E74C3C;
                box-shadow: 0 0 5px rgba(231, 76, 60, 0.5);
                outline: none;
            }

            .btn {
                display: block;
                width: 100%;
                background: #E74C3C;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background 0.3s;
            }

            .btn:hover {
                background: #C0392B;
            }

            .remember-me,
            .forgot-password,
            .terms {
                font-size: 14px;
                color: #fff;
                /* Blanco para los textos en los enlaces */
                text-align: left;
                margin-top: 15px;
            }

            .remember-me input,
            .forgot-password a,
            .terms a {
                color: #fff;
                /* Blanco para los enlaces */
            }

            .remember-me a:hover,
            .forgot-password a:hover,
            .terms a:hover {
                text-decoration: underline;
            }

            .already-registered {
                text-align: center;
                margin-top: 20px;
                font-size: 14px;
            }

            .already-registered a {
                color: #E74C3C;
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
                <img src="{{ asset('assets/images/logo-U_T_P.png') }}" alt="Logo">
                <h1>UNIVERSIDAD TECNOLÓGICA DEL PONIENTE</h1>
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
                <br>

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
