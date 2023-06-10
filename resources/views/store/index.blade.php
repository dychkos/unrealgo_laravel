@extends('layouts.base')

@php
    $typeName = "Всі товари";
    if (isset($activeType)) {
        $typeName = $activeType->value;
    }
@endphp

@section('content')
    <div class="banner mb-5">
        <div class="banner__background photo">
            <img src="{{asset("app/img/banner.png")}}" alt="Banner">
        </div>
        <div class="banner__card">
            <div class="banner__title">Зустрічай новую колекцію</div>
            <div class="banner__text">unrgo 2022</div>
        </div>
        <div class="glow-wrap">
            <i class="glow"></i>
        </div>
    </div>
    <div class="navigation">
        <div class="navigation__categories">
            <div class="navigation__mobile h5">
                <span>
                    {{ $typeName }}
                </span>
                <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7 9L0.937822 0.75L13.0622 0.750001L7 9Z" fill="white"/>
                </svg>
            </div>

            <div class="navigation__body">
                <div class="navigation__desktop navigation__item h5
                    {{ !isset($activeType) ? "navigation__active" : "" }}">
                    <a href="{{ route('store.index') }}">
                        Всі товари
                    </a>
                </div>
                @foreach($types as $type)
                    <div class="{{ isset($activeType) && $activeType->id === $type->id
                                ? "navigation__active"
                                : "navigation__item"}} h5">
                        <a href="{{route('store.index', $type->slug )}}">{{$type->value}}</a>
                    </div>
                @endforeach
                <div class="navigation__item h5" id="main_nav" style="display: none">
                    <a href="{{route('store.index')}}">
                        Всі товари
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
                  action="{{route("store.index", [$activeType->slug ?? ""])}}"
                  method="GET"
                  id="confirm_sort"
            >
                <input type="hidden" value="default" name="order" id="chosen-order">
                @foreach($allowSorts as $key => $value)
                    <div class="sort__item h5 {{ request("order", "") === $key
                        ? "sort__item_active"
                        : ""}}" data-order="{{$key}}">{{$value}}</div>
                @endforeach
                <div class="sort__item h5 {{ request("order", "") === "" || request("order", "") === "default"
                    ? "sort__item_active"
                    : ""}}"
                     data-order="default">замовчуванням</div>
            </form>
        </div>
    </div>
    @if(!empty($new))
        <section class="store-pr mt-2">
            <h2 class="store-pr__title page-title h2">
                Нові надходження
            </h2>
            <div class="store-pr__body">
                <div class="slider">
                    <div class="swiper new-swiper">
                        <div class="swiper-wrapper">
                            @foreach($new as $product)
                                <div class="swiper-slide">
                                    <a href="{{route("store.show", [$product->type->slug, $product->id])}}" class="product-list__item product">
                                        <div class="product__wrapper">
                                            <div class="product__image">
                                                <img src="{{$product->images->first()
                                            ? asset($product->images->first()->filename)
                                            : asset("app/img/test.png")}}" alt="Product">
                                            </div>
                                            <div data-product="{{$product->id}}" class="product__like like {{$user !== null && $product->likedBy()->where("user_id", $user->id)->exists() ? "like_liked" : ""}}">
                                                <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="product__body">
                                            <div class="product__prices">
                                                <div class="product__price h3">{{$product->currentPrice()}} ₴</div>
                                                @if(isset($product->offer) && $product->offer > 0)
                                                    <div class="product__discount h6">{{$product->price}}₴</div>
                                                @endif
                                            </div>
                                            <div class="product__title h5">
                                                {{$product->title}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="swiper-button-next" id="swiper-button-next-1">
                        <svg width="15" height="23" viewBox="0 0 15 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 11.5L0 22.3253L0 0.674683L15 11.5Z" fill="#C4C4C4"/>
                        </svg>

                    </div>
                    <div class="swiper-button-prev" id="swiper-button-prev-1">
                        <svg width="15" height="23" viewBox="0 0 15 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 11.5L0 22.3253L0 0.674683L15 11.5Z" fill="#C4C4C4"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @if(!empty($popular))
        <section class="store-pr mt-4">
            <h2 class="store-pr__title page-title h2">
                Популярне
            </h2>
            <div class="store-pr__body">
                <div class="slider">
                    <div class="swiper popular-swiper">
                        <div class="swiper-wrapper">
                            @foreach($popular as $product)
                                <div class="swiper-slide">
                                    <a href="{{route("store.show", [$product->type->slug, $product->id])}}" class="product-list__item product">
                                        <div class="product__wrapper">
                                            <div class="product__image">
                                                <img src="{{$product->images->first()
                                            ? asset($product->images->first()->filename)
                                            : asset("app/img/test.png")}}" alt="Product">
                                            </div>

                                            <div data-product="{{$product->id}}" class="product__like like {{$user !== null && $product->likedBy()->where("user_id", $user->id)->exists() ? "like_liked" : ""}}">
                                                <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>

                                        </div>
                                        <div class="product__body">
                                            <div class="product__prices">
                                                <div class="product__price h3">{{$product->currentPrice()}} ₴</div>
                                                @if(isset($product->offer) && $product->offer > 0)
                                                    <div class="product__discount h6">{{$product->price}} ₴</div>
                                                @endif
                                            </div>
                                            <div class="product__title h5">
                                                {{$product->title}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next" id="swiper-button-next-2">
                        <svg width="15" height="23" viewBox="0 0 15 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 11.5L0 22.3253L0 0.674683L15 11.5Z" fill="#C4C4C4"/>
                        </svg>

                    </div>
                    <div class="swiper-button-prev" id="swiper-button-prev-2">
                        <svg width="15" height="23" viewBox="0 0 15 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 11.5L0 22.3253L0 0.674683L15 11.5Z" fill="#C4C4C4"/>
                        </svg>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="store-pr mt-2">
        <h2 class="store-pr__title page-title h2">
           {{!isset($activeType) ? "Всі товари" : $activeType->value }}
        </h2>
        <div class="product-list">
            @foreach($products as $product)
                <a href="{{route("store.show", [$product->type->slug, $product->id])}}" class="product-list__item product">
                    <div class="product__wrapper">
                        <div class="product__image">
                            <img src="{{$product->images->first()
                                            ? asset($product->images->first()->filename)
                                            : asset("app/img/test.png")}}" alt="Product">
                        </div>

                        <div data-product="{{$product->id}}" class="product__like like {{$user !== null && $product->likedBy()->where("user_id", $user->id)->exists() ? "like_liked" : ""}}">
                            <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>

                    </div>
                    <div class="product__body">
                        <div class="product__prices">
                            <div class="product__price h3">{{$product->currentPrice()}} ₴</div>
                            @if(isset($product->offer) && $product->offer > 0)
                                <div class="product__discount h6">{{$product->price}}₴</div>
                            @endif
                        </div>
                        <div class="product__title h5">
                            {{$product->title}}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $products->links('includes.pagination') }}
    </section>
@endsection

@once
    @push('js')
        <script src="{{ asset('app/js-min/store.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
