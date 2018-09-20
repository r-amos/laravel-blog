@include('layouts.head')
<body>
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
</body>
@include('layouts.footer')