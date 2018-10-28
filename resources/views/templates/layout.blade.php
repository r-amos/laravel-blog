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
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-91082134-2"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-91082134-2');
    </script>
</html>