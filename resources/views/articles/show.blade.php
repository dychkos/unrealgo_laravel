@extends('layouts.base')

@section('content')
    <div class="row g-4 pt-4">
        <div class="col-12 col-xl-9">
            <div class="big-article">
                <div class="big-article__preview-image">
                    <img src="{{ $article->image
                        ? asset($article->image->filename)
                        : asset('app/img/article-error.jpg') }}" alt="Article">
                </div>
                <div class="big-article__header">
                    <div class="big-article__title h3">
                        {{ $article->title }}
                    </div>
                    <div class="big-article__info">
                        <div class="big-article__info-item with-icon short-info-1">
                            <div class="with-icon__icon">
                                <svg xmlns="http://www.w3.org/2000/svg"  width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                            <div class="with-icon__body p-light">
                                {{ $article->created_at
                                             ? $article->created_at->diffForHumans()
                                             : "Щойно"
                               }}
                            </div>
                        </div>
                        <div class="big-article__info-item tag">
                            {{ $article->category->value }}
                        </div>
                        <div class="big-article__info-item with-icon short-info-2">
                            <div class="with-icon__icon pt-1">
                                <svg width="23" height="24" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20.8246 12C20.8246 12 16.6705 18 11.5138 18C6.35703 18 2.20297 12 2.20297 12C2.20297 12 6.35703 6 11.5138 6C16.6705 6 20.8246 12 20.8246 12Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                    <path d="M11.5138 15C13.096 15 14.3787 13.6569 14.3787 12C14.3787 10.3431 13.096 9 11.5138 9C9.93157 9 8.64893 10.3431 8.64893 12C8.64893 13.6569 9.93157 15 11.5138 15Z" stroke="#A5A815" stroke-width="2" stroke-miterlimit="10" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="with-icon__body p-light">
                                {{ $article->views }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="big-article__body">
                    <div class="big-article__content published">
                        {!! $article->body !!}
                    </div>
                    <div class="big-article__comments-block comments-block">
                        <div class="comments-block__header">
                            <h1 class="comments-block__title h1">Коментарі</h1>
                            <div class="comments-block__count with-icon">
                                <div class="with-icon__icon">
                                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11.0001 9.15821H5.00012C4.73491 9.15821 4.48055 9.26542 4.29302 9.45625C4.10548 9.64709 4.00012 9.90591 4.00012 10.1758C4.00012 10.4457 4.10548 10.7045 4.29302 10.8953C4.48055 11.0862 4.73491 11.1934 5.00012 11.1934H11.0001C11.2653 11.1934 11.5197 11.0862 11.7072 10.8953C11.8948 10.7045 12.0001 10.4457 12.0001 10.1758C12.0001 9.90591 11.8948 9.64709 11.7072 9.45625C11.5197 9.26542 11.2653 9.15821 11.0001 9.15821ZM15.0001 5.0879H5.00012C4.73491 5.0879 4.48055 5.19511 4.29302 5.38594C4.10548 5.57677 4.00012 5.8356 4.00012 6.10548C4.00012 6.37535 4.10548 6.63418 4.29302 6.82501C4.48055 7.01585 4.73491 7.12305 5.00012 7.12305H15.0001C15.2653 7.12305 15.5197 7.01585 15.7072 6.82501C15.8948 6.63418 16.0001 6.37535 16.0001 6.10548C16.0001 5.8356 15.8948 5.57677 15.7072 5.38594C15.5197 5.19511 15.2653 5.0879 15.0001 5.0879ZM17.0001 0H3.00012C2.20447 0 1.44141 0.321627 0.878802 0.894126C0.316193 1.46663 0.00012207 2.2431 0.00012207 3.05274V13.2285C0.00012207 14.0382 0.316193 14.8146 0.878802 15.3871C1.44141 15.9596 2.20447 16.2813 3.00012 16.2813H14.5901L18.2901 20.0565C18.3836 20.1508 18.4944 20.2254 18.6162 20.2761C18.7381 20.3267 18.8685 20.3524 19.0001 20.3516C19.1313 20.355 19.2614 20.3271 19.3801 20.2702C19.5627 20.1938 19.7191 20.0642 19.8294 19.8976C19.9397 19.731 19.9991 19.5349 20.0001 19.334V3.05274C20.0001 2.2431 19.6841 1.46663 19.1214 0.894126C18.5588 0.321627 17.7958 0 17.0001 0ZM18.0001 16.8816L15.7101 14.5412C15.6167 14.4469 15.5059 14.3723 15.384 14.3216C15.2622 14.271 15.1317 14.2453 15.0001 14.2461H3.00012C2.73491 14.2461 2.48055 14.1389 2.29302 13.9481C2.10548 13.7572 2.00012 13.4984 2.00012 13.2285V3.05274C2.00012 2.78286 2.10548 2.52403 2.29302 2.3332C2.48055 2.14237 2.73491 2.03516 3.00012 2.03516H17.0001C17.2653 2.03516 17.5197 2.14237 17.7072 2.3332C17.8948 2.52403 18.0001 2.78286 18.0001 3.05274V16.8816Z" fill="#A5A815"/>
                                    </svg>
                                </div>
                                <div class="with-icon__body p-light">
                                    {{$article->comments
                                        ? $article->comments()->where(['status' => 1])->get()->count()
                                        : "0"
                                    }}
                                </div>
                            </div>
                        </div>
                    @if(session()->has('commentMsg'))
                        <div class="alert success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 28 28" fill="#04AA6D"><path fill="#04AA6D" d="M6.65263 14.0304C6.29251 13.6703 6.29251 13.0864 6.65263 12.7263C7.01276 12.3662 7.59663 12.3662 7.95676 12.7263L11.6602 16.4297L19.438 8.65183C19.7981 8.29171 20.382 8.29171 20.7421 8.65183C21.1023 9.01195 21.1023 9.59583 20.7421 9.95596L12.3667 18.3314C11.9762 18.7219 11.343 18.7219 10.9525 18.3314L6.65263 14.0304Z"/><path clip-rule="evenodd" d="M14 1C6.8203 1 1 6.8203 1 14C1 21.1797 6.8203 27 14 27C21.1797 27 27 21.1797 27 14C27 6.8203 21.1797 1 14 1ZM3 14C3 7.92487 7.92487 3 14 3C20.0751 3 25 7.92487 25 14C25 20.0751 20.0751 25 14 25C7.92487 25 3 20.0751 3 14Z" fill="#04AA6D" fill-rule="evenodd"/></svg>
                            {{ session()->get('commentMsg') }}
                            <span class="closebtn success">×</span>
                        </div>
                    @endif

                    @if(session()->has('banned'))
                        <div class="alert warning">
                            <i style="margin-right: 12px;" class="fa fa-warning"></i>
                            {{ session()->get('banned') }}
                            <span class="closebtn warning">×</span>
                        </div>
                    @endif

                    @if ($article->comments()->where(['status' => 1])->first() == null)
                            <div class="comments-block__empty p">
                                Коментарі відсутні. <a
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                    href="#add-comment"
                                    @else
                                    href="{{route('login.login')}}"
                                    @endif
                                    class="link to-add-comment">Залишіть перший.</a>
                            </div>
                        @else
                            <div class="comments-block__comments comments">
                                @foreach ($article->comments()->whereNull("answered_to")->where(['status' => 1])->orderByDesc("created_at")->get() as $comment)
                                    <div class="comment">
                                        <div class="comment__header with-icon">
                                            <div class="comment__header-icon with-icon__icon">
                                                <img src="{{ isset($comment->user->image)
                                                ? asset($comment->user->image->filename)
                                                : asset('app/img/avatar-default.png')}}"
                                                 alt="user icon"
                                                />
                                            </div>
                                            <div class="with-icon__body d-flex flex-column flex-column">
                                                <div class="h6">{{ $comment->user->name }}</div>
                                                <div class="p-light">{{ $comment->created_at->diffForHumans() }}</div>
                                            </div>
                                        </div>

                                        <div class="comment__text p">
                                           {{ $comment->body }}
                                        </div>
                                        <div class="comment__footer">
                                            <div class="comment__action p-light likeable" data-like="comment">
                                                {{ $comment->likes()->first() == null
                                                ? "0"
                                                : $comment->likes()->get()->count() }} Подобається
                                            </div>
                                            <a class="comment__action ellipse p-light to-add-comment"
                                               href="#add-comment"
                                               data-answerfor="{{$comment->user->name}}"
                                               data-comment="{{$comment->id}}">
                                                Відповісти
                                            </a>
                                        </div>
                                        @if($article->comments()->where("answered_to", $comment->id)->first() !== null)
                                            @foreach($article->comments()->where("answered_to", $comment->id)->where(['status' => 1])->get() as $answer)
                                                <div class="comment__answer answer">
                                                    <div class="comment__header with-icon">
                                                        <div class="comment__header-icon with-icon__icon">
                                                            <img src="{{isset($answer->user->image)
                                                        ? asset($answer->user->image->filename)
                                                        : asset('app/img/avatar-default.png')}}"
                                                                 alt="user icon"
                                                            />
                                                        </div>
                                                        <div class="with-icon__body d-flex flex-column">
                                                            <div class="h6">{{$answer->user->name}}</div>
                                                            <div class="p-light">{{$comment->created_at->diffForHumans()}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="comment__text p">
                                                        {{ $answer->body }}
                                                    </div>
                                                    <div class="comment__footer">
                                                        <div class="comment__action p-light likeable" data-like="answer">
                                                            {{ $answer->likes()->first() == null
                                                              ? "0"
                                                              : $answer->likes()->get()->count() }} Подобається
                                                        </div>
                                                        <div class="comment__action ellipse p-light to-add-comment"
                                                             data-comment="{{$comment->id}}"
                                                             data-answerfor="{{$answer->user->name}}"
                                                        >
                                                            Відповісти
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                @endforeach
                            </div>
                        @endif


                        <form
                            class="comments-block__add-comment add-comment"
                            id="add-comment"
                            method="POST"
                            action="{{route('comment.store', $article->id)}}"
                        >
                            @csrf
                            @if(\Illuminate\Support\Facades\Auth::check())
                                <div class="add-comment__title h3">
                                    Напишіть коментар
                                </div>
                                <input type="hidden" value="0" name="answered_to" data-answerFor="" id="answer_for">
                                <input type="hidden" value="{{ $article->id }}" name="article_id" id="article_id">
                                <div class="add-comment__body form-input">
                                    <textarea
                                        placeholder="Введіть текст"
                                        @class(["required" => $errors->has('body')])
                                        name="body"
                                        rows="4"></textarea>
                                </div>
                                @error("body")
                                <div class="alert danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="-2 -3 24 24" preserveAspectRatio="xMinYMin" class="jam jam-triangle-danger"><path fill="#f44336" d="M12.8 1.613l6.701 11.161c.963 1.603.49 3.712-1.057 4.71a3.213 3.213 0 0 1-1.743.516H3.298C1.477 18 0 16.47 0 14.581c0-.639.173-1.264.498-1.807L7.2 1.613C8.162.01 10.196-.481 11.743.517c.428.276.79.651 1.057 1.096zm-2.22.839a1.077 1.077 0 0 0-1.514.365L2.365 13.98a1.17 1.17 0 0 0-.166.602c0 .63.492 1.14 1.1 1.14H16.7c.206 0 .407-.06.581-.172a1.164 1.164 0 0 0 .353-1.57L10.933 2.817a1.12 1.12 0 0 0-.352-.365zM10 14a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0-9a1 1 0 0 1 1 1v4a1 1 0 0 1-2 0V6a1 1 0 0 1 1-1z"/></svg>
                                    {{ $message }}
                                    <span class="closebtn">×</span>
                                </div>
                                @enderror

                                <button class="add-comment__btn btn btn_primary h6">
                                    Залишити коментар
                                </button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <div class="sidebar">
                <div class="sidebar__title h2">Навігація</div>
                <div class="sidebar__blog-nav blog-nav row">
                    @foreach($categories as $category)
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
                                    {{ $category->value }}
                                </div>
                            </div>
                            <div class="blog-nav__sub-categories">
                                @foreach(App\Models\Article::where('category_id', $category->id)->get() as $sub_article)
                                    <div class="blog-nav__sub h5 {{$article->id === $sub_article->id ? "chosen" : ""}}">
                                        <a href="{{ route("articles.show", [$sub_article->category->slug, $sub_article->slug]) }}">{{$sub_article->title}}</a>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>
                @if(config('app.env') != 'production')
                <div class="sidebar__title h2">Акційні пропозиції: </div>
                <div class="sidebar__products row row-cols-1 row-cols-sm-2 row-cols-lg-1 g-3">
                    @foreach($stock as $product)
                        <a href="{{route("store.show", [$product->type->slug, $product->id])}}" class="product col">
                            <div class="product__wrapper">
                                <div class="product__image">
                                    <img src="{{$product->images->first()
                                            ? asset($product->images->first()->filename)
                                            : asset("app/img/test.png")}}" alt="Product">
                                </div>

                                <div data-product="{{ $product->id }}" class="product__like like
                                            {{ $user !== null && $product->likedBy()->where("user_id", $user->id)->exists() ? "like_liked" : ""}}">
                                    <svg width="24" height="21" viewBox="0 0 24 21"  xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 11C0.75 8 1.5 3.5 5.25 2C9 0.5 11.25 3.5 12 5C12.75 3.5 15.75 0.5 19.5 2C23.25 3.5 23.25 8 21 11C18.75 14 12 20 12 20C12 20 5.25 14 3 11Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>

                            </div>
                            <div class="product__body">
                                <div class="product__prices">
                                    <div class="product__price h3">{{ $product->currentPrice() }} ₴</div>
                                    @if(isset($product->offer) && $product->offer > 0)
                                        <div class="product__discount h6">{{ $product->price }} ₴</div>
                                    @endif
                                </div>
                                <div class="product__title h5">
                                    {{ $product->title }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@once
    @push('js')
        <script>
            @if(session()->has('commentMsg'))
                Toastify({
                    text: "Коментар на розгляді!",
                    backgroundColor: "#04AA6D",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "left",
                }).showToast();
            @endif

            @error('body')
            Toastify({
                text: "Ваш коментар занадто короткий!",
                backgroundColor: "#A84F43",
                duration: 3000,
                close: true,
                gravity: "top",
                position: "left",
            }).showToast();
            @enderror
        </script>
        <script src="{{ asset('app/js-min/article.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
