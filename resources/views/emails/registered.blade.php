@extends("emails.layout")

@section("content")
    <div class="text" style="font-family: 'Rubik', serif; padding: 0 2.5em; text-align: center;">
        <h2>Вітаємо</h2>
        <h3>Ви успішно зареєструвались!</h3>
        <h4><a href="{{ route('store.index') }}" style="
        padding: 10px 25px;
        display: inline-block;
        border-radius: 20px;
        background: #A5A815;
        color: #ffffff;
        ">На головну</a></h4>
    </div>
@endsection
