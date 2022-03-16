@extends('layouts.base')

@section('content')
    <div class="product-page pt-4">
        <div class="product-page__header row g-3">
            <div class="product-page__photos col-12 col-lg-6">
                <div class="photos">
                    <div class="photos__previews" id="photosSwiper">
                        <div id="swiper-wrapper" >
                            <div class="photos__slide">
                                <img src="{{asset('app/img/product-big.png')}}" data-photo class="photos__previews_chosen" alt="Product">
                            </div>
                            <div class="photos__slide">
                                <img src="{{asset('app/img/banner.png')}}" data-photo alt="Product">
                            </div>
                            <div class="photos__slide">
                                <img src="{{asset('app/img/tshirt.png')}}" data-photo alt="Product">
                            </div>
                            <div class="photos__slide">
                                <img src="{{asset('app/img/product-big.png')}}" data-photo alt="Product">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="photos__big swiper-slide">
                        <img src="{{asset('app/img/product-big.png')}}" id="main-photo" alt="Product">
                    </div>
                </div>
            </div>
            <div class="product-page__info co-12 col-lg-6">
                <h1 class="product-page__title h1">Футболка unrgo simple</h1>
                <div class="product-page__sizes sizes">
                          <span class="sizes__text p-light">
                              Выберите размер
                          </span>
                    <div class="sizes__block">
                        <div class="sizes__item sizes__item_chosen">
                            XS
                            <input type="checkbox" name="size" class="hide">
                        </div>
                        <div class="sizes__item">
                            S
                            <input type="checkbox" name="size" class="hide">
                        </div>
                        <div class="sizes__item">
                            M
                            <input type="checkbox" name="size" class="hide">
                        </div>
                        <div class="sizes__item">
                            L
                            <input type="checkbox" name="size" class="hide">
                        </div>
                        <div class="sizes__item sizes__item_none">
                            Xl
                            <input type="checkbox" name="size" class="hide">
                        </div>
                        <div class="sizes__item">
                            XXl
                            <input type="checkbox" name="size" class="hide">
                        </div>
                    </div>
                </div>
                <div class="product-page__links">
                    <a href="#description" class="product-page__link h5" data-nav="description">Описание</a>
                    <a href="#feedbacks" class="product-page__link h5" data-nav="feedbacks">Отзывы</a>
                </div>
                <div class="product-page__main">
                    <h2 class="product-page__price h2">
                        1 200 UAH
                    </h2>
                    <div class="product-page__make-order product-page__make-order_ordered">
                        <div class="btn btn_primary">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.94 18.06L19.26 8.31C19.1452 7.47997 18.7404 6.71734 18.1171 6.15725C17.4939 5.59716 16.6925 5.27576 15.855 5.25H15.75C15.75 4.25544 15.3549 3.30161 14.6516 2.59835C13.9484 1.89509 12.9946 1.5 12 1.5C11.0054 1.5 10.0516 1.89509 9.34834 2.59835C8.64508 3.30161 8.24999 4.25544 8.24999 5.25H8.14499C7.30746 5.27576 6.50608 5.59716 5.88285 6.15725C5.25961 6.71734 4.85475 7.47997 4.73999 8.31L3.05999 18.06C2.95681 18.6256 2.97924 19.2071 3.12569 19.7631C3.27215 20.3191 3.53905 20.8361 3.90749 21.2775C4.21794 21.6565 4.60801 21.9625 5.05001 22.1738C5.49201 22.385 5.9751 22.4964 6.46499 22.5H17.535C18.0249 22.4964 18.508 22.385 18.95 22.1738C19.392 21.9625 19.7821 21.6565 20.0925 21.2775C20.4609 20.8361 20.7278 20.3191 20.8743 19.7631C21.0208 19.2071 21.0432 18.6256 20.94 18.06ZM12 3C12.5967 3 13.169 3.23705 13.591 3.65901C14.0129 4.08097 14.25 4.65326 14.25 5.25H9.74999C9.74999 4.65326 9.98705 4.08097 10.409 3.65901C10.831 3.23705 11.4033 3 12 3ZM18.945 20.31C18.7755 20.522 18.5612 20.6938 18.3174 20.8131C18.0736 20.9325 17.8064 20.9963 17.535 21H6.46499C6.1936 20.9963 5.9264 20.9325 5.6826 20.8131C5.43881 20.6938 5.22447 20.522 5.05499 20.31C4.82644 20.0365 4.66146 19.7157 4.57197 19.3707C4.48247 19.0257 4.4707 18.6651 4.53749 18.315L6.21749 8.565C6.27332 8.08382 6.49734 7.63782 6.85001 7.30574C7.20268 6.97365 7.66132 6.77683 8.14499 6.75H15.855C16.3387 6.77683 16.7973 6.97365 17.15 7.30574C17.5026 7.63782 17.7267 8.08382 17.7825 8.565L19.4625 18.315C19.5293 18.6651 19.5175 19.0257 19.428 19.3707C19.3385 19.7157 19.1735 20.0365 18.945 20.31Z" fill="white"/>
                            </svg>
                            Добавить в корзину
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-page__like like">
                <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </div>
        <div class="product-page__content">
            <div class="product-page__quick-nav quick-nav">
                <div class="quick-nav__item quick-nav__item_active" data-nav="description">Описание</div>
                <div class="quick-nav__item" data-nav="feedbacks">Отзывы</div>
            </div>
            <div class="product-page__description nav-active" id="description">
                <h3 class="h3">
                    Почему он используется?
                </h3>
                <p class="p">
                    Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации "Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст.." Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам "lorem ipsum" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения.
                </p>
                <h3 class="h3">
                    Материал:
                </h3>
                <p class="p">
                    - 90% хлопок, 10% эластан.
                </p>
                <div class="h3">
                    Детали и крой:
                </div>
                <p class="p">
                    - тип кроя oversize;
                    - круглый вырез;
                    - качественный принт на груди;
                    - бирка с фирменным логотипом Staff вшита в боковой шов.
                </p>
                <h3 class="h3">
                    Цвет:
                </h3>
                <p class="p">
                    - желтый.
                </p>
                <h3 class="h3">
                    Уход:
                </h3>
                <p class="p">
                    - стирка в обычном режиме при температуре не выше 30°С, без отжима;
                    - отбеливание запрещено;
                    - сушить в подвешенном состоянии, без применения искусственной сушки.
                </p>
                <h3 class="h3">
                    Доставка: 1-2 дня
                </h3>
                <p class="p">Оплата при получении</p>
            </div>
            <div class="product-page__comments-block comments-block" id="feedbacks" style="display: none">
                <div class="comments-block__header">
                    <div class="comments-block__title h3">Отзывы</div>
                    <div class="comments-block__count with-icon">
                        <div class="with-icon__icon">
                            <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.0001 9.15821H5.00012C4.73491 9.15821 4.48055 9.26542 4.29302 9.45625C4.10548 9.64709 4.00012 9.90591 4.00012 10.1758C4.00012 10.4457 4.10548 10.7045 4.29302 10.8953C4.48055 11.0862 4.73491 11.1934 5.00012 11.1934H11.0001C11.2653 11.1934 11.5197 11.0862 11.7072 10.8953C11.8948 10.7045 12.0001 10.4457 12.0001 10.1758C12.0001 9.90591 11.8948 9.64709 11.7072 9.45625C11.5197 9.26542 11.2653 9.15821 11.0001 9.15821ZM15.0001 5.0879H5.00012C4.73491 5.0879 4.48055 5.19511 4.29302 5.38594C4.10548 5.57677 4.00012 5.8356 4.00012 6.10548C4.00012 6.37535 4.10548 6.63418 4.29302 6.82501C4.48055 7.01585 4.73491 7.12305 5.00012 7.12305H15.0001C15.2653 7.12305 15.5197 7.01585 15.7072 6.82501C15.8948 6.63418 16.0001 6.37535 16.0001 6.10548C16.0001 5.8356 15.8948 5.57677 15.7072 5.38594C15.5197 5.19511 15.2653 5.0879 15.0001 5.0879ZM17.0001 0H3.00012C2.20447 0 1.44141 0.321627 0.878802 0.894126C0.316193 1.46663 0.00012207 2.2431 0.00012207 3.05274V13.2285C0.00012207 14.0382 0.316193 14.8146 0.878802 15.3871C1.44141 15.9596 2.20447 16.2813 3.00012 16.2813H14.5901L18.2901 20.0565C18.3836 20.1508 18.4944 20.2254 18.6162 20.2761C18.7381 20.3267 18.8685 20.3524 19.0001 20.3516C19.1313 20.355 19.2614 20.3271 19.3801 20.2702C19.5627 20.1938 19.7191 20.0642 19.8294 19.8976C19.9397 19.731 19.9991 19.5349 20.0001 19.334V3.05274C20.0001 2.2431 19.6841 1.46663 19.1214 0.894126C18.5588 0.321627 17.7958 0 17.0001 0ZM18.0001 16.8816L15.7101 14.5412C15.6167 14.4469 15.5059 14.3723 15.384 14.3216C15.2622 14.271 15.1317 14.2453 15.0001 14.2461H3.00012C2.73491 14.2461 2.48055 14.1389 2.29302 13.9481C2.10548 13.7572 2.00012 13.4984 2.00012 13.2285V3.05274C2.00012 2.78286 2.10548 2.52403 2.29302 2.3332C2.48055 2.14237 2.73491 2.03516 3.00012 2.03516H17.0001C17.2653 2.03516 17.5197 2.14237 17.7072 2.3332C17.8948 2.52403 18.0001 2.78286 18.0001 3.05274V16.8816Z" fill="#A5A815"/>
                            </svg>
                        </div>
                        <div class="with-icon__body p-light">
                            908
                        </div>
                    </div>
                </div>
                <div class="comments-block__empty p">
                    Комменарии остутсвуют. <a href="#" class="link">Оставьте первый.</a>
                </div>
                <div class="comments-block__comments comments">
                    <div class="comment">
                        <div class="comment__header with-icon">
                            <div class="with-icon__icon">
                                <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                            </div>
                            <div class="with-icon__body d-flex flex-column flex-column">
                                <div class="h6">username</div>
                                <div class="p-light">30 минут назад</div>
                            </div>
                        </div>
                        <div class="comment__text p">
                            Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                        </div>
                        <div class="comment__footer">
                            <div class="comment__action p-light">
                                3 Нравится
                            </div>
                            <div class="comment__action ellipse p-light">
                                Ответить
                            </div>
                        </div>
                        <div class="comment__answer answer">
                            <div class="comment__header with-icon">
                                <div class="with-icon__icon">
                                    <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                                </div>
                                <div class="with-icon__body d-flex flex-column">
                                    <div class="h6">username</div>
                                    <div class="p-light">30 минут назад</div>
                                </div>
                            </div>
                            <div class="comment__text p">
                                Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                            </div>
                            <div class="comment__footer">
                                <div class="comment__action p-light">
                                    3 Нравится
                                </div>
                                <div class="comment__action ellipse p-light">
                                    Ответить
                                </div>
                            </div>
                        </div>
                        <div class="comment__answer answer">
                            <div class="comment__header with-icon">
                                <div class="with-icon__icon">
                                    <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                                </div>
                                <div class="with-icon__body d-flex flex-column">
                                    <div class="h6">username</div>
                                    <div class="p-light">30 минут назад</div>
                                </div>
                            </div>
                            <div class="comment__text p">
                                Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                            </div>
                            <div class="comment__footer">
                                <div class="comment__action p-light">
                                    3 Нравится
                                </div>
                                <div class="comment__action ellipse p-light">
                                    Ответить
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="comment">
                        <div class="comment__header with-icon">
                            <div class="with-icon__icon">
                                <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                            </div>
                            <div class="with-icon__body d-flex flex-column">
                                <div class="h6">username</div>
                                <div class="p-light">30 минут назад</div>
                            </div>
                        </div>
                        <div class="comment__text p">
                            Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                        </div>
                        <div class="comment__footer">
                            <div class="comment__action p-light">
                                3 Нравится
                            </div>
                            <div class="comment__action ellipse p-light">
                                Ответить
                            </div>
                        </div>
                        <div class="comment__answer answer">
                            <div class="comment__header with-icon">
                                <div class="with-icon__icon">
                                    <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                                </div>
                                <div class="with-icon__body d-flex flex-column">
                                    <div class="h6">username</div>
                                    <div class="p-light">30 минут назад</div>
                                </div>
                            </div>
                            <div class="comment__text p">
                                Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                            </div>
                            <div class="comment__footer">
                                <div class="comment__action p-light">
                                    3 Нравится
                                </div>
                                <div class="comment__action ellipse p-light">
                                    Ответить
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment">
                        <div class="comment__header with-icon">
                            <div class="with-icon__icon">
                                <img src="{{asset('app/img/user-icon.png')}}" alt="user">
                            </div>
                            <div class="with-icon__body d-flex flex-column">
                                <div class="h6">username</div>
                                <div class="p-light">30 минут назад</div>
                            </div>
                        </div>
                        <div class="comment__text p">
                            Windows XP была построена на базе того же ядра Windows NT, что и Windows 2000
                        </div>
                        <div class="comment__footer">
                            <div class="comment__action p-light">
                                3 Нравится
                            </div>
                            <div class="comment__action ellipse p-light">
                                Ответить
                            </div>
                        </div>
                    </div>
                </div>
                <form class="comments-block__add-comment add-comment">
                    <div class="add-comment__title h3">
                        Напишите комментарий
                    </div>
                    <div class="add-comment__name form-input form-input_sm">
                        <input class="required" type="text" placeholder="Введите имя">
                    </div>
                    <div class="add-comment__body form-input">
                        <textarea class="required" placeholder="Введите текст" rows="4"></textarea>
                    </div>

                    <div class="required_alert p">
                        Заполните необходимые поля
                    </div>

                    <button class="add-comment__btn btn btn_primary h4">Оставить отзыв</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
        <script src="{{asset('app/js/libs/PhotoPreviews.js')}}"></script>
        <script src="{{asset('app/js/product.js')}}"></script>
    @endpush
@endonce
