@extends("emails.layout")

@section("content")
    <div class="text" style="padding: 0 2.5em; text-align: center;">
        <h2>Замовлення скасовано ❌</h2>
        <p class="text-gray">Номер замовлення: <b>№ {{$order->id}}</b></p>
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

        <h4><a href="{{ route('store.index') }}" class="btn btn-primary">До магазину</a></h4>
    </div>
@endsection
