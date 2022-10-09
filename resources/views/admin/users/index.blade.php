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
        <div class="admin-content__title h1">Users</div>
        <div class="admin-content__navigation">
            <a class="admin-content__add" href="{{ route('user.admin.index', 'users') }}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.9611 10.9611H3.54692L8.17942 6.32827C8.58525 5.92268 8.58525 5.26472 8.17942 4.85919C7.77358 4.45335 7.11563 4.45335 6.71039 4.85919L0.304377 11.2653C-0.101459 11.6709 -0.101459 12.3289 0.304377 12.7344L6.71039 19.1408C6.91325 19.3438 7.17911 19.4452 7.44491 19.4452C7.7107 19.4452 7.97656 19.3438 8.17942 19.1408C8.58525 18.7352 8.58525 18.0773 8.17942 17.6718L3.54692 13.0388H22.9611C23.5348 13.0388 24 12.5736 24 11.9999C24 11.4262 23.5348 10.9611 22.9611 10.9611Z" fill="#FDFFBA"/>
                </svg>
            </a>
        </div>
    </div>
    <form class="admin-one admin-form"
          action="{{ route('user.admin.users.update', $user->id) }}"
          enctype="multipart/form-data"
          method="POST">
        @csrf
        <div class="admin-row">
            <div class="admin-input form-input">
                <div class="dropdown">
                    @error("role_id")
                    <div class="required_alert">{{$message}}</div>
                    @enderror
                    <label for="role">Роль користувача :</label>
                    <select name="role_id" id="role" class="select" class="{{$errors->has('role_id') ? 'required' : '' }}">
                        @foreach($roles as $role)
                            @if ($user->role->id === $role->id)
                                <option value="{{ $role->id }}" selected >{{ $role->value }}</option>
                            @else
                                <option value="{{ $role->id }}" >{{ $role->value }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="admin-row row">
            <div class="col-6">
                <div class="h5">
                    Дата реєстрації
                </div>
                <div class="p">
                    {{ $user->created_at->format('Y-m-d') }}
                </div>
            </div>
            <div class="col-6">
                <div class="h5">
                  Ім'я користувача
                </div>
                <div class="p">
                   {{ $user->name }}
                </div>
            </div>
        </div>
        <div class="admin-row">
            <div class="col-6">
                <div class="h5">
                    Email
                </div>
                <div class="p">
                    {{ $user->email }}
                </div>
            </div>
            <div class="col-6">
                <div class="h5">
                    Номер телефону
                </div>
                <div class="p">
                    {{ $user->phone ?? "Не вказаний"}}
                </div>
            </div>
        </div>
        <div class="admin-row">
            <button type="submit" class="btn btn_primary">Зберегти</button>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('application/js-min/admin.min.js?v=' . random_int(1000, 9999)) }}"></script>
@endpush
