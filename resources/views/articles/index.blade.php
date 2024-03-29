@extends('layouts.base')

@php
    $categoryName = "Всі публікації";
    if (isset($activeCategory)) {
        $categoryName = $activeCategory->value;
    }
@endphp

@section('content')
    <div class="page-title h1">Блог</div>
    <div class="navigation" id="navigation">
        <div class="navigation__categories">
            <div class="navigation__mobile h5">
                <span>
                    {{ $categoryName }}
                </span>
                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 9L0.937822 0.75L13.0622 0.750001L7 9Z" fill="white"/>
                </svg>
            </div>
            <div class="navigation__body">
                <div class="navigation__desktop navigation__item h5
                    {{ !isset($activeCategory) ? "navigation__active" : "" }}">
                    <a href="{{ route('articles.index') }}">
                        Всі публікації
                    </a>
                </div>
                @foreach($categories as $category)
                    <div class="{{ isset($activeCategory) && $activeCategory->id === $category->id
                            ? "navigation__item navigation__active"
                            : "navigation__item"}} h5">
                        <a href="{{route('articles.index', $category->slug )}}">{{$category->value}}</a>
                    </div>
                @endforeach
                <div class="navigation__item h5" id="main_nav" style="display: none">
                    <a href="{{route('articles.index')}}">
                        Всі публікації
                    </a>
                </div>
            </div>

        </div>
        <div class="navigation__sort sort">
            <div class="sort__title h5">Сортувати за</div>
            <div class="sort__icon h5">
                <svg width="22" height="18" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_326_115)">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.22222 18H6.11111C6.78333 18 7.33333 17.325 7.33333 16.5C7.33333 15.675 6.78333 15 6.11111 15H1.22222C0.55 15 0 15.675 0 16.5C0 17.325 0.55 18 1.22222 18ZM0 1.5C0 2.325 0.55 3 1.22222 3H20.7778C21.45 3 22 2.325 22 1.5C22 0.675 21.45 0 20.7778 0H1.22222C0.55 0 0 0.675 0 1.5ZM1.22222 10.5H13.4444C14.1167 10.5 14.6667 9.825 14.6667 9C14.6667 8.175 14.1167 7.5 13.4444 7.5H1.22222C0.55 7.5 0 8.175 0 9C0 9.825 0.55 10.5 1.22222 10.5Z" fill="#A5A815"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_326_115">
                            <rect width="22" height="18" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>

            </div>
            <form class="sort__body"
                  action="{{route("articles.index", [$activeCategory->slug ?? ""])}}"
                  method="GET"
                  id="confirm_sort"
            >
                <div class="sort__hide hide h5">Сортувати за</div>
                <input type="hidden" value="default" name="order" id="chosen-order">
                @foreach($allowSorts as $key => $value)
                    <div class="sort__item h5 {{ request("order", "") === $key
                        ? "sort__item_active"
                        : ""}}" data-order="{{ $key }}">{{ $value }}</div>
                @endforeach
                    <div class="sort__item h5 {{ request("order", "") === "" || request("order", "") === "default"
                    ? "sort__item_active"
                    : ""}}"
                         data-order="default">замовчуванням</div>
            </form>
        </div>
    </div>
    <div class="articles">
        <div class="row g-4">
            @foreach($articles as $article)
                <div class="col-12 col-lg-6 align-items-stretch">
                    <div class="large-article"
                         style="background-image: url({{$article->image
                        ? asset($article->image->filename)
                        : asset('app/img/article-error.jpg')}})"
                    >
                        <a href="{{route("articles.show", [$article->category->slug, $article->slug])}}">
                            <div class="large-article__card">
                                <div class="large-article__header">
                                    <div class="large-article__tag tag">
                                        {{$article->category->value}}
                                    </div>
                                    <div class="large-article__date p-light">
                                        {{$article->created_at
                                            ? $article->created_at->diffForHumans()
                                            : "Щойно"
                                            }}
                                    </div>
                                </div>
                                <div class="large-article__content">
                                    <div class="large-article__title h4">{{$article->title}}</div>
                                    <div class="large-article__text p">
                                        {{\Illuminate\Support\Str::limit($article->description, 200, $end='...')}}
                                    </div>
                                </div>
                                <div class="large-article__footer">
                                    <div class="large-article__comment with-icon">
                                        <div class="with-icon__icon">
                                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.0001 9.15821H5.00012C4.73491 9.15821 4.48055 9.26542 4.29302 9.45625C4.10548 9.64709 4.00012 9.90591 4.00012 10.1758C4.00012 10.4457 4.10548 10.7045 4.29302 10.8953C4.48055 11.0862 4.73491 11.1934 5.00012 11.1934H11.0001C11.2653 11.1934 11.5197 11.0862 11.7072 10.8953C11.8948 10.7045 12.0001 10.4457 12.0001 10.1758C12.0001 9.90591 11.8948 9.64709 11.7072 9.45625C11.5197 9.26542 11.2653 9.15821 11.0001 9.15821ZM15.0001 5.0879H5.00012C4.73491 5.0879 4.48055 5.19511 4.29302 5.38594C4.10548 5.57677 4.00012 5.8356 4.00012 6.10548C4.00012 6.37535 4.10548 6.63418 4.29302 6.82501C4.48055 7.01585 4.73491 7.12305 5.00012 7.12305H15.0001C15.2653 7.12305 15.5197 7.01585 15.7072 6.82501C15.8948 6.63418 16.0001 6.37535 16.0001 6.10548C16.0001 5.8356 15.8948 5.57677 15.7072 5.38594C15.5197 5.19511 15.2653 5.0879 15.0001 5.0879ZM17.0001 0H3.00012C2.20447 0 1.44141 0.321627 0.878802 0.894126C0.316193 1.46663 0.00012207 2.2431 0.00012207 3.05274V13.2285C0.00012207 14.0382 0.316193 14.8146 0.878802 15.3871C1.44141 15.9596 2.20447 16.2813 3.00012 16.2813H14.5901L18.2901 20.0565C18.3836 20.1508 18.4944 20.2254 18.6162 20.2761C18.7381 20.3267 18.8685 20.3524 19.0001 20.3516C19.1313 20.355 19.2614 20.3271 19.3801 20.2702C19.5627 20.1938 19.7191 20.0642 19.8294 19.8976C19.9397 19.731 19.9991 19.5349 20.0001 19.334V3.05274C20.0001 2.2431 19.6841 1.46663 19.1214 0.894126C18.5588 0.321627 17.7958 0 17.0001 0ZM18.0001 16.8816L15.7101 14.5412C15.6167 14.4469 15.5059 14.3723 15.384 14.3216C15.2622 14.271 15.1317 14.2453 15.0001 14.2461H3.00012C2.73491 14.2461 2.48055 14.1389 2.29302 13.9481C2.10548 13.7572 2.00012 13.4984 2.00012 13.2285V3.05274C2.00012 2.78286 2.10548 2.52403 2.29302 2.3332C2.48055 2.14237 2.73491 2.03516 3.00012 2.03516H17.0001C17.2653 2.03516 17.5197 2.14237 17.7072 2.3332C17.8948 2.52403 18.0001 2.78286 18.0001 3.05274V16.8816Z" fill="#A5A815"/>
                                            </svg>
                                        </div>
                                        <div class="with-icon__body h5">
                                            {{ $article->comments
                                            ? $article->comments()->where(['status' => 1])->get()->count()
                                            : "0" }}
                                        </div>
                                    </div>
                                    <div class="large-article__watcher with-icon">
                                        <div class="with-icon__icon">
                                            <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20.8246 12C20.8246 12 16.6705 18 11.5138 18C6.35703 18 2.20297 12 2.20297 12C2.20297 12 6.35703 6 11.5138 6C16.6705 6 20.8246 12 20.8246 12Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                                <path d="M11.5138 15C13.096 15 14.3787 13.6569 14.3787 12C14.3787 10.3431 13.096 9 11.5138 9C9.93157 9 8.64893 10.3431 8.64893 12C8.64893 13.6569 9.93157 15 11.5138 15Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                            </svg>
                                        </div>
                                        <div class="with-icon__body h5">
                                            {{$article->views}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{ $articles->links('includes.pagination') }}
@endsection

@once
    @push('js')
        <script src="{{ asset('app/js-min/blog.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
