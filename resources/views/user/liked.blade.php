@extends('layouts.base')

@section('content')
    <section class="liked-page">
        <div class="liked-page page-title h1">Избранное</div>
        <div class="liked-page card">
            <div class="liked-page__body">
                <div class="liked-page__header">
                    <div class="liked-page__price p">
                        Добавлено товаров на сумму: <span class="price">5400 UAH</span>
                    </div>
                    <div class="liked-page__actions">
                        <div class="liked-page__make-order btn btn_primary">
                            Оформить заказ
                        </div>
                        <div class="liked-page__clear-liked btn">
                            Очистить избранное
                        </div>
                    </div>
                </div>
                <div class="liked-page__content">
                    <div class="liked-page__liked row row-cols-1 row-cols-md-2">
                        <div class="product product_secondary col">
                            <div class="product__wrapper">
                                <div class="product__image">
                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                </div>
                                <div class="product__like like">
                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="product__body">
                                <div class="product__prices">
                                    <div class="product__price h3">1 340 ₽</div>
                                    <div class="product__discount h6">5 340 ₽</div>
                                </div>
                                <div class="product__title h5">
                                    Ежедневник фирмаГ
                                    planner
                                </div>
                            </div>
                        </div>
                        <div class="product product_secondary col">
                            <div class="product__wrapper">
                                <div class="product__image">
                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                </div>
                                <div class="product__like like">
                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="product__body">
                                <div class="product__prices">
                                    <div class="product__price h3">1 340 ₽</div>
                                    <div class="product__discount h6">5 340 ₽</div>
                                </div>
                                <div class="product__title h5">
                                    Ежедневник фирмаГ
                                    planner
                                </div>
                            </div>
                        </div>
                        <div class="product product_secondary col">
                            <div class="product__wrapper">
                                <div class="product__image">
                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                </div>
                                <div class="product__like like">
                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="product__body">
                                <div class="product__prices">
                                    <div class="product__price h3">1 340 ₽</div>
                                    <div class="product__discount h6">5 340 ₽</div>
                                </div>
                                <div class="product__title h5">
                                    Ежедневник фирмаГ
                                    planner
                                </div>
                            </div>
                        </div>
                        <div class="product product_secondary col">
                            <div class="product__wrapper">
                                <div class="product__image">
                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                </div>
                                <div class="product__like like">
                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="product__body">
                                <div class="product__prices">
                                    <div class="product__price h3">1 340 ₽</div>
                                    <div class="product__discount h6">5 340 ₽</div>
                                </div>
                                <div class="product__title h5">
                                    Ежедневник фирмаГ
                                    planner
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="liked-page__recommended">
                        <div class="liked-page__subtitle h3">Рекоммендуемые товары</div>
                        <div class="slider">
                            <div class="swiper recommended-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product-list__item product product_secondary">
                                            <div class="product__wrapper">
                                                <div class="product__image">
                                                    <img src="../../../../../Store/Devs/unrgo_template/app/img/test.png" alt="Product">
                                                </div>
                                                <div class="product__like like">
                                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>

                                            </div>
                                            <div class="product__body">
                                                <div class="product__prices">
                                                    <div class="product__price h3">1 340 ₽</div>
                                                    <div class="product__discount h6">5 340 ₽</div>
                                                </div>
                                                <div class="product__title h5">
                                                    Ежедневник фирмаГ
                                                    planner
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
        <script src="{{asset('app/js/liked.js')}}"></script>
    @endpush
@endonce

