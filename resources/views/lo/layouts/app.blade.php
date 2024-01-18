
@include('lo.layouts.header')
    <title>@yield('title')</title>
        @yield('script')
</head>
<body>
    @yield('content')
@include('lo.layouts.footer')
