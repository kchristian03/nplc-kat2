
@include('player.layouts.header')
    <title>@yield('title')</title>
        @yield('script')
        @livewireStyles
</head>
<body>
    @yield('content')
@include('player.layouts.footer')
