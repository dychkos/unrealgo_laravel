@extends("emails.layout")

@section("content")
    <div class="text" style="padding: 0 2.5em; text-align: center;">
        <h2>Вітаємо</h2>
        <h3>Ви успішно зареєструвались!</h3>
        <h4><a href="{{ route('home') }}" class="btn btn-primary">На головну</a></h4>
    </div>
@endsection
