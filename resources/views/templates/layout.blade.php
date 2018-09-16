@include('layouts.header')
<body>
        @include('layouts.navigation')
        <main>
            @yield('content')
        </main>
</body>
@include('layouts.footer')