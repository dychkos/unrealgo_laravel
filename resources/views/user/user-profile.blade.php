@extends('layouts.base')

@section('content')
    <section class="user-profile">
        <div class="user-profile__title page-title h1">Информация пользователя</div>
        <div class="user-profile__body card">
            <div class="user-profile__content">
                <div class="user-profile__remove">
                          <span class="p">
                              Удалить аккаунт
                          </span>
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M5 2.08333C5 0.93274 5.93274 0 7.08333 0H10.8333C11.9839 0 12.9167 0.93274 12.9167 2.08333V2.5H17.0833C17.5436 2.5 17.9167 2.8731 17.9167 3.33333C17.9167 3.79357 17.5436 4.16667 17.0833 4.16667H16.0417V14.5833C16.0417 16.4243 14.5493 17.9167 12.7083 17.9167H5.20833C3.36738 17.9167 1.875 16.4243 1.875 14.5833V4.16667H0.833333C0.373096 4.16667 0 3.79357 0 3.33333C0 2.8731 0.373096 2.5 0.833333 2.5H5V2.08333ZM6.66667 2.5H11.25V2.08333C11.25 1.85321 11.0635 1.66667 10.8333 1.66667H7.08333C6.85322 1.66667 6.66667 1.85321 6.66667 2.08333V2.5ZM3.54167 4.16667V14.5833C3.54167 15.5038 4.28786 16.25 5.20833 16.25H12.7083C13.6288 16.25 14.375 15.5038 14.375 14.5833V4.16667H3.54167ZM8.95833 5.625C9.41857 5.625 9.79167 5.9981 9.79167 6.45833L9.79167 13.9583C9.79167 14.4186 9.41857 14.7917 8.95833 14.7917C8.4981 14.7917 8.125 14.4186 8.125 13.9583L8.125 6.45833C8.125 5.9981 8.4981 5.625 8.95833 5.625Z" fill="#A84F43"/>
                    </svg>

                </div>
                <div class="row">
                    <div class="user-profile__input-group col-12 col-md-6">
                        <label for="edit-photo" class="input-group__label p-light">Фото профиля</label>
                        <div class="edit-photo">
                            <div class="edit-photo__preview">
                                <img src="{{asset('app/img/profile.jpg')}}" alt="Profile">
                            </div>
                            <div class="edit-photo__edit">
                                <div class="form-input input-group__input" >
                                    <input type="file" class="edit-photo__input" id="edit-photo">
                                </div>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8V6H1C0.45 6 0 5.55 0 5C0 4.45 0.45 4 1 4H3V2C3 1.45 3.45 1 4 1C4.55 1 5 1.45 5 2V4H7C7.55 4 8 4.45 8 5C8 5.55 7.55 6 7 6H5V8C5 8.55 4.55 9 4 9C3.45 9 3 8.55 3 8ZM13 17C11.3431 17 10 15.6569 10 14C10 12.3431 11.3431 11 13 11C14.6569 11 16 12.3431 16 14C16 15.6569 14.6569 17 13 17ZM21 6C22.1 6 23 6.9 23 8V20C23 21.1 22.1 22 21 22H5C3.9 22 3 21.1 3 20V9.72C3.3 9.89 3.63 10 4 10C5.1 10 6 9.1 6 8V7H7C8.1 7 9 6.1 9 5C9 4.63 8.89 4.3 8.72 4H15.12C15.68 4 16.22 4.24 16.59 4.65L17.83 6H21ZM13 19C15.76 19 18 16.76 18 14C18 11.24 15.76 9 13 9C10.24 9 8 11.24 8 14C8 16.76 10.24 19 13 19Z" fill="#FDFFBA"/>
                                </svg>
                            </div>
                        </div>

                    </div>
                    <div class="user-profile__input-group input-group col-12 col-md-6">
                        <label for="edit-name" class="input-group__label p-light">Имя пользователя</label>
                        <div class="form-input input-group__input" >
                            <input type="text" id="edit-name" value="Sergey Dychko">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="user-profile__input-group input-group col-12 col-md-6">
                        <label for="edit-phone" class="input-group__label p-light">Номер телефона</label>
                        <div class="form-input input-group__input" >
                            <input type="text" id="edit-phone" value="+380 95 083 95 81">
                        </div>
                    </div>
                    <div class="user-profile__input-group input-group col-12 col-md-6">
                        <label for="edit-email" class="input-group__label p-light">Email</label>
                        <div class="form-input input-group__input">
                            <input type="text" id="edit-email" value="dychkosergey@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="user-profile__input-group input-group col-12 col-md-6">
                        <label for="edit-password" class="input-group__label p-light">Пароль</label>
                        <div class="form-input input-group__input" >
                            <input type="password" id="edit-password" value="">
                        </div>
                    </div>
                    <div class="user-profile__input-group input-group col-12 col-md-6">
                        <label for="confirm-password" class="input-group__label p-light">Подтверждения пароля</label>
                        <div class="form-input input-group__input">
                            <input type="password" id="confirm-password" value="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="user-profile__input-group confirm col col-md-6">
                        <input id="confirm" name="radio-group" type="checkbox" checked>
                        <label for="confirm" class="p-light">
                            Получать уведомления на почту
                        </label>
                    </div>
                </div>
                <div class="row">
                    <div class="user-profile__input-group coд">
                        <button class="user-profile__btn btn btn_primary h4">
                            Сохранить изменения
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
    @endpush
@endonce
