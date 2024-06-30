<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plant Project | {{ $title }}</title>
    @include('partials.base.head')
    @yield('extra_css')
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

    @include('partials.base.scripts')
    @yield('extra_js')
</body>
</html>