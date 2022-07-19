@extends('layouts.base')

@section('content')
    <section class="basket">
        <div class="basket__title page-title h1">Кошик</div>
        <div class="basket__body card">
            <div class="row g-4">
                <div class="{{empty($cart) ? "col-12" : "col-lg-8"}} ">
                    <div class="orders">
                        @if(!empty($cart))
                            @foreach($cart as $key => $item)
                                <div class="order" data-item="{{ $key }}">
                                    <div class="order__image">
                                        <img src="{{$item["product"]->images->first()
                                            ? asset($item["product"]->images->first()->filename)
                                            : asset("app/img/test.png")}}" alt="Product">
                                        <div class="order__size h6">{{$item["product"]->sizes()->find($item["size_id"])->value}}</div>
                                    </div>
                                    <div class="order__title h5">
                                        {{ $item["product"]->title }}
                                    </div>
                                    <div class="order__actions">
                                        <div class="order__action count_minus" data-item="{{$key}}">
                                            <img src="{{asset("app/img/minus.svg")}}" class="order__action-image" alt="Minus">
                                        </div>
                                        <div class="order__count h5">{{$item["count"]}}</div>
                                        <div class="order__action count_plus" data-item="{{$key}}">
                                            <img src="{{asset("app/img/plus.svg")}}" class="order__action-image" alt="Plus">
                                        </div>
                                    </div>
                                    <div class="order__price h5">{{$item["product"]->currentPrice() * $item["count"]}} UAH</div>
                                    <a class="order__remove" href="{{route("basket.remove", $key)}}">
                                        <svg  id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                                              viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                              xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M256,33C132.3,33,32,133.3,32,257c0,123.7,100.3,224,224,224c123.7,0,224-100.3,224-224C480,133.3,379.7,33,256,33z    M364.3,332.5c1.5,1.5,2.3,3.5,2.3,5.6c0,2.1-0.8,4.2-2.3,5.6l-21.6,21.7c-1.6,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3L256,289.8   l-75.4,75.7c-1.5,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3l-21.6-21.7c-1.5-1.5-2.3-3.5-2.3-5.6c0-2.1,0.8-4.2,2.3-5.6l75.7-76   l-75.9-75c-3.1-3.1-3.1-8.2,0-11.3l21.6-21.7c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l75.7,74.7l75.7-74.7   c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l21.6,21.7c3.1,3.1,3.1,8.2,0,11.3l-75.9,75L364.3,332.5z"/></g></svg>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="empty col-12">
                                <img src="{{asset("app/img/empty.png")}}" class="empty__image" alt="Empty">
                                <h3 class="empty__title h3">Уппс, кошик до сих пір пустий</h3>
                                <a href="{{route("store.index")}}" class="btn btn_primary h6">
                                    Перейти до каталогу
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col {{empty($cart) ? "d-none" : "col-lg-4"}}">
                    <form class="make-order" id="make-order">
                        <div class="make-order__card">
                            <div class="make-order__title h3">
                                Форма замовлення
                            </div>
                            <div class="make-order__info">
                                @if ( env('APP_ENV', '') == 'local' )
                                    <div class="make-order__item">
                                        <div class="p">Промокод:</div>
                                        <div class="btn btn_primary btn_small p">
                                            Додати
                                        </div>
                                    </div>
                                @endif

                                <div class="make-order__item">
                                    <div class="p">Доставка: </div>
                                    <div class="h6" id="delivery_price">70 UAH</div>
                                </div>
                            </div>
                            <div class="make-order__form order-form">
                                <div class="order-form__input form-input">
                                    <input type="text" placeholder="Вкажіть ФІО" name="data_name">
                                </div>
                                <div class="order-form__input form-input">
                                    <input type="text" placeholder="+38 (___) ___-__-__" name="phone">
                                </div>
                                <div class="order-form__input form-input">
                                    <input type="email" placeholder="Електрона пошта" name="email">
                                </div>
                                <div class="order-form__input form-input">
                                    <input type="hidden" name="city" value="">
                                    <label for="order_city_dropdown" class="dropdown__label">Вкажіть ваше місто: </label>
                                    <select name="city_ref" id="order_city_dropdown">
                                    </select>
                                </div>
                                <div class="order-form__input form-input">
                                    <label for="order_department" class="dropdown__label">Виберіть відділ: </label>
                                    <select name="department" id="order_department">
                                    </select>
                                </div>
                            </div>
                            <div class="make-order__total">
                                <div class="p">Всього до сплати: </div>
                                <div class="h6" id="total_price">{{$totalPrice}} UAH</div>
                            </div>
                        </div>
                        <div class="required_alert p" style="display: none;">
                            Заповніть всі рядки
                        </div>
                        <div class="make-order__footer">
                            <button class="make-order__submit btn btn_primary h6">
                                Підтвердити замовлення
                            </button>
                            <div class="make-order__loader" style="display: none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" viewBox="0 0 38 38" stroke="#A5A815">
                                    <g fill="none" fill-rule="evenodd">
                                        <g transform="translate(1 1)" stroke-width="2">
                                            <circle stroke-opacity=".5" cx="18" cy="18" r="18"/>
                                            <path d="M36 18c0-9.94-8.06-18-18-18">
                                                <animateTransform attributeName="transform" type="rotate" from="0 18 18" to="360 18 18" dur="1s" repeatCount="indefinite"/>
                                            </path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{ asset('app/js-min/basket.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce

