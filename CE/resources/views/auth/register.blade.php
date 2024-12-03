<x-guest-layout>
    <x-authentication-card>

        <div class="card">
            <div class="card-header">
                <h2>Registro</h2>
            </div>

            <!-- Mensaje de error -->
            <x-validation-errors class="mb-4 alert" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nombre -->
                <div class="form-group">
                    <label for="name">{{ __('Nombre') }}</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus
                        autocomplete="name" />
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">{{ __('Correo Electrónico') }}</label>
                    <input id="email" type="email" name="email" :value="old('email')" required
                        autocomplete="username" />
                </div>

                <!-- Contraseña -->
                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" />
                </div>

                <!-- Confirmar Contraseña -->
                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                </div>

                <!-- Términos y condiciones -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="terms">
                        <label for="terms">
                            <input type="checkbox" id="terms" name="terms" required />
                            {!! __('Acepto los :terms_of_service y la :privacy_policy', [
                                'terms_of_service' => '<a href="' . route('terms.show') . '">Términos del servicio</a>',
                                'privacy_policy' => '<a href="' . route('policy.show') . '">Política de privacidad</a>',
                            ]) !!}
                        </label>
                    </div>
                @endif

                <!-- Botón de registro -->
                <button type="submit" class="btn">{{ __('Registrarse') }}</button>
            </form>

            <div class="already-registered">
                <p>{{ __('¿Ya tienes cuenta?') }} <a href="{{ route('login') }}">{{ __('Inicia sesión aquí') }}</a></p>
            </div>
        </div>
    </x-authentication-card>
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

</x-guest-layout>
