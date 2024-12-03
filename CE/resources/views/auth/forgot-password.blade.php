<x-guest-layout>
    <x-authentication-card>
        <style>
            body {
                background: #05031b;
                font-family: 'Arial', sans-serif;
                color: #000013;
            }

            .card {
                background: #05031b;
                border-radius: 10px;
                padding: 30px;
                max-width: 500px;
                margin: 50px auto;
                box-shadow: 0 8px 16px rgba(97, 40, 40, 0.3);
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
            <div class="card-header">
                <img src="{{ asset('assets/images/logo-U_T_P.png') }}" alt="Logo">
                <h1>UNIVERSIDAD TECNOLÓGICA DEL PONIENTE</h1>
                <h2>Recuperar Contraseña</h2>
            </div>

            <!-- Mensajes -->
            @if (session('status'))
                <div class="alert">
                    {{ session('status') }}
                </div>
            @endif

            <x-validation-errors class="mb-4 alert" />

            <!-- Formulario -->
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required autofocus />
                </div>

                <button type="submit" class="btn">{{ __('Enviar Enlace de Recuperación') }}</button>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>
