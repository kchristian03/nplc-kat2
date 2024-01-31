
@include('player.layouts.header')
    <title>@yield('title')</title>
        @yield('script')
</head>
<body>
    @yield('content')
@include('player.layouts.footer')
