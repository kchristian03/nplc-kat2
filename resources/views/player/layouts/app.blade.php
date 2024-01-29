
@include('player.layouts.header')
    <title>@yield('title')</title>
        @yield('script')
        @livewireStyles
        @vite('resources/js/app.js')
</head>
<body>
    @yield('content')
@include('player.layouts.footer')
