<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RootShop | {{ $title }}</title>
    @include('partials.base.head')
    @yield('extraCss')
</head>
<body>

    @include('partials.base.navbar')

    <div class="content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    @include('partials.base.footer')

    @include('partials.base.scripts')
    @yield('extraJs')
</body>
</html>
