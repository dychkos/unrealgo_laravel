@extends('layouts.base')

@section('content')
    <section class="order-history">
        <div class="order-history__title page-title h1">Історія замовлення</div>
        <div class="order-history__body card">
            @if(count($orders) < 1)
                <div class="order-history__empty empty">
                    <img src="{{asset("app/img/empty.png")}}" class="empty__image" alt="Empty">
                    <h3 class="empty__title h3">Ще не зробили жодного замовлення</h3>
                    <a class="btn btn_primary h4" href="{{route("store.index")}}" style="color: #fff">
                        Перейти до каталогу
                    </a>
                </div>
            @else
                <div class="order-history__header">
                    <div class="order-history__quick-nav quick-nav">
                        <div class="quick-nav__item quick-nav__item_active" data-nav="all" >Всі замовлення <span class="count">( {{count($orders)}} )</span></div>
                        <div class="quick-nav__item {{count($waiting) > 0 ? "" : "quick-nav__item_disabled"}}" data-nav="waiting">В обробці <span class="count">( {{count($waiting)}} )</span></div>
                        <div class="quick-nav__item {{count($ready) > 0 ? "" : "quick-nav__item_disabled"}}" data-nav="ready">Завершені <span class="count">( {{count($ready)}} )</span></div>
                        <div class="quick-nav__item  {{count($canceled) > 0 ? "" : "quick-nav__item_disabled"}}" data-nav="canceled">Скасовані <span class="count">({{ count($canceled )}} )</span></div>
                    </div>
                    <div class="order-history__help-link help-link">
                        Допомога
                    </div>
                </div>
                <div class="order-history__order-list nav-active" id="all">
                    @foreach($orders as $order)
                        <div class="order-history__order order-final {{$order->status->value == "canceled" ? "order-final_inActive" : ""}}">
                            <div class="order-final__title">
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Дата
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->created_at->format('Y-m-d')}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Номер замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        № {{$order->id}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Сума замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->total_price}}  UAH
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Статус
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->status->title}}
                                    </div>
                                </div>
                            </div>
                            <div class="order-final__body">
                                <div class="order-final__body-title row">
                                    <div class="order-final__body-label col-4 p-light">Товар</div>
                                    <div class="order-final__body-label col-4 p-light">Кількість</div>
                                    <div class="order-final__body-label col-4 p-light">Ціна</div>
                                </div>
                                <div class="order-final__item-list">
                                    @foreach($order->items as $item)
                                        <div class="order-final__item row">
                                            <div class="order-final__product col-4">
                                                <div class="order-final__image">
                                                    <img src="{{$item->product->images->first()
                                    ? asset($item->product->images->first()->filename)
                                    : asset("app/img/test.png")}}" alt="Product">
                                                </div>
                                                <div class="order-final__name">{{$item->product->title}}</div>
                                            </div>
                                            <div class="order-final__count col-4">{{$item->count}}</div>
                                            <div class="order-final__price col-4">{{$item->product->currentPrice()}} UAH</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="order-final__button {{$order->status->value == "waiting" ? "" : "d-none"}}">
                                <a href="{{route("store.cancel-order", $order->id)}}" class="btn btn_danger h4">
                                    Скасувати замовлення
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="order-history__order-list" id="waiting" style="display: none">
                    @foreach($waiting as $order)
                        <div class="order-history__order order-final">
                            <div class="order-final__title">
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Дата
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->created_at->format('Y-m-d')}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Номер замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        № {{$order->id}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Сума замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->total_price}}  UAH
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Статус
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->status->title}}
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
                                    @foreach($order->items as $item)
                                        <div class="order-final__item row">
                                            <div class="order-final__product col-4">
                                                <div class="order-final__image">
                                                    <img src="{{$item->product->images->first()
                                    ? asset($item->product->images->first()->filename)
                                    : asset("app/img/test.png")}}" alt="Product">
                                                </div>
                                                <div class="order-final__name">{{$item->product->title}}</div>
                                            </div>
                                            <div class="order-final__count col-4">{{$item->count}}</div>
                                            <div class="order-final__price col-4">{{$item->product->currentPrice()}} UAH</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="order-final__button {{$order->status->value == "waiting" ? "" : "d-none"}}">
                                <a href="{{route("store.cancel-order", $order->id)}}" class="btn btn_danger h4">
                                    Скасувати замовлення
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="order-history__order-list" id="ready" style="display: none">
                    @foreach($ready as $order)
                        <div class="order-history__order order-final">
                            <div class="order-final__title">
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Дата
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->created_at->format('Y-m-d')}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Номер замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        № {{$order->id}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Сума замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->total_price}}  UAH
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Статус
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->status->title}}
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
                                    @foreach($order->items as $item)
                                        <div class="order-final__item row">
                                            <div class="order-final__product col-4">
                                                <div class="order-final__image">
                                                    <img src="{{$item->product->images->first()
                                    ? asset($item->product->images->first()->filename)
                                    : asset("app/img/test.png")}}" alt="Product">
                                                </div>
                                                <div class="order-final__name">{{$item->product->title}}</div>
                                            </div>
                                            <div class="order-final__count col-4">{{$item->count}}</div>
                                            <div class="order-final__price col-4">{{$item->product->currentPrice()}} UAH</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="order-history__order-list" id="canceled" style="display: none">
                    @foreach($canceled as $order)
                        <div class="order-history__order order-final">
                            <div class="order-final__title">
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Дата
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->created_at->format('Y-m-d')}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Номер замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        № {{$order->id}}
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Сума замовлення
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->total_price}}  UAH
                                    </div>
                                </div>
                                <div class="order-final__info">
                                    <div class="order-final__info-label p-light">
                                        Статус
                                    </div>
                                    <div class="order-final__info-value p">
                                        {{$order->status->title}}
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
                                    @foreach($order->items as $item)
                                        <div class="order-final__item row">
                                            <div class="order-final__product col-4">
                                                <div class="order-final__image">
                                                    <img src="{{$item->product->images->first()
                                    ? asset($item->product->images->first()->filename)
                                    : asset("app/img/test.png")}}" alt="Product">
                                                </div>
                                                <div class="order-final__name">{{$item->product->title}}</div>
                                            </div>
                                            <div class="order-final__count col-4">{{$item->count}}</div>
                                            <div class="order-final__price col-4">{{$item->product->currentPrice()}} UAH</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
        <script src="{{asset('app/js/orders.js')}}"></script>
    @endpush
@endonce

