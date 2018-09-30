@include('layouts.head')
    <body> 
            <div class="container">
                @include('layouts.header')
                <div class="flex-container">
                    <div class="col-11 layout layout__left">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                    <div class="col-1 layout layout__right">
                        <aside>
                            @include('layouts.sidepanel')
                        </aside>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
            <script src="{{ asset('js/app.js') }}"></script>
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </body>
</html>