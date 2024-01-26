
@include('lo.layouts.header')
    <title>@yield('title')</title>
        @yield('script')
        @livewireStyles
</head>
<body>
    @yield('content')
@include('lo.layouts.footer')
