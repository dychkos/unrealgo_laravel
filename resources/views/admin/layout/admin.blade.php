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
    <title>UnReal GO | Admin Panel </title>

    <style>
        body {
            background-color: #ececec;
        }
    </style>

</head>
<body>
<header class="admin-header">
    <span class="url h4">unreal-go.top</span>
    <a href="{{route('logout')}}" class="link">Вийти</a>
</header>
<main class="admin-main">
    <nav class="admin-navbar">
        <div class="admin-logo">
            <div class="admin-logo__image">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 684.65 668.08"><defs><style>.cls-1{fill:#ffffff;}</style></defs><g id="Слой_5" data-name="Слой 5"><path class="cls-1" d="M498.5,841.5c69-40,123-96,174-159A485.21,485.21,0,0,1,534,585a480.64,480.64,0,0,1-98.5-144.5A799,799,0,0,1,388,180l-76,16a610.27,610.27,0,0,0,55,275A486.43,486.43,0,0,0,558.9,700.93l-61.9,49c-46-38.07-116-97.41-174.52-209.41C255.33,411.88,243,286.13,239,222.19L161.35,255a740.61,740.61,0,0,0,77.26,295.33,797.31,797.31,0,0,0,129,180A806.59,806.59,0,0,0,498.5,841.5Z" transform="translate(-161.35 -173.42)"/></g><g id="Слой_8" data-name="Слой 8"><path class="cls-1" d="M463,174" transform="translate(-161.35 -173.42)"/><path class="cls-1" d="M831,324c4.26-20.79,14.9-64,15-65-45.37-22.22-113.79-52.54-190.33-68.67A788.36,788.36,0,0,0,463,174a436.32,436.32,0,0,0,78.09,306,455.84,455.84,0,0,0,179,139.44,480.51,480.51,0,0,0,32.24-51.11A498.84,498.84,0,0,0,779,511.67a373.18,373.18,0,0,0,34.67-100l-48.95-24.11-40.39-19.89a343.85,343.85,0,0,0-92-30c9.56,16.22,57.82,90.43,63.34,96L725,447l-36,75c-15.79-9.64-32.3-24.58-52-44a282.69,282.69,0,0,1-41-51c-17-22-28.11-50.89-38.41-82.9-11.22-34.83-13.74-75-17.59-102.1,55,2,99.36,16.23,146,29l79,27Z" transform="translate(-161.35 -173.42)"/></g></svg>
            </div>
        </div>
        <div class="admin-navbar__nav">
            @foreach($activeModels as $model => $value)
                <a href="{{route('user.admin.index', $model == 'articles' ? '' : $model)}}" class="admin-navbar__item {{$modelName === $model ? "active" : ""}}">
                <span class="admin-navbar__image">
                    <img src="{{asset('app/img/'.$model.'.svg')}}" alt="Model">
                </span>
                    <span class="admin-navbar__title h4">
                        {{$value}}
                </span>
                </a>
            @endforeach
        </div>
        <div class="admin-burger" data-menu="2">
            <div class="icon"></div>
        </div>
    </nav>
    <div class="admin-body">
        <div class="admin-content">
            @yield('content')
        </div>
    </div>
</main>

</body>
@stack('js')
</html>
