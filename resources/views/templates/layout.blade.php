@include('layouts.head')
    <body> 
            <div class="container">
                @include('layouts.header')
                <div class="flex-container">
                    <div class="col-12 layout layout__left">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
            <script src="{{ asset('js/app.js') }}"></script>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </body>
</html>