@extends("emails.layout")

@section("content")
    <div style="font-family: 'Rubik', sans-serif; padding: 0 2.5em; text-align: center;">
        <h2>Замовлення скасовано ❌</h2>
        <p style="color: rgba(0,0,0,.5);">Номер замовлення: <b>№ {{$order->id}}</b></p>
        <div><table
                style="
                width: 100%;
                margin: 30px 10px!important;">
                <thead>
                <tr>
                    <td style="color: rgba(0,0,0,.4); padding-bottom: 12px; font-weight: 500;">Товар</td>
                    <td style="color: rgba(0,0,0,.4); padding-bottom: 12px; font-weight: 500;">Кількість</td>
                    <td style="color: rgba(0,0,0,.4); padding-bottom: 12px; font-weight: 500;">Ціна</td>
                </tr>
                </thead>
                <tbody>
                @foreach($order->items as $item)
                    <tr>
                          <td style="color: #191a29;
                            padding-bottom: 12px;
                            width: 250px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;"
                        ><a href="{{ route("store.show", [$item->product->type->slug, $item->product->id]) }}">{{$item->product->title }}</a></td>
                          <td style="color: #191a29;
                            padding-bottom: 12px;
                            width: 250px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;"
                        >{{$item->count}}</td>
                          <td style="color: #191a29;
                            padding-bottom: 12px;
                            width: 250px;
                            white-space: nowrap;
                            overflow: hidden;
                            text-overflow: ellipsis;"
                        >{{$item->product->currentPrice()}} UAH</td>
                    </tr>
                @endforeach
                </tbody>
            </table></div>

        <h4><a href="{{ route('store.index') }}" style="
        padding: 10px 25px;
        display: inline-block;
        border-radius: 20px;
        background: #A5A815;
        color: #ffffff;
        ">До магазину</a></h4>
    </div>
@endsection
