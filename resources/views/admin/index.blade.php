@extends("admin.layout.admin")

@section('content')
    <div class="admin-content__header">
        <div class="admin-content__title h1">{{strtoupper($modelName)}}</div>
        <div class="admin-content__navigation">
            <div class="admin-content__search form-input">
                <input type="text" placeholder="Введіть для пошуку">
            </div>
            <div class="admin-content__add">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 6C12.5523 6 13 6.44772 13 7V11H17C17.5523 11 18 11.4477 18 12C18 12.5523 17.5523 13 17 13H13V17C13 17.5523 12.5523 18 12 18C11.4477 18 11 17.5523 11 17V13H7C6.44772 13 6 12.5523 6 12C6 11.4477 6.44772 11 7 11H11V7C11 6.44772 11.4477 6 12 6Z" fill="white"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5 22C3.34315 22 2 20.6569 2 19V5C2 3.34315 3.34315 2 5 2H19C20.6569 2 22 3.34315 22 5V19C22 20.6569 20.6569 22 19 22H5ZM4 19C4 19.5523 4.44772 20 5 20H19C19.5523 20 20 19.5523 20 19V5C20 4.44772 19.5523 4 19 4H5C4.44772 4 4 4.44772 4 5V19Z" fill="white"/>
                </svg>
            </div>
        </div>
    </div>
    <table class="admin-content__list admin-table">
        <thead>
        @switch($modelName)
            @case('articles')
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Категорія</th>
                <th>Виконати</th>
            </tr>
            @break
            @case('products')
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>Статус</th>
                <th>Виконати</th>
            </tr>
            @break
            @case('comments')
            <tr>
                <th>ID</th>
                <th>Контент</th>
                <th>Автор</th>
                <th>Виконати</th>
            </tr>
            @break
            @case('pages')
            <tr>
                <th>ID</th>
                <th>Назва</th>
                <th>url</th>
                <th>Виконати</th>
            </tr>
            @break
            @case('users')
            <tr>
                <th>ID</th>
                <th>Ім'я</th>
                <th>Роль</th>
                <th>Виконати</th>
            </tr>
            @break
        @endswitch
        </thead>
        <tbody>
        @foreach($models as $model)
            @switch($modelName)
                @case('articles')
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->title}}</td>
                    <td>{{$model->category->value}}</td>
                    <td>
                        <a href="#" class="remove">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.61 18L24.47 13.14C24.6338 12.9487 24.7194 12.7026 24.7097 12.4509C24.7 12.1993 24.5957 11.9605 24.4176 11.7824C24.2395 11.6043 24.0007 11.5 23.749 11.4903C23.4974 11.4806 23.2513 11.5662 23.06 11.73L18.2 16.54L13.31 11.65C13.1187 11.4862 12.8726 11.4006 12.6209 11.4103C12.3693 11.42 12.1305 11.5243 11.9524 11.7024C11.7743 11.8805 11.67 12.1193 11.6603 12.3709C11.6506 12.6226 11.7362 12.8687 11.9 13.06L16.78 18L12 22.72C11.8953 22.8096 11.8103 22.92 11.7503 23.044C11.6902 23.1681 11.6565 23.3032 11.6512 23.4409C11.6459 23.5787 11.6691 23.716 11.7194 23.8443C11.7696 23.9727 11.8459 24.0892 11.9433 24.1867C12.0408 24.2841 12.1573 24.3604 12.2857 24.4106C12.414 24.4609 12.5513 24.4841 12.689 24.4788C12.8268 24.4735 12.9619 24.4398 13.086 24.3797C13.21 24.3197 13.3203 24.2347 13.41 24.13L18.18 19.36L22.92 24.1C23.1113 24.2638 23.3574 24.3494 23.609 24.3397C23.8607 24.33 24.0995 24.2257 24.2776 24.0476C24.4557 23.8695 24.56 23.6307 24.5697 23.3791C24.5794 23.1274 24.4938 22.8813 24.33 22.69L19.61 18Z" fill="black"/>
                                <path d="M18 34C14.8355 34 11.7421 33.0616 9.11088 31.3035C6.4797 29.5454 4.42894 27.0466 3.21793 24.1229C2.00693 21.1993 1.69008 17.9823 2.30744 14.8786C2.92481 11.7749 4.44866 8.92394 6.6863 6.6863C8.92394 4.44866 11.7749 2.92481 14.8786 2.30744C17.9823 1.69008 21.1993 2.00693 24.1229 3.21793C27.0466 4.42894 29.5454 6.4797 31.3035 9.11088C33.0616 11.7421 34 14.8355 34 18C34 22.2435 32.3143 26.3131 29.3137 29.3137C26.3131 32.3143 22.2435 34 18 34ZM18 4.00001C15.2311 4.00001 12.5243 4.82109 10.222 6.35943C7.91974 7.89777 6.12532 10.0843 5.06569 12.6424C4.00607 15.2006 3.72882 18.0155 4.26901 20.7313C4.80921 23.447 6.14258 25.9416 8.10051 27.8995C10.0584 29.8574 12.553 31.1908 15.2687 31.731C17.9845 32.2712 20.7994 31.9939 23.3576 30.9343C25.9157 29.8747 28.1022 28.0803 29.6406 25.778C31.1789 23.4757 32 20.7689 32 18C32 14.287 30.525 10.726 27.8995 8.10051C25.274 5.475 21.713 4.00001 18 4.00001Z" fill="black"/>
                            </svg>
                        </a>
                        <a href="#" class="edit">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.637 8.849L27.151 0.362884C26.9187 0.130546 26.6034 0 26.2747 0C25.946 0 25.6307 0.130546 25.3984 0.362884L0.629421 25.1318C0.406337 25.3552 0.276618 25.655 0.267034 25.9705L0.000819681 34.723C-0.00959092 35.0645 0.121616 35.3954 0.363208 35.6371C0.596041 35.8698 0.911334 36 1.23952 36C1.25207 36 1.26463 35.9998 1.27736 35.9993L10.0295 35.7328C10.345 35.7232 10.6449 35.5937 10.8682 35.3706L35.6371 10.6018C36.121 10.1178 36.121 9.33302 35.637 8.849ZM9.46273 33.2703L2.51837 33.4818L2.72972 26.5371L17.7877 11.4789L24.5216 18.2116L9.46273 33.2703ZM26.2744 16.459L19.5404 9.72647L26.2745 2.99214L33.0077 9.72548L26.2744 16.459Z" fill="black"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @break
                @case('products')
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->title}}</td>
                    <td>{{$model->type->value}}</td>
                    <td>
                        <a href="#" class="remove">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.61 18L24.47 13.14C24.6338 12.9487 24.7194 12.7026 24.7097 12.4509C24.7 12.1993 24.5957 11.9605 24.4176 11.7824C24.2395 11.6043 24.0007 11.5 23.749 11.4903C23.4974 11.4806 23.2513 11.5662 23.06 11.73L18.2 16.54L13.31 11.65C13.1187 11.4862 12.8726 11.4006 12.6209 11.4103C12.3693 11.42 12.1305 11.5243 11.9524 11.7024C11.7743 11.8805 11.67 12.1193 11.6603 12.3709C11.6506 12.6226 11.7362 12.8687 11.9 13.06L16.78 18L12 22.72C11.8953 22.8096 11.8103 22.92 11.7503 23.044C11.6902 23.1681 11.6565 23.3032 11.6512 23.4409C11.6459 23.5787 11.6691 23.716 11.7194 23.8443C11.7696 23.9727 11.8459 24.0892 11.9433 24.1867C12.0408 24.2841 12.1573 24.3604 12.2857 24.4106C12.414 24.4609 12.5513 24.4841 12.689 24.4788C12.8268 24.4735 12.9619 24.4398 13.086 24.3797C13.21 24.3197 13.3203 24.2347 13.41 24.13L18.18 19.36L22.92 24.1C23.1113 24.2638 23.3574 24.3494 23.609 24.3397C23.8607 24.33 24.0995 24.2257 24.2776 24.0476C24.4557 23.8695 24.56 23.6307 24.5697 23.3791C24.5794 23.1274 24.4938 22.8813 24.33 22.69L19.61 18Z" fill="black"/>
                                <path d="M18 34C14.8355 34 11.7421 33.0616 9.11088 31.3035C6.4797 29.5454 4.42894 27.0466 3.21793 24.1229C2.00693 21.1993 1.69008 17.9823 2.30744 14.8786C2.92481 11.7749 4.44866 8.92394 6.6863 6.6863C8.92394 4.44866 11.7749 2.92481 14.8786 2.30744C17.9823 1.69008 21.1993 2.00693 24.1229 3.21793C27.0466 4.42894 29.5454 6.4797 31.3035 9.11088C33.0616 11.7421 34 14.8355 34 18C34 22.2435 32.3143 26.3131 29.3137 29.3137C26.3131 32.3143 22.2435 34 18 34ZM18 4.00001C15.2311 4.00001 12.5243 4.82109 10.222 6.35943C7.91974 7.89777 6.12532 10.0843 5.06569 12.6424C4.00607 15.2006 3.72882 18.0155 4.26901 20.7313C4.80921 23.447 6.14258 25.9416 8.10051 27.8995C10.0584 29.8574 12.553 31.1908 15.2687 31.731C17.9845 32.2712 20.7994 31.9939 23.3576 30.9343C25.9157 29.8747 28.1022 28.0803 29.6406 25.778C31.1789 23.4757 32 20.7689 32 18C32 14.287 30.525 10.726 27.8995 8.10051C25.274 5.475 21.713 4.00001 18 4.00001Z" fill="black"/>
                            </svg>
                        </a>
                        <a href="#" class="edit">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.637 8.849L27.151 0.362884C26.9187 0.130546 26.6034 0 26.2747 0C25.946 0 25.6307 0.130546 25.3984 0.362884L0.629421 25.1318C0.406337 25.3552 0.276618 25.655 0.267034 25.9705L0.000819681 34.723C-0.00959092 35.0645 0.121616 35.3954 0.363208 35.6371C0.596041 35.8698 0.911334 36 1.23952 36C1.25207 36 1.26463 35.9998 1.27736 35.9993L10.0295 35.7328C10.345 35.7232 10.6449 35.5937 10.8682 35.3706L35.6371 10.6018C36.121 10.1178 36.121 9.33302 35.637 8.849ZM9.46273 33.2703L2.51837 33.4818L2.72972 26.5371L17.7877 11.4789L24.5216 18.2116L9.46273 33.2703ZM26.2744 16.459L19.5404 9.72647L26.2745 2.99214L33.0077 9.72548L26.2744 16.459Z" fill="black"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @break
                @case('comments')
                <tr>
                    <th>ID</th>
                    <th>Контент</th>
                    <th>Автор</th>
                    <th>Виконати</th>
                </tr>
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->body}}</td>
                    <td>{{$model->user->name}}</td>
                    <td>
                        <a href="#" class="remove">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.61 18L24.47 13.14C24.6338 12.9487 24.7194 12.7026 24.7097 12.4509C24.7 12.1993 24.5957 11.9605 24.4176 11.7824C24.2395 11.6043 24.0007 11.5 23.749 11.4903C23.4974 11.4806 23.2513 11.5662 23.06 11.73L18.2 16.54L13.31 11.65C13.1187 11.4862 12.8726 11.4006 12.6209 11.4103C12.3693 11.42 12.1305 11.5243 11.9524 11.7024C11.7743 11.8805 11.67 12.1193 11.6603 12.3709C11.6506 12.6226 11.7362 12.8687 11.9 13.06L16.78 18L12 22.72C11.8953 22.8096 11.8103 22.92 11.7503 23.044C11.6902 23.1681 11.6565 23.3032 11.6512 23.4409C11.6459 23.5787 11.6691 23.716 11.7194 23.8443C11.7696 23.9727 11.8459 24.0892 11.9433 24.1867C12.0408 24.2841 12.1573 24.3604 12.2857 24.4106C12.414 24.4609 12.5513 24.4841 12.689 24.4788C12.8268 24.4735 12.9619 24.4398 13.086 24.3797C13.21 24.3197 13.3203 24.2347 13.41 24.13L18.18 19.36L22.92 24.1C23.1113 24.2638 23.3574 24.3494 23.609 24.3397C23.8607 24.33 24.0995 24.2257 24.2776 24.0476C24.4557 23.8695 24.56 23.6307 24.5697 23.3791C24.5794 23.1274 24.4938 22.8813 24.33 22.69L19.61 18Z" fill="black"/>
                                <path d="M18 34C14.8355 34 11.7421 33.0616 9.11088 31.3035C6.4797 29.5454 4.42894 27.0466 3.21793 24.1229C2.00693 21.1993 1.69008 17.9823 2.30744 14.8786C2.92481 11.7749 4.44866 8.92394 6.6863 6.6863C8.92394 4.44866 11.7749 2.92481 14.8786 2.30744C17.9823 1.69008 21.1993 2.00693 24.1229 3.21793C27.0466 4.42894 29.5454 6.4797 31.3035 9.11088C33.0616 11.7421 34 14.8355 34 18C34 22.2435 32.3143 26.3131 29.3137 29.3137C26.3131 32.3143 22.2435 34 18 34ZM18 4.00001C15.2311 4.00001 12.5243 4.82109 10.222 6.35943C7.91974 7.89777 6.12532 10.0843 5.06569 12.6424C4.00607 15.2006 3.72882 18.0155 4.26901 20.7313C4.80921 23.447 6.14258 25.9416 8.10051 27.8995C10.0584 29.8574 12.553 31.1908 15.2687 31.731C17.9845 32.2712 20.7994 31.9939 23.3576 30.9343C25.9157 29.8747 28.1022 28.0803 29.6406 25.778C31.1789 23.4757 32 20.7689 32 18C32 14.287 30.525 10.726 27.8995 8.10051C25.274 5.475 21.713 4.00001 18 4.00001Z" fill="black"/>
                            </svg>
                        </a>
                        <a href="#" class="edit">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.637 8.849L27.151 0.362884C26.9187 0.130546 26.6034 0 26.2747 0C25.946 0 25.6307 0.130546 25.3984 0.362884L0.629421 25.1318C0.406337 25.3552 0.276618 25.655 0.267034 25.9705L0.000819681 34.723C-0.00959092 35.0645 0.121616 35.3954 0.363208 35.6371C0.596041 35.8698 0.911334 36 1.23952 36C1.25207 36 1.26463 35.9998 1.27736 35.9993L10.0295 35.7328C10.345 35.7232 10.6449 35.5937 10.8682 35.3706L35.6371 10.6018C36.121 10.1178 36.121 9.33302 35.637 8.849ZM9.46273 33.2703L2.51837 33.4818L2.72972 26.5371L17.7877 11.4789L24.5216 18.2116L9.46273 33.2703ZM26.2744 16.459L19.5404 9.72647L26.2745 2.99214L33.0077 9.72548L26.2744 16.459Z" fill="black"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @break
                @case('pages')
                <tr>
                    <td>ID</td>
                    <td>Назва</td>
                    <td>url</td>
                    <td>Виконати</td>
                </tr>
                @break
                @case('users')
                <tr>
                    <td>{{$model->id}}</td>
                    <td>{{$model->name}}</td>
                    <td>{{$model->role->value}}</td>
                    <td>
                        <a href="#" class="remove">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M19.61 18L24.47 13.14C24.6338 12.9487 24.7194 12.7026 24.7097 12.4509C24.7 12.1993 24.5957 11.9605 24.4176 11.7824C24.2395 11.6043 24.0007 11.5 23.749 11.4903C23.4974 11.4806 23.2513 11.5662 23.06 11.73L18.2 16.54L13.31 11.65C13.1187 11.4862 12.8726 11.4006 12.6209 11.4103C12.3693 11.42 12.1305 11.5243 11.9524 11.7024C11.7743 11.8805 11.67 12.1193 11.6603 12.3709C11.6506 12.6226 11.7362 12.8687 11.9 13.06L16.78 18L12 22.72C11.8953 22.8096 11.8103 22.92 11.7503 23.044C11.6902 23.1681 11.6565 23.3032 11.6512 23.4409C11.6459 23.5787 11.6691 23.716 11.7194 23.8443C11.7696 23.9727 11.8459 24.0892 11.9433 24.1867C12.0408 24.2841 12.1573 24.3604 12.2857 24.4106C12.414 24.4609 12.5513 24.4841 12.689 24.4788C12.8268 24.4735 12.9619 24.4398 13.086 24.3797C13.21 24.3197 13.3203 24.2347 13.41 24.13L18.18 19.36L22.92 24.1C23.1113 24.2638 23.3574 24.3494 23.609 24.3397C23.8607 24.33 24.0995 24.2257 24.2776 24.0476C24.4557 23.8695 24.56 23.6307 24.5697 23.3791C24.5794 23.1274 24.4938 22.8813 24.33 22.69L19.61 18Z" fill="black"/>
                                <path d="M18 34C14.8355 34 11.7421 33.0616 9.11088 31.3035C6.4797 29.5454 4.42894 27.0466 3.21793 24.1229C2.00693 21.1993 1.69008 17.9823 2.30744 14.8786C2.92481 11.7749 4.44866 8.92394 6.6863 6.6863C8.92394 4.44866 11.7749 2.92481 14.8786 2.30744C17.9823 1.69008 21.1993 2.00693 24.1229 3.21793C27.0466 4.42894 29.5454 6.4797 31.3035 9.11088C33.0616 11.7421 34 14.8355 34 18C34 22.2435 32.3143 26.3131 29.3137 29.3137C26.3131 32.3143 22.2435 34 18 34ZM18 4.00001C15.2311 4.00001 12.5243 4.82109 10.222 6.35943C7.91974 7.89777 6.12532 10.0843 5.06569 12.6424C4.00607 15.2006 3.72882 18.0155 4.26901 20.7313C4.80921 23.447 6.14258 25.9416 8.10051 27.8995C10.0584 29.8574 12.553 31.1908 15.2687 31.731C17.9845 32.2712 20.7994 31.9939 23.3576 30.9343C25.9157 29.8747 28.1022 28.0803 29.6406 25.778C31.1789 23.4757 32 20.7689 32 18C32 14.287 30.525 10.726 27.8995 8.10051C25.274 5.475 21.713 4.00001 18 4.00001Z" fill="black"/>
                            </svg>
                        </a>
                        <a href="#" class="edit">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M35.637 8.849L27.151 0.362884C26.9187 0.130546 26.6034 0 26.2747 0C25.946 0 25.6307 0.130546 25.3984 0.362884L0.629421 25.1318C0.406337 25.3552 0.276618 25.655 0.267034 25.9705L0.000819681 34.723C-0.00959092 35.0645 0.121616 35.3954 0.363208 35.6371C0.596041 35.8698 0.911334 36 1.23952 36C1.25207 36 1.26463 35.9998 1.27736 35.9993L10.0295 35.7328C10.345 35.7232 10.6449 35.5937 10.8682 35.3706L35.6371 10.6018C36.121 10.1178 36.121 9.33302 35.637 8.849ZM9.46273 33.2703L2.51837 33.4818L2.72972 26.5371L17.7877 11.4789L24.5216 18.2116L9.46273 33.2703ZM26.2744 16.459L19.5404 9.72647L26.2745 2.99214L33.0077 9.72548L26.2744 16.459Z" fill="black"/>
                            </svg>
                        </a>
                    </td>
                </tr>
                @break
            @endswitch
        @endforeach
        </tbody>
    </table>
    {{ $models->links('includes.pagination') }}

@endsection

@push('js')
    <script src="{{asset('app/js/admin.js')}}"></script>
@endpush
