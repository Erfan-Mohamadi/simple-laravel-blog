<div>
    <!DOCTYPE html>
    <html>
    <head>
        <title>@yield('title', 'Home')</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

    @include('partials.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('partials.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    </body>
    </html>
</div>

