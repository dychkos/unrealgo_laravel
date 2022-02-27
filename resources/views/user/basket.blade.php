@extends('layouts.base')

@section('content')
    <section class="basket">
        <div class="basket__title page-title h1">Корзина</div>
        <div class="basket__body card">
            <div class="row g-4">
                <div class="col-lg-8">
                    <div class="orders">
                        <div class="order">
                            <div class="order__image">
                                <img src="../../../../../../Store/Devs/unrgo_template/app/img/tshirt.png" alt="Product">
                            </div>
                            <div class="order__title h5">
                                Футболка unrgo simple
                            </div>
                            <div class="order__actions">
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                                <div class="order__count h5">5</div>
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                            </div>
                            <div class="order__price h5">1200 UAH</div>
                            <div class="order__remove">
                                <svg  id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                                      viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M256,33C132.3,33,32,133.3,32,257c0,123.7,100.3,224,224,224c123.7,0,224-100.3,224-224C480,133.3,379.7,33,256,33z    M364.3,332.5c1.5,1.5,2.3,3.5,2.3,5.6c0,2.1-0.8,4.2-2.3,5.6l-21.6,21.7c-1.6,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3L256,289.8   l-75.4,75.7c-1.5,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3l-21.6-21.7c-1.5-1.5-2.3-3.5-2.3-5.6c0-2.1,0.8-4.2,2.3-5.6l75.7-76   l-75.9-75c-3.1-3.1-3.1-8.2,0-11.3l21.6-21.7c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l75.7,74.7l75.7-74.7   c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l21.6,21.7c3.1,3.1,3.1,8.2,0,11.3l-75.9,75L364.3,332.5z"/></g></svg>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order__image">
                                <img src="../../../../../../Store/Devs/unrgo_template/app/img/tshirt.png" alt="Product">
                            </div>
                            <div class="order__title h5">
                                Футболка unrgo simple black edition
                            </div>
                            <div class="order__actions">
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                                <div class="order__count">5</div>
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                            </div>
                            <div class="order__price h5">1200 UAH</div>
                            <div class="order__remove">
                                <svg  id="Layer_1"
                                      viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M256,33C132.3,33,32,133.3,32,257c0,123.7,100.3,224,224,224c123.7,0,224-100.3,224-224C480,133.3,379.7,33,256,33z    M364.3,332.5c1.5,1.5,2.3,3.5,2.3,5.6c0,2.1-0.8,4.2-2.3,5.6l-21.6,21.7c-1.6,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3L256,289.8   l-75.4,75.7c-1.5,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3l-21.6-21.7c-1.5-1.5-2.3-3.5-2.3-5.6c0-2.1,0.8-4.2,2.3-5.6l75.7-76   l-75.9-75c-3.1-3.1-3.1-8.2,0-11.3l21.6-21.7c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l75.7,74.7l75.7-74.7   c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l21.6,21.7c3.1,3.1,3.1,8.2,0,11.3l-75.9,75L364.3,332.5z"/></g></svg>
                            </div>
                        </div>
                        <div class="order">
                            <div class="order__image">
                                <img src="../../../../../../Store/Devs/unrgo_template/app/img/tshirt.png" alt="Product">
                            </div>
                            <div class="order__title h5">
                                Футболка unrgo simple
                            </div>
                            <div class="order__actions">
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                                <div class="order__count">5</div>
                                <div class="order__action">
                                    <svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </div>
                            </div>
                            <div class="order__price h5">1200 UAH</div>
                            <div class="order__remove">
                                <svg  id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1"
                                      viewBox="0 0 512 512"  xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                      xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M256,33C132.3,33,32,133.3,32,257c0,123.7,100.3,224,224,224c123.7,0,224-100.3,224-224C480,133.3,379.7,33,256,33z    M364.3,332.5c1.5,1.5,2.3,3.5,2.3,5.6c0,2.1-0.8,4.2-2.3,5.6l-21.6,21.7c-1.6,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3L256,289.8   l-75.4,75.7c-1.5,1.6-3.6,2.3-5.6,2.3c-2,0-4.1-0.8-5.6-2.3l-21.6-21.7c-1.5-1.5-2.3-3.5-2.3-5.6c0-2.1,0.8-4.2,2.3-5.6l75.7-76   l-75.9-75c-3.1-3.1-3.1-8.2,0-11.3l21.6-21.7c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l75.7,74.7l75.7-74.7   c1.5-1.5,3.5-2.3,5.6-2.3c2.1,0,4.1,0.8,5.6,2.3l21.6,21.7c3.1,3.1,3.1,8.2,0,11.3l-75.9,75L364.3,332.5z"/></g></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-4">
                    <form class="make-order">
                        <div class="make-order__card required">
                            <div class="make-order__title h3">
                                Итог
                            </div>
                            <div class="make-order__info">
                                <div class="make-order__item">
                                    <div class="p">Промокод:</div>
                                    <div class="btn btn_primary btn_small p">
                                        Добавить
                                    </div>
                                </div>
                                <div class="make-order__item">
                                    <div class="p">Доставка: </div>
                                    <div class="h6" id="delivery_price">70 UAH</div>
                                </div>
                            </div>
                            <div class="make-order__form order-form">
                                <div class="order-form__input form-input">
                                    <input class="required" type="text" placeholder="Введите имя">
                                </div>
                                <div class="order-form__input form-input">
                                    <input class="required" type="text" placeholder="Введите номер телефона">
                                </div>
                                <div class="order-form__input form-input">
                                    <div class="dropdown" id="order_city_dropdown">
                                        <label for="order_city" class="dropdown__label">Укажите ваш город: </label>
                                        <input type="text" id="order_city" autocomplete="off" class="dropdown__input" placeholder="Начните вводить">
                                        <div class="dropdown__body">
                                        </div>
                                    </div>
                                </div>
                                <div class="order-form__input form-input">
                                    <div class="dropdown" id="order_department_dropdown">
                                        <label for="order_department" class="dropdown__label">Выберите отделение: </label>
                                        <input type="text" id="order_department" autocomplete="false" class="dropdown__input required" placeholder="Начните вводить">
                                        <div class="dropdown__body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="make-order__total">
                                <div class="p">Всего к оплате: </div>
                                <div class="h6">4410 UAH</div>
                            </div>
                        </div>
                        <div class="required_alert p">
                            Заполните необходимые поля
                        </div>
                        <button class="make-order__submit btn btn_primary h4">
                            Подтвердить заказ
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
        <script src="{{asset('app/js/basket.js')}}"></script>
    @endpush
@endonce

