@extends("admin.layout.admin")

@section('content')
    @if ($errors->any())
        <div class="required_alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="admin-content__header">
        <div class="admin-content__title h1">Orders</div>
        <div class="admin-content__navigation">
            <a class="admin-content__add" href="{{ route('user.admin.index', 'orders') }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.9611 10.9611H3.54692L8.17942 6.32827C8.58525 5.92268 8.58525 5.26472 8.17942 4.85919C7.77358 4.45335 7.11563 4.45335 6.71039 4.85919L0.304377 11.2653C-0.101459 11.6709 -0.101459 12.3289 0.304377 12.7344L6.71039 19.1408C6.91325 19.3438 7.17911 19.4452 7.44491 19.4452C7.7107 19.4452 7.97656 19.3438 8.17942 19.1408C8.58525 18.7352 8.58525 18.0773 8.17942 17.6718L3.54692 13.0388H22.9611C23.5348 13.0388 24 12.5736 24 11.9999C24 11.4262 23.5348 10.9611 22.9611 10.9611Z" fill="#FDFFBA"/>
                </svg>
            </a>
        </div>
    </div>
    <form class="admin-one admin-form"
          action="{{route('user.admin.orders.update', $order->id)}}"
          enctype="multipart/form-data"
          method="POST">
        @csrf

        @if (session()->has('message'))
            <div class="success-message">
                {{session()->get('message')}}
            </div>
        @endif

        <div class="admin-row">
            <div class="admin-input form-input">
                <div class="dropdown">
                    @error("status_id")
                    <div class="required_alert">{{ $message }}</div>
                    @enderror
                    <label for="status">Вкажіть статус замовлення :</label>
                    <select name="status_id" id="status" class="select" class="{{ $errors->has('status_id') ? 'required' : '' }}">
                        @foreach($statuses as $status)
                        @if ($order->status->id === $status->id)
                                <option value="{{ $status->id }}" selected >{{ $status->title }}</option>
                            @else
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="admin-row row">
            <div class="col-3">
                <div class="h6">
                    Дата
                </div>
                <div class="p">
                    {{ $order->created_at->format('Y-m-d') }}
                </div>
            </div>
            <div class="col-3">
                <div class="h6">
                    ФІО покупця:
                </div>
                <div class="p">
                    {{ $order->data_name }}
                </div>
            </div>
            <div class="col-6">
                <div class="h6">
                    Номер заказа
                </div>
                <div class="p">
                    № {{ $order->id }}
                </div>
            </div>
        </div>
        <div class="admin-row">
          <div class="col-6">
              <div class="h6">
                  Сумма заказа
              </div>
              <div class="p">
                  {{ $order->total_price }}  UAH
              </div>
          </div>
            <div class="col-6">
                <div class="h6">
                    Статус
                </div>
                <div class="p">
                    {{ $order->status->title }}
                </div>
            </div>
        </div>
        <div class="admin-row">
            <div class="col-6">
                <div class="h6">
                    Адреса для доставки:
                </div>
                <div class="p">
                    місто: {{ $order->city }}
                </div>
            </div>
            <div class="col-6">
                <div class="h6">
                    Відділення
                </div>
                <div class="p">
                    {{ $order->department }}
                </div>
            </div>
        </div>
        <div class="admin-row d-flex flex-column mt-5">
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
                                <img src="{{ $item->product->images->first()
                                    ? asset($item->product->images->first()->filename)
                                    : asset("app/img/test.png") }}" alt="Product">
                            </div>
                            <div class="order-final__name">{{ $item->product->title }}</div>
                        </div>
                        <div class="order-final__count col-4">{{ $item->count }}</div>
                        <div class="order-final__price col-4">{{ $item->product->currentPrice() }} UAH</div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="admin-row">
            <button type="submit" class="btn btn_primary">Зберегти</button>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{asset('app/js/libs/Select.js')}}"></script>
    <script src="{{asset('app/js/admin.js')}}"></script>
@endpush
