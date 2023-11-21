<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employees.create') }} ">{{ __('Dodaj pracownika') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('employees.index') }} ">{{ __('Lista pracowników') }}</a>
                                </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    @stack('scripts')
        <script>
            function addPhoneNumberField() {

            const container = document.getElementById('phoneNumbersContainer');
            const inputGroup = document.createElement('div');
            inputGroup.className = 'input-group mt-2';

            const input = document.createElement('input');
            input.type = 'text';
            input.name = `phone_numbers[]`;
            input.required = true;
            input.className = 'form-control';
            input.value = '';

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'btn btn-danger';
            button.textContent = 'Usuń';
            button.onclick = function () {
            container.removeChild(inputGroup);
        };

            inputGroup.appendChild(input);
            inputGroup.appendChild(button);

            container.appendChild(inputGroup);
        }
            function removePhoneNumberField(button) {
                var inputGroup = button.closest('.input-group');
                inputGroup.remove();
            }
    </script>
</body>
</html>
