<x-guest-layout>
    <x-authentication-card>
        <style>
            body {
                background: #05031b;
                font-family: 'Arial', sans-serif;
                color: #000013;
                position: relative; /* Necesario para las burbujas */
                height: 100vh; /* Asegura que el body ocupe toda la pantalla */
                margin: 0;
                overflow: hidden; /* Para evitar que las burbujas se salgan de la pantalla */
            }

            /* Burbuja flotante */
            .bubble {
                position: absolute;
                border-radius: 50%;
                background-color: rgba(255, 255, 255, 0.3); /* Color suave para las burbujas */
                animation: bubbleMove linear infinite;
                z-index: 1; /* Para que las burbujas estén detrás del contenido */
            }

            /* Animación de las burbujas */
            @keyframes bubbleMove {
                0% {
                    transform: translateY(100vh) scale(0.5);
                    opacity: 0.7;
                }
                50% {
                    transform: translateY(-10vh) scale(1.2);
                    opacity: 1;
                }
                100% {
                    transform: translateY(100vh) scale(0.5);
                    opacity: 0;
                }
            }

            /* Diferentes tamaños y posiciones para las burbujas */
            .bubble:nth-child(1) {
                width: 100px;
                height: 100px;
                left: 5%;
                animation-duration: 15s;
                animation-delay: 0s;
            }

            .bubble:nth-child(2) {
                width: 120px;
                height: 120px;
                left: 20%;
                animation-duration: 20s;
                animation-delay: 0s;
            }

            .bubble:nth-child(3) {
                width: 80px;
                height: 80px;
                left: 50%;
                animation-duration: 12s;
                animation-delay: 0s;
            }

            .bubble:nth-child(4) {
                width: 90px;
                height: 90px;
                left: 80%;
                animation-duration: 18s;
                animation-delay: 0s;
            }

            .bubble:nth-child(5) {
                width: 60px;
                height: 60px;
                left: 30%;
                animation-duration: 22s;
                animation-delay: 0s;
            }

            .bubble:nth-child(6) {
                width: 110px;
                height: 110px;
                left: 70%;
                animation-duration: 25s;
                animation-delay: 0s;
            }

            .bubble:nth-child(7) {
                width: 150px;
                height: 150px;
                left: 10%;
                animation-duration: 30s;
                animation-delay: 0s;
            }

            .card {
                background: #05031b;
                border-radius: 10px;
                padding: 30px;
                max-width: 640px;
                margin: 50px auto;
                box-shadow: 0 8px 16px rgba(97, 40, 40, 0.3);
                animation: fadeIn 0.5s ease-in-out;
                position: relative;
                z-index: 2; /* Para que la tarjeta quede encima de las burbujas */
            }

            /* Animación de aparición */
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
                margin-bottom: 20px;
                display: block;
                margin-left: auto;
                margin-right: auto;
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
                text-align: left;
                margin-top: 15px;
            }

            .remember-me input,
            .forgot-password a,
            .terms a {
                color: #fff;
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

        <!-- Burbujas flotantes en el fondo -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

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
                        <a style="color: #E74C3C" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                    </div>
                @endif
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
