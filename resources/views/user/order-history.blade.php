@extends('layouts.base')

@section('content')
    <section class="order-history">
        <div class="order-history__title page-title h1">История заказов</div>
        <div class="order-history__body card">
            <div class="order-history__header">
                <div class="order-history__quick-nav quick-nav">
                    <div class="quick-nav__item quick-nav__item_active">Все заказы <span class="count">( 12 )</span></div>
                    <div class="quick-nav__item">В обработке <span class="count">( 4 )</span></div>
                    <div class="quick-nav__item">Завершённые <span class="count">( 4 )</span></div>
                    <div class="quick-nav__item quick-nav__item_disabled">Отмененные <span class="count">( 0 )</span></div>
                </div>
                <div class="order-history__help-link help-link">
                    Помощь
                </div>
            </div>
            <div class="order-history__empty empty" style="display: none">
                <img src="../../../../../Store/Devs/unrgo_template/app/img/emoty.png" class="empty__image" alt="Empty">
                <h3 class="empty__title h3">История заказов пустая</h3>
                <button class="btn btn_primary h4">
                    Перейти в каталог
                </button>
            </div>
            <div class="order-history__order-list">
                <div class="order-history__order order-final">
                    <div class="order-final__title">
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Дата
                            </div>
                            <div class="order-final__info-value p">
                                10.01.2022
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Номер заказа
                            </div>
                            <div class="order-final__info-value p">
                                № 231 897
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Сумма заказа
                            </div>
                            <div class="order-final__info-value p">
                                3 400 UAH
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Статус
                            </div>
                            <div class="order-final__info-value p">
                                Ожидает подтверждения
                            </div>
                        </div>
                    </div>
                    <div class="order-final__body">
                        <div class="order-final__body-title row">
                            <div class="order-final__body-label col-4 p-light">Товар</div>
                            <div class="order-final__body-label col-4 p-light">Количество</div>
                            <div class="order-final__body-label col-4 p-light">Цена</div>
                        </div>
                        <div class="order-final__item-list">
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-final__button">
                        <button class="btn btn_danger h4">
                            Отменить заказ
                        </button>
                    </div>

                </div>
                <div class="order-history__order order-final">
                    <div class="order-final__title">
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Дата
                            </div>
                            <div class="order-final__info-value p">
                                10.01.2022
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Номер заказа
                            </div>
                            <div class="order-final__info-value p">
                                № 231 897
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Сумма заказа
                            </div>
                            <div class="order-final__info-value p">
                                3 400 UAH
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Статус
                            </div>
                            <div class="order-final__info-value p">
                                Ожидает подтверждения
                            </div>
                        </div>
                    </div>
                    <div class="order-final__body">
                        <div class="order-final__body-title row">
                            <div class="order-final__body-label col-4 p-light">Товар</div>
                            <div class="order-final__body-label col-4 p-light">Количество</div>
                            <div class="order-final__body-label col-4 p-light">Цена</div>
                        </div>
                        <div class="order-final__item-list">
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-final__button">
                        <button class="btn btn_danger h4">
                            Отменить заказ
                        </button>
                    </div>

                </div>
                <div class="order-history__order order-final order-final_inActive">
                    <div class="order-final__title">
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Дата
                            </div>
                            <div class="order-final__info-value p">
                                10.01.2022
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Номер заказа
                            </div>
                            <div class="order-final__info-value p">
                                № 231 897
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Сумма заказа
                            </div>
                            <div class="order-final__info-value p">
                                3 400 UAH
                            </div>
                        </div>
                        <div class="order-final__info">
                            <div class="order-final__info-label p-light">
                                Статус
                            </div>
                            <div class="order-final__info-value p">
                                Ожидает подтверждения
                            </div>
                        </div>
                    </div>
                    <div class="order-final__body">
                        <div class="order-final__body-title row">
                            <div class="order-final__body-label col-4 p-light">Товар</div>
                            <div class="order-final__body-label col-4 p-light">Количество</div>
                            <div class="order-final__body-label col-4 p-light">Цена</div>
                        </div>
                        <div class="order-final__item-list">
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                            <div class="order-final__item row">
                                <div class="order-final__product col-4">
                                    <div class="order-final__image">
                                        <img src="../../../../../Store/Devs/unrgo_template/app/img/order_item.png" alt="Order Item">
                                    </div>
                                    <div class="order-final__name">Футболка unrgo simple</div>
                                </div>
                                <div class="order-final__count col-4">4</div>
                                <div class="order-final__price col-4">1 200 UAH</div>
                            </div>
                        </div>
                    </div>
                    <div class="order-final__button">
                        <button class="btn btn_danger h4">
                            Отменить заказ
                        </button>
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
    @endpush
@endonce

