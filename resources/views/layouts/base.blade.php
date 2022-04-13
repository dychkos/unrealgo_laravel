<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="{{asset('app/libs/libs.min.css?v=' . random_int(1000, 9999)) }}">
    <link rel="stylesheet" href="{{asset('app/css-min/main.min.css?v='. random_int(1000, 9999)) }}">
    <script src="{{asset('app/libs/libs.min.js')}}"></script>

    <title>
        @if(View::hasSection('title'))
            @yield('title')
        @else
            UnReal GO
        @endif
    </title>

</head>
<body>
    {{--  HEADER  --}}
    @include("includes.header")

    {{--  CONTENT  --}}
    <main class="content">
        <div class="container">
            @yield('content')
        </div>
    </main>

    {{--  FOOTER  --}}
    @include("includes.footer")

    {{--  BACKGROUND  --}}
    @include("includes.background")

    {{--  MODAL  --}}
    @include("includes.modal")

</body>
    <script>
        {{-- CSRF TOKEN--}}
        const csrfToken = "{{ csrf_token() }}";

        {{-- COMMON URLs--}}
        let baseURL = "{{route("home")}}";
        let likeProductURL = "{{route("user.product.like")}}";
    </script>
    @stack('js')
</html>
