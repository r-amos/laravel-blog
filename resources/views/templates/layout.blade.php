@include('layouts.head')
    <body> 
            <div class="container">
                @include('layouts.header')
                <div class="flex-container">
                    <div class="col-11">
                        <main>
                            @yield('content')
                        </main>
                    </div>
                    <div class="col-1">
                        <aside>
                            @include('layouts.sidepanel')
                        </aside>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
    </body>
</html>