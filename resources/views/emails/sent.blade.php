@extends("emails.layout")

@section("content")
    <div class="text" style="padding: 0 2.5em; text-align: center;">
        <h2>Замовлення відправлено 🚚</h2>
        <p class="text-gray">Номер замовлення: <b>№ {{$order->id}}</b></p>
        <p>До сплати: <b>{{ $order->total_price }}  UAH</b></p>
        <div class="table-responsive"><table>
                <thead>
                <tr>
                    <td>Товар</td>
                    <td>Кількість</td>
                    <td>Ціна</td>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td><a href="{{ route("store.show", [$item->product->type->slug, $item->product->id]) }}">{{$item->product->title }}</a></td>
                        <td>{{$item->count}}</td>
                        <td>{{$item->product->currentPrice()}} UAH</td>
                    </tr>
                @endforeach
                </tbody>
            </table></div>
        <p>Номер накладної: <b>{{ $order->invoice_code }}</b></p>

        <h4><a href="{{ route('user.order-history') }}" class="btn btn-primary">Мої замовлення</a></h4>
    </div>
@endsection
