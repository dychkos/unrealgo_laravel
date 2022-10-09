@extends("layouts.base");

@section("content")
    <section class="template">
       <div style="margin: 60px auto; text-align: center">
           <h1>Успішно ✅</h1>
           <h6 style="margin-top: 16px">Вам вдалось відписатись від розсилання електронної пошти</h6>
           <p>Ви можете увімкунти опцію в налаштуваннях свого профілю</p>
       </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{ asset('application/js-min/default.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
