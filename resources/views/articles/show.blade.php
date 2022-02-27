@extends('layouts.base')

@section('content')
    <div class="row g-4 pt-4">
        <div class="col-12 col-lg-9">
            <div class="big-article">
                <div class="big-article__preview-image">
                    <img src="{{asset('app/img/article.png' )}}" alt="Article">
                </div>
                <div class="big-article__header">
                    <div class="big-article__title h3">
                        Крутое название статьи на очень крутую тему
                    </div>
                    <div class="big-article__info d-flex">
                        <div class="big-article__info-item with-icon col-5 col-sm-3 order-1 ">
                            <div class="with-icon__icon">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                            <div class="with-icon__body p-light">
                                08.08.2003
                            </div>
                        </div>
                        <div class="big-article__info-item tag col-12 col-sm-3 order-0 order-sm-1">
                            СПОРТ
                        </div>
                        <div class="big-article__info-item with-icon col-5 col-sm-3 order-3">
                            <div class="with-icon__icon pt-1">
                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.8246 12C20.8246 12 16.6705 18 11.5138 18C6.35703 18 2.20297 12 2.20297 12C2.20297 12 6.35703 6 11.5138 6C16.6705 6 20.8246 12 20.8246 12Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M11.5138 15C13.096 15 14.3787 13.6569 14.3787 12C14.3787 10.3431 13.096 9 11.5138 9C9.93157 9 8.64893 10.3431 8.64893 12C8.64893 13.6569 9.93157 15 11.5138 15Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="with-icon__body p-light">
                                12,908
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big-article__body">
                    <div class="big-article__content">
                        <p class="p">
                            Что можно сказать об идее интерактивной таблицы Менделеева? Идея очень хорошая, но первый блин бывает комом.

                            Прежде всего: я написал и опубликовал много хим. статей на английском и мне не трудно понять фразу “Mercury is one of the few elements that is liquid at room temperature”, а школьник, который только начал изучать химию может испытать затруднения. В поиске Гугла есть выбор языка. Почему здесь отказались от этой опции? (Или, может, я не нашел?)

                            Далее ИМХО в одной фразе всей инфы по элементу не уместить – предложите переход на Вики или на Гугл поиск. В Вики статьи на каждый элемент. И, что важно, ссылки на авторитетные источники. В Гугле ссылки на все источники. Может быть ссылка на источник, где сказано, что поскольку ртуть жидкая, то Земля — плоская. В Вики такую ссылку не допустят. При этом ничего плохого не хочу сказать про Гугл — у ищущих могут быть разные цели, и кому-то нужно найти абсурдные заявления. — Хочет человек в своей статье привести такие примеры абсурда.

                            И еще: химики хорошо ориентируются в таблице Менделеева и знают символы элементов. А школьники не очень хорошо. Поэтому нужен поиск по алфавиту названий элементов. При этом нужно обеспечить поиск и по не принятым названиям – нпр., элемент “Сергений”. Но, конечно, поиск и по символам элементов нужен.

                            Для школьника будет полезно по запросу выделить металлы, щелочные металлы, галогены, инертные газы и т.д.

                            И школьнику и проф. химику будет полезен калькулятор: нажал на клетку таблицы, и в регистре атомный вес элемента, еще лучше, если калькулятор будет считать молекулярные веса по формулам — нпр., H2SO4.

                            Отдельные ссылки нужны на историю открытия периодического закона (таблица – это только иллюстрация) и на его развитие. До Менделеева было много попыток. Но устройство атомов не знали, как и Менделеев.

                            Думаю, что если опросить школьников и химиков, то они сделают похожие предложения.
                            При этом хочу отметить, что никаких претензий к статье у меня нет. Мы все используем Google, и новый инструмент Google — важная информация. Может спецы Google не прочтут эту статью, но надеюсь, что они получат похожие отзывы и поправят свой инструмент. И он станет очень полезным. Хозяйку не ругают за первый блин, который комом, а хвалют остальные блины.
                        </p>
                    </div>
                    <div class="big-article__comments-block comments-block">
                        <div class="comments-block__header">
                            <div class="comments-block__title h3">Комментарии</div>
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
                            <div class="add-comment__name form-input">
                                <input class="required" type="text" placeholder="Введите имя">
                            </div>
                            <div class="add-comment__body form-input">
                                <textarea class="required" placeholder="Введите текст" rows="4"></textarea>
                            </div>

                            <div class="required_alert p">
                                Заполните необходимые поля
                            </div>

                            <button class="add-comment__btn btn btn_primary h4">
                                Оставить отзыв
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="sidebar">
                <div class="sidebar__title h2">Навигация</div>
                <div class="sidebar__blog-nav blog-nav row ">
                    <div class="blog-nav__category">
                        <div class="blog-nav__main with-icon">
                            <div class="with-icon__icon">
                                <svg width="12px" height="7px" viewBox="0 0 12 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                                    <title>keyboard_arrow_up</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded" transform="translate(-718.000000, -2466.000000)">
                                            <g id="Hardware" transform="translate(100.000000, 2404.000000)">
                                                <g id="-Round-/-Hardware-/-keyboard_arrow_up" transform="translate(612.000000, 54.000000)">
                                                    <g>
                                                        <rect id="Rectangle-Copy-106" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M8.12,14.71 L12,10.83 L15.88,14.71 C16.27,15.1 16.9,15.1 17.29,14.71 C17.68,14.32 17.68,13.69 17.29,13.3 L12.7,8.71 C12.31,8.32 11.68,8.32 11.29,8.71 L6.7,13.3 C6.31,13.69 6.31,14.32 6.7,14.71 C7.09,15.09 7.73,15.1 8.12,14.71 Z" id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="with-icon__body h4">
                                Категория
                            </div>
                        </div>
                        <div class="blog-nav__sub-categories">
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5 ">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5 chosen">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                        </div>
                    </div>
                    <div class="blog-nav__category">
                        <div class="blog-nav__main with-icon">
                            <div class="with-icon__icon">
                                <svg width="12px" height="7px" viewBox="0 0 12 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                                    <title>keyboard_arrow_up</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded" transform="translate(-718.000000, -2466.000000)">
                                            <g id="Hardware" transform="translate(100.000000, 2404.000000)">
                                                <g id="-Round-/-Hardware-/-keyboard_arrow_up" transform="translate(612.000000, 54.000000)">
                                                    <g>
                                                        <rect id="Rectangle-Copy-106" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M8.12,14.71 L12,10.83 L15.88,14.71 C16.27,15.1 16.9,15.1 17.29,14.71 C17.68,14.32 17.68,13.69 17.29,13.3 L12.7,8.71 C12.31,8.32 11.68,8.32 11.29,8.71 L6.7,13.3 C6.31,13.69 6.31,14.32 6.7,14.71 C7.09,15.09 7.73,15.1 8.12,14.71 Z" id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="with-icon__body h4">
                                Категория
                            </div>
                        </div>
                        <div class="blog-nav__sub-categories">
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                        </div>
                    </div>
                    <div class="blog-nav__category">
                        <div class="blog-nav__main with-icon">
                            <div class="with-icon__icon">
                                <svg width="12px" height="7px" viewBox="0 0 12 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                                    <title>keyboard_arrow_up</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded" transform="translate(-718.000000, -2466.000000)">
                                            <g id="Hardware" transform="translate(100.000000, 2404.000000)">
                                                <g id="-Round-/-Hardware-/-keyboard_arrow_up" transform="translate(612.000000, 54.000000)">
                                                    <g>
                                                        <rect id="Rectangle-Copy-106" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M8.12,14.71 L12,10.83 L15.88,14.71 C16.27,15.1 16.9,15.1 17.29,14.71 C17.68,14.32 17.68,13.69 17.29,13.3 L12.7,8.71 C12.31,8.32 11.68,8.32 11.29,8.71 L6.7,13.3 C6.31,13.69 6.31,14.32 6.7,14.71 C7.09,15.09 7.73,15.1 8.12,14.71 Z" id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="with-icon__body h4">
                                Категория
                            </div>
                        </div>
                        <div class="blog-nav__sub-categories">
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                        </div>
                    </div>
                    <div class="blog-nav__category">
                        <div class="blog-nav__main with-icon">
                            <div class="with-icon__icon">
                                <svg width="12px" height="7px" viewBox="0 0 12 7" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <!-- Generator: Sketch 52.5 (67469) - http://www.bohemiancoding.com/sketch -->
                                    <title>keyboard_arrow_up</title>
                                    <desc>Created with Sketch.</desc>
                                    <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Rounded" transform="translate(-718.000000, -2466.000000)">
                                            <g id="Hardware" transform="translate(100.000000, 2404.000000)">
                                                <g id="-Round-/-Hardware-/-keyboard_arrow_up" transform="translate(612.000000, 54.000000)">
                                                    <g>
                                                        <rect id="Rectangle-Copy-106" x="0" y="0" width="24" height="24"></rect>
                                                        <path d="M8.12,14.71 L12,10.83 L15.88,14.71 C16.27,15.1 16.9,15.1 17.29,14.71 C17.68,14.32 17.68,13.69 17.29,13.3 L12.7,8.71 C12.31,8.32 11.68,8.32 11.29,8.71 L6.7,13.3 C6.31,13.69 6.31,14.32 6.7,14.71 C7.09,15.09 7.73,15.1 8.12,14.71 Z" id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="with-icon__body h4">
                                Категория
                            </div>
                        </div>
                        <div class="blog-nav__sub-categories">
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5 ">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                            <div class="blog-nav__sub h5">
                                Подкатегория
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sidebar__title h2">Акции</div>
                <div class="sidebar__products row row-cols-1 row-cols-sm-2 row-cols-lg-1 g-3">
                    <div class="product col">
                        <div class="product__wrapper">
                            <div class="product__image">
                                <img src="{{asset('app/img/test.png')}}" alt="Product">
                            </div>
                            <div class="product__like like">
                                <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>

                        </div>
                        <div class="product__body">
                            <div class="product__prices">
                                <div class="product__price h3">1 340 ₽</div>
                                <div class="product__discount h6">5 340 ₽</div>
                            </div>
                            <div class="product__title h5">
                                Ежедневник фирмаГ
                                planner
                            </div>
                        </div>
                    </div>
                    <div class="product col">
                        <div class="product__wrapper">
                            <div class="product__image">
                                <img src="{{asset('app/img/test.png')}}" alt="Product">
                            </div>
                            <div class="product__like like">
                                <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>

                        </div>
                        <div class="product__body">
                            <div class="product__prices">
                                <div class="product__price h3">1 340 ₽</div>
                                <div class="product__discount h6">5 340 ₽</div>
                            </div>
                            <div class="product__title h5">
                                Ежедневник фирмаГ
                                planner
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script src="{{asset('app/js/Hider.js')}}"></script>
        <script src="{{asset('app/js/main.js')}}"></script>
        <script src="{{asset('app/js/article.js')}}"></script>
    @endpush
@endonce
