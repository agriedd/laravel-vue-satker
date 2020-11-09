<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="theme-color" content="{{ $theme_color ?? '#343a40' }}">
    @stack('meta')
    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>
    @isset($appjs)
        <script src="{{ mix("js/{$appjs}") }}" defer></script>
    @else
        <script src="{{ mix('js/home.js') }}" defer></script>
    @endisset
    @stack('script')
    @isset($appcss)
        <link href="{{ mix("css/{$appcss}") }}" rel="stylesheet">
    @else
        <link href="{{ mix('css/home.css') }}" rel="stylesheet">
    @endisset

    @stack('css')
</head>
<body>
    <div id="app" class="@yield('className')">
        @yield('content')
    </div>
    @stack('footer')
</body>
</html>
