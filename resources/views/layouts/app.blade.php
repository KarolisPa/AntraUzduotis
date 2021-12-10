<html>
<head>
    <title>@yield('title')</title>

   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>

<div class="">
    @yield('content')
</div>

@livewireScripts
<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">
</script>
@stack('scripts')
</body>
</html>


