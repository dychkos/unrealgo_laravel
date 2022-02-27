<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

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

</body>
    @stack('js')
</html>
