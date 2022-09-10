@extends("emails.layout")

@section("content")
    <div class="text" style="padding: 0 2.5em; text-align: center;">
        <h2>Замовлення скасовано</h2>
        <p class="text-gray">Номер замовлення: <b>№2342</b></p>
        <div class="table-responsive"><table>
                <thead>
                <tr>
                    <td>Товар</td>
                    <td>Кількість</td>
                    <td>Ціна</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="#">Футболкаasdsadsadasd sadasdasdas </a></td>
                    <td>2</td>
                    <td>7000 UAH</td>
                </tr>
                <tr>
                    <td>Футболка</td>
                    <td>2</td>
                    <td>7000 UAH</td>
                </tr>
                <tr>
                    <td>Футболка</td>
                    <td>2</td>
                    <td>7000 UAH</td>
                </tr>
                </tbody>
            </table></div>

        <h4><a href="{{ route('store.index') }}" class="btn btn-primary">До магазину</a></h4>
    </div>
@endsection
