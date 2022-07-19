@extends("admin.layout.admin")

@section('content')
    <div class="admin-content__header">
        <div class="admin-content__title h1">Articles</div>
        <div class="admin-content__navigation">
            <a class="admin-content__add" href="{{route('user.admin.index', 'articles')}}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.9611 10.9611H3.54692L8.17942 6.32827C8.58525 5.92268 8.58525 5.26472 8.17942 4.85919C7.77358 4.45335 7.11563 4.45335 6.71039 4.85919L0.304377 11.2653C-0.101459 11.6709 -0.101459 12.3289 0.304377 12.7344L6.71039 19.1408C6.91325 19.3438 7.17911 19.4452 7.44491 19.4452C7.7107 19.4452 7.97656 19.3438 8.17942 19.1408C8.58525 18.7352 8.58525 18.0773 8.17942 17.6718L3.54692 13.0388H22.9611C23.5348 13.0388 24 12.5736 24 11.9999C24 11.4262 23.5348 10.9611 22.9611 10.9611Z" fill="#FDFFBA"/>
                </svg>
            </a>
        </div>
    </div>
    <form class="admin-one admin-form"
          action="{{route('user.admin.articles.store')}}"
          enctype="multipart/form-data"
          method="POST">
        @csrf

        <div class="admin-row">
            <div class="admin-input form-input">
                <label for="title">Назва статті</label>
                <input type="text" id="title"
                       placeholder="Введіть назву статті"
                       name="title"
                       value="{{old('title')}}"
                       class="{{$errors->has('title') ? 'required' : '' }}">
                @error("title")
                <div class="required_alert">{{ $message }}</div>
                @enderror
            </div>
            <div class="admin-input form-input">
                <div class="dropdown" id="categories_dropdown">
                    @error("category_id")
                    <div class="required_alert">{{ $message }}</div>
                    @enderror
                    <label for="category">Виберіть категорію :</label>
                    <select name="category_id" id="category" class="select" class="{{ $errors->has('category') ? 'required' : '' }}">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="admin-row">
            <div class="admin-input form-input">
                <label for="slug">Slug</label>
                <input type="text" id="slug" value="{{old('slug')}}" placeholder="slug" class="{{$errors->has('slug') ? 'required' : '' }}" name="slug">
                @error("slug")
                <div class="required_alert">{{$message}}</div>
                @enderror
            </div>
            <div class="admin-input">
                <span class="p">Завантаженні фото:</span>
                <div class="file-input ">
                    <label class="file-input__label" for="file_input">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22 19C22 20.6569 20.6569 22 19 22H5C3.34315 22 2 20.6569 2 19V5C2 3.34315 3.34315 2 5 2H9.0005C9.55251 2 10 2.44749 10 2.9995C10 3.55154 9.55254 3.99909 9.0005 3.9992L5 4C4.44772 4 4 4.44772 4 5V18.278L8.18627 12.4188C8.50017 11.9793 9.09949 11.8737 9.54124 12.159L9.64018 12.2318L14.785 16.518L16.1679 14.4453C16.4947 13.9552 17.1636 13.8585 17.6141 14.2106L17.7071 14.2929L20 16.585V15C20 14.4477 20.4477 14 21 14C21.5523 14 22 14.4477 22 15V19ZM9.187 14.458L5.228 20H19C19.4289 20 19.7948 19.73 19.9368 19.3506L17.155 16.57L15.8321 18.5547C15.5243 19.0163 14.9063 19.1338 14.454 18.838L14.3598 18.7682L9.187 14.458ZM17 2C17.5523 2 18 2.44772 18 3V6H21C21.5523 6 22 6.44772 22 7C22 7.55228 21.5523 8 21 8H18V11C18 11.5523 17.5523 12 17 12C16.4477 12 16 11.5523 16 11V8H13C12.4477 8 12 7.55228 12 7C12 6.44772 12.4477 6 13 6H16V3C16 2.44772 16.4477 2 17 2ZM8 6C9.10457 6 10 6.89543 10 8C10 9.10457 9.10457 10 8 10C6.89543 10 6 9.10457 6 8C6 6.89543 6.89543 6 8 6Z" fill="#FDFFBA"/>
                        </svg>
                    </label>
                    <input type="file" id="file_input" class="file-input__input" name="image" accept="image/png, image/gif, image/jpeg" />
                    <div class="file-input__files">
                    </div>
                    @error("image")
                    <div class="required_alert">{{$message}}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="admin-row">
            <div class="form-input form-input_trix">
                <label for="description">Опис</label>
                <textarea
                    class="{{$errors->has('description') ? 'required' : '' }}"
                    id="description" name="description"
                    placeholder="Введите текст" rows="4">{{old('description')}}</textarea>
                @error("description")
                <div class="required_alert">{{$message}}</div>
                @enderror
            </div>
        </div>
        <div class="admin-row">
            <div class="form-input">
                <label for="html-body">HTML</label>
                <input id="html-body" type="hidden" name="body" value="{{ old('body', $article->body) }}">
                <trix-editor input="html-body"></trix-editor>
                @error("body")
                <div class="required_alert">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="admin-row">
           <button type="submit" class="btn btn_primary">Зберегти</button>
        </div>
    </form>
@endsection

@push('js')
    <script src="{{ asset('app/js-min/admin.min.js?v=' . random_int(1000, 9999)) }}"></script>
@endpush
