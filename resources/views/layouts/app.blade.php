
@include('partials.header')
<body>
    <div id="app">
            @include('inc.navbar')
            <div class="container" style="margin-bottom: 3rem">
                @include('inc.messages')
               

            @yield('content')
        </div>

            @include('partials.footer')

            </div>
    </div>

</body>
</html>
