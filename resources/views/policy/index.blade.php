@extends("layouts.base");

@section("content")
    <section class="template">
        {!! $content !!}
    </section>
@endsection

@once
    @push('js')
        <script src="{{ asset('app/js-min/default.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
