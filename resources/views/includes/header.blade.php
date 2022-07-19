@php($user = \Illuminate\Support\Facades\Auth::user())
@php($cart = \Illuminate\Support\Facades\Session::get("cart"))

<header class="header" id="header">
    <div id="top"></div>
    <div class="header-desktop">
        <div class="container header__row">
            <div class="header__col">
                <a class="header__logo logo" href="{{ asset(route('home')) }}">
                    <div class="logo__image">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 684.65 668.08"><defs><style>.cls-1{fill:#ffffff;}</style></defs><g data-name="Слой 5"><path class="cls-1" d="M498.5,841.5c69-40,123-96,174-159A485.21,485.21,0,0,1,534,585a480.64,480.64,0,0,1-98.5-144.5A799,799,0,0,1,388,180l-76,16a610.27,610.27,0,0,0,55,275A486.43,486.43,0,0,0,558.9,700.93l-61.9,49c-46-38.07-116-97.41-174.52-209.41C255.33,411.88,243,286.13,239,222.19L161.35,255a740.61,740.61,0,0,0,77.26,295.33,797.31,797.31,0,0,0,129,180A806.59,806.59,0,0,0,498.5,841.5Z" transform="translate(-161.35 -173.42)"/></g><g id="Слой_8" data-name="Слой 8"><path class="cls-1" d="M463,174" transform="translate(-161.35 -173.42)"/><path class="cls-1" d="M831,324c4.26-20.79,14.9-64,15-65-45.37-22.22-113.79-52.54-190.33-68.67A788.36,788.36,0,0,0,463,174a436.32,436.32,0,0,0,78.09,306,455.84,455.84,0,0,0,179,139.44,480.51,480.51,0,0,0,32.24-51.11A498.84,498.84,0,0,0,779,511.67a373.18,373.18,0,0,0,34.67-100l-48.95-24.11-40.39-19.89a343.85,343.85,0,0,0-92-30c9.56,16.22,57.82,90.43,63.34,96L725,447l-36,75c-15.79-9.64-32.3-24.58-52-44a282.69,282.69,0,0,1-41-51c-17-22-28.11-50.89-38.41-82.9-11.22-34.83-13.74-75-17.59-102.1,55,2,99.36,16.23,146,29l79,27Z" transform="translate(-161.35 -173.42)"/></g></svg>
                    </div>
                    <div class="logo__text">
                        <span class="h4">UnReal GO</span>
                    </div>
                </a>
            </div>
            <div class="header__col">
                <div class="header__link search__wrapper">
                    <div data-desktop="true" class="search">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 21L16.65 16.65" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="search__input">
                            <input class="h5" type="text" placeholder="Що знайти?">
                        </div>
                        <div class="search__results">
                            <div class="search__results-body">

                            </div>
                             <div class="search__loader loader" style="display: none">
                                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                       <circle cx="50" cy="50" fill="none" stroke="#a5a815" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                         <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="0.7042253521126761s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                       </circle>
                                    </svg>
                             </div>
                            <div class="search__empty h5" style="display: none">
                                Нічого не знайдено &#128577;
                            </div>
                        </div>
                    </div>
                </div>
                <a class="header__link basket" href="{{ route("basket") }}">
                    <span class="basket__notification">{{ isset($cart) ? count($cart) : 0}}</span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.94 18.06L19.26 8.31C19.1452 7.47997 18.7404 6.71734 18.1171 6.15725C17.4939 5.59716 16.6925 5.27576 15.855 5.25H15.75C15.75 4.25544 15.3549 3.30161 14.6516 2.59835C13.9484 1.89509 12.9946 1.5 12 1.5C11.0054 1.5 10.0516 1.89509 9.34834 2.59835C8.64508 3.30161 8.24999 4.25544 8.24999 5.25H8.14499C7.30746 5.27576 6.50608 5.59716 5.88285 6.15725C5.25961 6.71734 4.85475 7.47997 4.73999 8.31L3.05999 18.06C2.95681 18.6256 2.97924 19.2071 3.12569 19.7631C3.27215 20.3191 3.53905 20.8361 3.90749 21.2775C4.21794 21.6565 4.60801 21.9625 5.05001 22.1738C5.49201 22.385 5.9751 22.4964 6.46499 22.5H17.535C18.0249 22.4964 18.508 22.385 18.95 22.1738C19.392 21.9625 19.7821 21.6565 20.0925 21.2775C20.4609 20.8361 20.7278 20.3191 20.8743 19.7631C21.0208 19.2071 21.0432 18.6256 20.94 18.06ZM12 3C12.5967 3 13.169 3.23705 13.591 3.65901C14.0129 4.08097 14.25 4.65326 14.25 5.25H9.74999C9.74999 4.65326 9.98705 4.08097 10.409 3.65901C10.831 3.23705 11.4033 3 12 3ZM18.945 20.31C18.7755 20.522 18.5612 20.6938 18.3174 20.8131C18.0736 20.9325 17.8064 20.9963 17.535 21H6.46499C6.1936 20.9963 5.9264 20.9325 5.6826 20.8131C5.43881 20.6938 5.22447 20.522 5.05499 20.31C4.82644 20.0365 4.66146 19.7157 4.57197 19.3707C4.48247 19.0257 4.4707 18.6651 4.53749 18.315L6.21749 8.565C6.27332 8.08382 6.49734 7.63782 6.85001 7.30574C7.20268 6.97365 7.66132 6.77683 8.14499 6.75H15.855C16.3387 6.77683 16.7973 6.97365 17.15 7.30574C17.5026 7.63782 17.7267 8.08382 17.7825 8.565L19.4625 18.315C19.5293 18.6651 19.5175 19.0257 19.428 19.3707C19.3385 19.7157 19.1735 20.0365 18.945 20.31Z" fill="white"></path>
                    </svg>
                </a>
                <div class="header__link">
                    <a href="{{ route('articles.index') }}" class="h6 link">Блог</a>
                </div>
                <div class="header__link">
                    <a href="{{ route("store.index") }}" class="h6 link">Магазин</a>
                </div>
                @if( \Illuminate\Support\Facades\Auth::check())
                    <div class="user-dropdown__preview">
                        <div class="user-dropdown__image">
                            <img src="{{ isset($user->image)
                                    ? asset($user->image->filename)
                                    : asset('app/img/avatar-default.png') }}"
                                 alt="user icon" />
                            <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.75 2.25L9.5 9.75L17.25 2.25" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                @else
                    <a href="{{route('login.index')}}">
                        <button class="btn btn_primary h6">
                            Увійти
                        </button>
                    </a>
                @endif

            </div>
        </div>
        <div class="user-dropdown header__row">
            <div class="container">
                <div class="user-dropdown__body">
                    <div class="user-dropdown__item link">
                        <i class="fa fa-cart-shopping"></i>
                        <span class="h5"><a href="{{asset(route('basket'))}}">Кошик</a></span>
                    </div>
                    <div class="user-dropdown__item link">
                        <i class="fa-regular fa-heart"></i>
                        <span class="h5"><a href="{{asset(route('user.liked'))}}">Вподобане</a></span>
                    </div>
                    <div class="user-dropdown__item link">
                        <i class="fa fa-bars"></i>
                        <span class="h5"><a href="{{asset(route('user.order-history'))}}">Мої замовлення</a></span>
                    </div>
                    <div class="user-dropdown__item link">
                        <i class="fa-regular fa-user"></i>
                        <span class="h5"><a href="{{asset(route('user.profile'))}}">Профіль</a></span>
                    </div>
                    @if (isset($user) && $user->isAdmin())
                        <div class="user-dropdown__item link">
                            <i class="fa-brands fa-angellist"></i>
                            <span class="h5"><a href="{{asset(route('user.admin.index'))}}" >Адмін-панель</a></span>
                        </div>
                    @endif
                    <div class="user-dropdown__item link link_danger">
                       <span class="h5">
                           <a href="{{ route('logout') }}">
                               Вийти
                           </a>
                       </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="container">
            <div class="header__row">
                <div class="header-mobile__col col">
                    <div data-mobile="true" class="search search_white">
                        <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="none">
                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 21L16.65 16.65" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <div class="search__input">
                            <input class="h5" type="text" placeholder="Що знайти?">
                        </div>
                        <div class="search__results">
                            <div class="search__results-body">

                            </div>
                            <div class="search__loader loader" style="display: none">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                    <circle cx="50" cy="50" fill="none" stroke="#a5a815" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                        <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="0.7042253521126761s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                                    </circle>
                                </svg>
                            </div>
                            <div class="search__empty h5" style="display: none">
                                Нічого не знайдено &#128577;
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-mobile__col col">
                    <a class="logo" href="{{ asset(route('home')) }}">
                        <div class="logo__image">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 684.65 668.08"><defs><style>.cls-1{fill:#191a29;}</style></defs><g id="Слой_5" data-name="Слой 5"><path class="cls-1" d="M498.5,841.5c69-40,123-96,174-159A485.21,485.21,0,0,1,534,585a480.64,480.64,0,0,1-98.5-144.5A799,799,0,0,1,388,180l-76,16a610.27,610.27,0,0,0,55,275A486.43,486.43,0,0,0,558.9,700.93l-61.9,49c-46-38.07-116-97.41-174.52-209.41C255.33,411.88,243,286.13,239,222.19L161.35,255a740.61,740.61,0,0,0,77.26,295.33,797.31,797.31,0,0,0,129,180A806.59,806.59,0,0,0,498.5,841.5Z" transform="translate(-161.35 -173.42)"/></g><g id="Слой_8" data-name="Слой 8"><path class="cls-1" d="M463,174" transform="translate(-161.35 -173.42)"/><path class="cls-1" d="M831,324c4.26-20.79,14.9-64,15-65-45.37-22.22-113.79-52.54-190.33-68.67A788.36,788.36,0,0,0,463,174a436.32,436.32,0,0,0,78.09,306,455.84,455.84,0,0,0,179,139.44,480.51,480.51,0,0,0,32.24-51.11A498.84,498.84,0,0,0,779,511.67a373.18,373.18,0,0,0,34.67-100l-48.95-24.11-40.39-19.89a343.85,343.85,0,0,0-92-30c9.56,16.22,57.82,90.43,63.34,96L725,447l-36,75c-15.79-9.64-32.3-24.58-52-44a282.69,282.69,0,0,1-41-51c-17-22-28.11-50.89-38.41-82.9-11.22-34.83-13.74-75-17.59-102.1,55,2,99.36,16.23,146,29l79,27Z" transform="translate(-161.35 -173.42)"/></g></svg>
                        </div>
                    </a>
                </div>
                <div class="header-mobile__col col">
                    <div class="burger" data-menu="2">
                        <div class="icon"></div>
                    </div>
                </div>
            </div>
            <div class="header-mobile__wrapper">
                <div class="header-mobile__body">
                    <div class="header-mobile__items">
                        <div class="header-mobile__link">
                            <a href="{{route('articles.index')}}">Блог</a>
                        </div>
                        <div class="header-mobile__link">
                            <a href="{{route('store.index')}}">Магазин</a>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="header-mobile__link">
                                <a href="{{route('basket')}}">Кошик</a>
                            </div>
                            <div class="header-mobile__link">
                                <a href="{{route('user.liked')}}">Вподобане</a>
                            </div>
                            <div class="header-mobile__link">
                                <a href="{{route('user.order-history')}}">Замовлення</a>
                            </div>
                            <div class="header-mobile__link">
                                <a href="#{{route('user.profile')}}">Профіль</a>
                            </div>
                            <div class="header-mobile__link">
                                <a href="{{route('logout')}}">Вийти</a>
                            </div>
                        @else
                            <div class="header-mobile__link">
                                <a href="{{route('login.login')}}">Увійти</a>
                            </div>
                            <div class="header-mobile__link">
                                <a href="{{route('register.register')}}">Реєстрація</a>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="header-mobile__social social">
                    <div class="row">
                        <div class="social__item col">
                            <a href="https://t.me/unrgo">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0C8.0589 0 0 8.0589 0 18ZM14.7 26.25L15.0062 21.6617L15.006 21.6615L23.3527 14.1293C23.719 13.8041 23.2727 13.6456 22.7864 13.9405L12.4855 20.4392L8.03603 19.0505C7.07512 18.7563 7.06823 18.096 8.25173 17.6213L25.5902 10.9357C26.3822 10.5761 27.1465 11.1259 26.8441 12.3379L23.8914 26.2523C23.6852 27.2411 23.0878 27.4776 22.26 27.0209L17.762 23.6977L15.6 25.8C15.5932 25.8066 15.5864 25.8132 15.5797 25.8198C15.3379 26.0552 15.1378 26.25 14.7 26.25Z" fill="#A5A815"/>
                                </svg>
                            </a>
                        </div>
                        <div class="social__item col">
                            <a href="https://instagram.com/unrgo">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.0589 0 0 8.0589 0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0ZM14.0425 8.45798C15.0665 8.4114 15.3937 8.4 18.0009 8.4H17.9979C20.6059 8.4 20.9319 8.4114 21.9559 8.45798C22.978 8.50478 23.6759 8.66663 24.288 8.904C24.9199 9.14902 25.454 9.477 25.9879 10.011C26.522 10.5446 26.85 11.0802 27.096 11.7116C27.332 12.3221 27.494 13.0196 27.542 14.0417C27.588 15.0657 27.6 15.3928 27.6 18.0001C27.6 20.6073 27.588 20.9337 27.542 21.9578C27.494 22.9793 27.332 23.6771 27.096 24.2878C26.85 24.919 26.522 25.4546 25.9879 25.9882C25.4545 26.5222 24.9198 26.851 24.2886 27.0962C23.6777 27.3336 22.9793 27.4954 21.9574 27.5422C20.9333 27.5888 20.6071 27.6002 17.9997 27.6002C15.3927 27.6002 15.0657 27.5888 14.0417 27.5422C13.0198 27.4954 12.3221 27.3336 11.7113 27.0962C11.0802 26.851 10.5446 26.5222 10.0112 25.9882C9.47738 25.4546 9.1494 24.919 8.904 24.2875C8.66677 23.6771 8.505 22.9795 8.45798 21.9575C8.41162 20.9335 8.4 20.6073 8.4 18.0001C8.4 15.3928 8.412 15.0655 8.45782 14.0414C8.5038 13.0199 8.6658 12.3221 8.90378 11.7114C9.14978 11.0802 9.47783 10.5446 10.0118 10.011C10.5455 9.47722 11.081 9.14917 11.7125 8.904C12.3229 8.66663 13.0205 8.50478 14.0425 8.45798Z" fill="#A5A815"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1398 10.13C17.3069 10.1298 17.4869 10.1299 17.681 10.1299L18.001 10.13C20.5642 10.13 20.868 10.1392 21.8802 10.1852C22.8162 10.228 23.3242 10.3844 23.6626 10.5158C24.1106 10.6898 24.43 10.8979 24.7658 11.2339C25.1018 11.5699 25.3098 11.8899 25.4843 12.3379C25.6157 12.6759 25.7723 13.1839 25.8149 14.1199C25.8608 15.1319 25.8708 15.4359 25.8708 17.9979C25.8708 20.56 25.8608 20.8639 25.8149 21.876C25.772 22.812 25.6157 23.32 25.4843 23.658C25.3103 24.106 25.1018 24.425 24.7658 24.7608C24.4298 25.0968 24.1108 25.3048 23.6626 25.4788C23.3246 25.6108 22.8162 25.7668 21.8802 25.8096C20.8682 25.8556 20.5642 25.8656 18.001 25.8656C15.4376 25.8656 15.1337 25.8556 14.1217 25.8096C13.1857 25.7664 12.6777 25.61 12.3391 25.4786C11.8911 25.3046 11.5711 25.0966 11.2351 24.7606C10.8991 24.4246 10.6911 24.1054 10.5167 23.6572C10.3853 23.3192 10.2287 22.8112 10.1861 21.8752C10.1401 20.8632 10.1309 20.5591 10.1309 17.9955C10.1309 15.4319 10.1401 15.1295 10.1861 14.1175C10.2289 13.1815 10.3853 12.6735 10.5167 12.3351C10.6907 11.887 10.8991 11.5671 11.2351 11.2311C11.5711 10.8951 11.8911 10.687 12.3391 10.5127C12.6775 10.3807 13.1857 10.2247 14.1217 10.1816C15.0073 10.1416 15.3506 10.1296 17.1398 10.1276V10.13ZM23.1254 11.7241C22.4894 11.7241 21.9734 12.2395 21.9734 12.8757C21.9734 13.5117 22.4894 14.0277 23.1254 14.0277C23.7614 14.0277 24.2774 13.5117 24.2774 12.8757C24.2774 12.2397 23.7614 11.7237 23.1254 11.7237V11.7241ZM13.0709 18.0001C13.0709 15.2776 15.2782 13.0702 18.0008 13.0701C20.7234 13.0701 22.9302 15.2775 22.9302 18.0001C22.9302 20.7228 20.7236 22.9292 18.001 22.9292C15.2783 22.9292 13.0709 20.7228 13.0709 18.0001Z" fill="#A5A815"/>
                                    <path d="M18.0009 14.8C19.7682 14.8 21.201 16.2327 21.201 18.0001C21.201 19.7673 19.7682 21.2001 18.0009 21.2001C16.2336 21.2001 14.8009 19.7673 14.8009 18.0001C14.8009 16.2327 16.2336 14.8 18.0009 14.8Z" fill="#A5A815"/>
                                </svg>
                            </a>
                        </div>
                        <div class="social__item col">
                            <a href="https://twitter.com/unreal_go">
                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.0589 0 0 8.0589 0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0ZM17.4987 15.2535L17.4609 14.6306C17.3476 13.0163 18.3422 11.5418 19.9161 10.9699C20.4953 10.7665 21.4773 10.741 22.1194 10.919C22.3712 10.9953 22.8497 11.2495 23.1896 11.4783L23.8066 11.8978L24.4865 11.6817C24.8642 11.5672 25.3678 11.3766 25.5944 11.2495C25.8085 11.1351 25.9973 11.0715 25.9973 11.1097C25.9973 11.3257 25.5315 12.063 25.1412 12.4697C24.6124 13.0418 24.7635 13.0926 25.8337 12.7112C26.4758 12.4951 26.4884 12.4952 26.3625 12.7367C26.2869 12.8638 25.8966 13.3087 25.4811 13.7154C24.776 14.4146 24.7383 14.4908 24.7383 15.0755C24.7383 15.978 24.3102 17.8592 23.8821 18.8888C23.0889 20.8209 21.3892 22.8165 19.6894 23.8207C17.2972 25.2317 14.1118 25.5875 11.43 24.7613C10.5361 24.4816 9 23.7698 9 23.6428C9 23.6046 9.46583 23.5537 10.0324 23.5411C11.216 23.5156 12.3995 23.1851 13.4067 22.6004L14.0866 22.1937L13.306 21.9268C12.198 21.5454 11.2034 20.6684 10.9516 19.8421C10.876 19.5752 10.9012 19.5625 11.6063 19.5625L12.3365 19.5498L11.7196 19.2575C10.9893 18.8888 10.322 18.2659 9.99465 17.6304C9.7554 17.1728 9.4533 16.0161 9.54142 15.9272C9.56655 15.8891 9.831 15.9653 10.1332 16.0669C11.0019 16.3847 11.1152 16.3085 10.6116 15.7746C9.66727 14.8086 9.3777 13.3722 9.831 12.0121L10.045 11.402L10.876 12.2282C12.5758 13.8934 14.5777 14.8849 16.8692 15.1772L17.4987 15.2535Z" fill="#A5A815"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="social__mail mail">
                            <div class="mail__image">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 27H7C4.8 27 3 25.2 3 23V9C3 6.8 4.8 5 7 5H25C27.2 5 29 6.8 29 9V23C29 25.2 27.2 27 25 27Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3 10L16 18L29 10" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="mail__text">
                                unrgo@unreal-go.top
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(\Illuminate\Support\Facades\Route::current()->getName() !== 'basket')
            <a class="basket-mobile {{isset($cart) && count($cart) > 0 ? "" : "d-none"}}" href="{{route("basket")}}">
                <span class="basket__notification">{{ isset($cart) ? count($cart) : 0}}</span>
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.94 18.06L19.26 8.31C19.1452 7.47997 18.7404 6.71734 18.1171 6.15725C17.4939 5.59716 16.6925 5.27576 15.855 5.25H15.75C15.75 4.25544 15.3549 3.30161 14.6516 2.59835C13.9484 1.89509 12.9946 1.5 12 1.5C11.0054 1.5 10.0516 1.89509 9.34834 2.59835C8.64508 3.30161 8.24999 4.25544 8.24999 5.25H8.14499C7.30746 5.27576 6.50608 5.59716 5.88285 6.15725C5.25961 6.71734 4.85475 7.47997 4.73999 8.31L3.05999 18.06C2.95681 18.6256 2.97924 19.2071 3.12569 19.7631C3.27215 20.3191 3.53905 20.8361 3.90749 21.2775C4.21794 21.6565 4.60801 21.9625 5.05001 22.1738C5.49201 22.385 5.9751 22.4964 6.46499 22.5H17.535C18.0249 22.4964 18.508 22.385 18.95 22.1738C19.392 21.9625 19.7821 21.6565 20.0925 21.2775C20.4609 20.8361 20.7278 20.3191 20.8743 19.7631C21.0208 19.2071 21.0432 18.6256 20.94 18.06ZM12 3C12.5967 3 13.169 3.23705 13.591 3.65901C14.0129 4.08097 14.25 4.65326 14.25 5.25H9.74999C9.74999 4.65326 9.98705 4.08097 10.409 3.65901C10.831 3.23705 11.4033 3 12 3ZM18.945 20.31C18.7755 20.522 18.5612 20.6938 18.3174 20.8131C18.0736 20.9325 17.8064 20.9963 17.535 21H6.46499C6.1936 20.9963 5.9264 20.9325 5.6826 20.8131C5.43881 20.6938 5.22447 20.522 5.05499 20.31C4.82644 20.0365 4.66146 19.7157 4.57197 19.3707C4.48247 19.0257 4.4707 18.6651 4.53749 18.315L6.21749 8.565C6.27332 8.08382 6.49734 7.63782 6.85001 7.30574C7.20268 6.97365 7.66132 6.77683 8.14499 6.75H15.855C16.3387 6.77683 16.7973 6.97365 17.15 7.30574C17.5026 7.63782 17.7267 8.08382 17.7825 8.565L19.4625 18.315C19.5293 18.6651 19.5175 19.0257 19.428 19.3707C19.3385 19.7157 19.1735 20.0365 18.945 20.31Z" fill="white"></path>
                </svg>
            </a>
        @endif
    </div>
</header>
