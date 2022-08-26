@extends("layouts.base");

@section("content")
    <div class="about">
        <section class="about__preview">
            <div class="about__description">
                <div class="about__background">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 684.65 668.08"><defs><style>.cls-1{fill:#191a29;}</style></defs><g id="Слой_5" data-name="Слой 5"><path class="cls-1" d="M498.5,841.5c69-40,123-96,174-159A485.21,485.21,0,0,1,534,585a480.64,480.64,0,0,1-98.5-144.5A799,799,0,0,1,388,180l-76,16a610.27,610.27,0,0,0,55,275A486.43,486.43,0,0,0,558.9,700.93l-61.9,49c-46-38.07-116-97.41-174.52-209.41C255.33,411.88,243,286.13,239,222.19L161.35,255a740.61,740.61,0,0,0,77.26,295.33,797.31,797.31,0,0,0,129,180A806.59,806.59,0,0,0,498.5,841.5Z" transform="translate(-161.35 -173.42)"/></g><g id="Слой_8" data-name="Слой 8"><path class="cls-1" d="M463,174" transform="translate(-161.35 -173.42)"/><path class="cls-1" d="M831,324c4.26-20.79,14.9-64,15-65-45.37-22.22-113.79-52.54-190.33-68.67A788.36,788.36,0,0,0,463,174a436.32,436.32,0,0,0,78.09,306,455.84,455.84,0,0,0,179,139.44,480.51,480.51,0,0,0,32.24-51.11A498.84,498.84,0,0,0,779,511.67a373.18,373.18,0,0,0,34.67-100l-48.95-24.11-40.39-19.89a343.85,343.85,0,0,0-92-30c9.56,16.22,57.82,90.43,63.34,96L725,447l-36,75c-15.79-9.64-32.3-24.58-52-44a282.69,282.69,0,0,1-41-51c-17-22-28.11-50.89-38.41-82.9-11.22-34.83-13.74-75-17.59-102.1,55,2,99.36,16.23,146,29l79,27Z" transform="translate(-161.35 -173.42)"/></g></svg>
                </div>
                <div class="about__main-info">
                    <h1 class="h1 about__title">Марафон саморозвитку?</h1>
                    <p class="h5 about__text">
                        Закрите ком'юніті, яке надасть тобі можливість досягти своїх цілей, виробити самодисципліну й загартувати характер.
                    </p>
                    <button class="btn btn_primary h6">
                        Взяти участь
                    </button>
                </div>
            </div>
            <div class="about__chain chain">
                <svg width="107" height="107" class="chain__image" viewBox="0 0 107 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1103_241)">
                        <path d="M56.9285 84.8129C56.8439 63.8003 55.8754 42.7988 56.1086 21.7845C57.8305 21.3524 59.4778 20.6823 60.8066 19.6961C64.2493 17.1409 65.4491 14.1232 65.1548 11.2272C64.5171 4.97721 56.9195 -0.702207 49.8628 0.0709166C44.0622 0.706873 39.0789 5.72255 38.5838 11.4899C37.9857 18.4813 43.7843 22.1785 50.0192 22.416C49.8127 43.3219 50.7713 64.2157 50.8474 85.1204C46.0711 86.6313 42.2731 91.0571 41.8454 96.0518C41.2206 103.329 47.5331 107.049 54.0502 107C57.3507 106.974 61.3645 106.264 64.0682 104.258C67.5096 101.703 68.7107 98.6845 68.4162 95.7884C67.894 90.6596 62.6819 85.9214 56.9285 84.8129ZM50.9468 6.81245C57.8771 6.09314 61.492 14.2427 53.2808 15.8578C53.1725 15.8567 53.0747 15.8412 52.9614 15.8491C45.9313 16.3111 41.8931 7.75053 50.9468 6.81245ZM56.5409 100.42C56.4332 100.419 56.3354 100.403 56.2208 100.41C49.1912 100.873 45.1542 92.3124 54.2068 91.3737C61.1376 90.655 64.7503 98.8035 56.5409 100.42Z" fill="black"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_1103_241">
                            <rect width="107" height="107" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </section>
        <section class="about__body">
            <article class="about__article about-article">
                <div class="about-article__text">
                    <h1 class="h1">Що за марафон?</h1>
                    <p class="h5">
                        Протягом місяця необхідно виконувати завчасно вибране завдання й звітувати про нього модератору.
                        Марафон проходить в три етапи, детальний опис яких буде нижче. За виконане завдання ви отримуєте бали. В кінці місяця формується список лідерів й за <a class="link link_default" href="#payment-rules">правилами розподілу кешу</a> правилами розподілу кешу виплати нараховуються переможцям.
                    </p>
                </div>
                <div class="about-article__image">
                    <svg width="304" height="304" viewBox="0 0 304 304" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M293.55 53.2C292.6 49.4 288.8 47.5 285 47.5H256.5V19C256.5 15.2 254.6 11.4 250.8 10.45C247 8.55004 243.2 9.50004 240.35 12.35L202.35 50.35C200.45 52.25 199.5 54.15 199.5 57V91.2001L145.35 145.35C141.55 149.15 141.55 154.85 145.35 158.65C147.25 160.55 150.1 161.5 152 161.5C153.9 161.5 156.75 160.55 158.65 158.65L212.8 104.5H247C249.85 104.5 251.75 103.55 253.65 101.65L291.65 63.65C294.5 60.8 295.45 57 293.55 53.2Z" fill="#2C2D3A"/>
                        <path d="M171.95 171.95C167.2 177.65 159.6 180.5 152 180.5C144.4 180.5 136.8 177.65 132.05 171.95C120.65 160.55 120.65 142.5 132.05 132.05L158.65 105.45C156.75 104.5 153.9 104.5 152 104.5C125.4 104.5 104.5 125.4 104.5 152C104.5 178.6 125.4 199.5 152 199.5C178.6 199.5 199.5 178.6 199.5 152C199.5 150.1 199.5 147.25 198.55 145.35L171.95 171.95Z" fill="#FBFDBE"/>
                        <path d="M266.95 114.95C262.2 120.65 254.6 123.5 247 123.5H220.4L213.75 130.15C216.6 136.8 217.55 144.4 217.55 152C217.55 189.05 188.1 218.5 151.05 218.5C114 218.5 84.55 189.05 84.55 152C84.55 114.95 114 85.5 151.05 85.5C158.65 85.5 166.25 87.4 172.9 89.3L180.5 83.6V57C180.5 49.4 183.35 41.8 189.05 37.05L198.55 27.55C183.35 21.85 168.15 19 152 19C78.85 19 19 78.85 19 152C19 225.15 78.85 285 152 285C225.15 285 285 225.15 285 152C285 135.85 282.15 120.65 276.45 105.45L266.95 114.95Z" fill="#ABAE28"/>
                    </svg>
                </div>
            </article>
            <article class="about__article about-article about-article_mirrored">
                <div class="about-article__text">
                    <h1 class="h1">Умови для участі</h1>
                    <p class="h5">
                        Кожен учасник сплачує мінімальний тариф, який стартує від 99 грн. Таким чином він поповнює <a class="link link_default" href="#cash">КЕШ</a> марафону (такий собі донат). Після сплати учаснику надається спеціальний id для аутентифікації та посилання на закритий телеграм чат та правила для всіх учасників.
                    </p>
                </div>
                <div class="about-article__image">
                    <svg width="304" height="304" viewBox="0 0 304 304" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_1124_233)">
                            <path d="M186.489 37.1525C186.489 43.4188 189.269 49.7754 193.599 53.6646C198.592 52.7998 202.407 44.0078 202.407 44.0078H213.019C213.019 49.3137 210.238 55.0813 205.909 58.9653C206.513 59.0183 207.097 58.7584 207.713 58.7584C219.418 58.7584 228.936 49.0484 228.936 37.3382C228.936 25.6279 219.418 16.0188 207.713 16.0188C196.008 16.0241 186.489 25.4422 186.489 37.1525Z" fill="#A5A815"/>
                            <path d="M22.0039 100.824C22.0039 112.529 31.5228 122.048 43.2278 122.048C43.8433 122.048 44.4269 122.695 45.0318 122.642C40.7021 118.753 37.9218 112.985 37.9218 107.679H48.5337C48.5337 107.679 52.3487 116.471 57.3416 117.331C61.6713 113.442 64.4516 107.472 64.4516 101.206C64.4516 89.5011 54.9327 79.7859 43.2278 79.7859C31.5228 79.7912 22.0039 89.1138 22.0039 100.824Z" fill="#FDFFBA"/>
                            <path d="M271.384 19.1758L281.137 15.9233L271.384 12.676V19.1758Z" fill="#EE8B26"/>
                            <path d="M215.794 84.906H210.244L213.019 91.8409L215.794 84.906Z" fill="#66CEDB"/>
                            <path d="M96.2874 203.187H69.7576C66.8234 203.187 64.4516 199.26 64.4516 196.331V169.802C64.4516 168.263 65.1202 166.804 66.2822 165.79C67.4442 164.787 68.9882 164.321 70.511 164.549L106.008 169.621L141.6 151.83L139.993 149.416L136.772 144.588L103.689 158.765C102.501 159.275 101.153 160.118 99.922 159.699L68.898 150.127H53.8397V187.269H43.2278V150.127H27.3099C18.5338 150.127 11.392 155.714 11.392 164.496V219.105H22.0039V171.351H32.6158V293.388H48.5337V222.861C48.5337 219.927 50.9055 219.105 53.8397 219.105H90.9815C93.9156 219.105 96.2874 219.927 96.2874 222.861V261.552H112.205V217.555C112.205 208.774 105.063 203.187 96.2874 203.187Z" fill="#A5A815"/>
                            <path d="M271.384 79.6001C271.384 82.529 269.013 86.4554 266.078 86.4554H227.223L217.948 108.873C217.141 110.889 215.194 111.823 213.019 111.823C210.849 111.823 208.901 111.086 208.089 109.069L198.815 86.4554H188.41L158.898 110.274L144.858 137.971L149.347 144.508L166.156 119.199C166.485 118.694 166.91 118.206 167.387 117.851L188.611 101.906C190.214 100.702 192.373 100.5 194.167 101.392C195.965 102.294 197.101 104.119 197.101 106.13V229.717H213.019V201.637V159.19C213.019 156.255 215.39 155.433 218.325 155.433H255.466C258.401 155.433 260.772 156.255 260.772 159.19V197.881H276.69V153.884C276.69 145.102 269.548 139.515 260.772 139.515H234.243C231.308 139.515 228.937 135.589 228.937 132.66V100.824C228.937 97.8898 231.308 97.0674 234.243 97.0674H266.078C274.854 97.0674 281.996 88.3762 281.996 79.6001V54.6196H271.384V79.6001Z" fill="#FDFFBA"/>
                            <path d="M207.713 68.9882C225.27 68.9882 239.549 54.7099 239.549 37.1524C239.549 19.595 225.27 5.31665 207.713 5.31665C190.155 5.31665 175.877 19.595 175.877 37.1524C175.877 54.7099 190.155 68.9882 207.713 68.9882ZM207.713 15.9233C219.418 15.9233 228.937 25.4422 228.937 37.1471C228.937 48.8521 219.418 58.371 207.713 58.371C207.092 58.371 206.514 59.0183 205.909 58.9653C210.238 55.0813 213.019 49.3137 213.019 44.0078H202.407C202.407 44.0078 198.592 52.7997 193.599 53.6593C189.269 49.7753 186.489 43.8061 186.489 37.5398C186.489 25.8348 196.008 15.9233 207.713 15.9233Z" fill="#191A29"/>
                            <path d="M43.2278 132.66C60.7852 132.66 75.0636 118.382 75.0636 100.824C75.0636 83.2666 60.7852 68.9883 43.2278 68.9883C25.6703 68.9883 11.392 83.2666 11.392 100.824C11.392 118.382 25.6703 132.66 43.2278 132.66ZM43.2278 79.6002C54.9327 79.6002 64.4516 89.1191 64.4516 100.824C64.4516 107.09 61.6713 113.447 57.3416 117.336C52.3487 116.471 48.5337 107.679 48.5337 107.679H37.9218C37.9218 112.985 40.7021 118.753 45.0318 122.637C44.4269 122.69 43.8433 122.43 43.2278 122.43C31.5228 122.43 22.0039 112.72 22.0039 101.01C22.0039 89.2995 31.5228 79.6002 43.2278 79.6002Z" fill="#191A29"/>
                            <path d="M299.591 10.8932L267.755 0.281266C266.126 -0.275861 264.359 0.00535524 262.974 1.00818C261.589 2.01101 260.772 3.60811 260.772 5.31132V47.7591V75.8435H186.489C185.247 75.8435 184.043 75.5039 183.088 76.2945L151.252 102.437C150.695 102.909 150.233 103.297 149.904 103.949L134.856 133.954L101.355 148.259L71.4343 139.043C70.8931 138.857 70.3253 139.515 69.7576 139.515H27.3099C12.6813 139.515 0.780029 149.867 0.780029 164.496V222.861C0.780029 225.79 3.1518 229.717 6.08599 229.717H22.0039V293.388H0.780029V304H27.3099H53.8397H75.0636C77.9977 304 80.3695 300.074 80.3695 297.145V272.164H90.9815H117.511H154.653C157.587 272.164 159.959 268.238 159.959 265.309V240.328H191.795H218.325C221.259 240.328 223.631 236.402 223.631 233.473V208.493H255.466H281.996H297.914V197.881H287.302V153.884C287.302 139.255 275.401 128.903 260.772 128.903H239.548V107.679H266.078C280.707 107.679 292.608 94.2234 292.608 79.6002V47.7644C292.608 44.8302 290.236 44.0077 287.302 44.0077H271.384V30.3608L299.591 20.9586C301.761 20.237 303.22 18.2101 303.22 15.9233C303.22 13.6364 301.761 11.6148 299.591 10.8932ZM215.794 84.9061L213.019 91.841L210.244 84.9008H215.794V84.9061ZM75.0636 261.552C72.1294 261.552 69.7576 262.375 69.7576 265.309V293.388H59.1457V229.717H85.6755V261.552H75.0636ZM96.2874 261.552V222.861C96.2874 219.927 93.9156 219.105 90.9815 219.105H53.8397C50.9055 219.105 48.5337 219.927 48.5337 222.861V293.388H32.6158V171.351H22.0039V219.105H11.392V164.496C11.392 155.714 18.5338 150.127 27.3099 150.127H43.2278V187.269H53.8397V150.127H68.898L99.9167 159.688C101.148 160.108 102.495 159.651 103.684 159.147L136.767 144.779L139.987 149.512L141.595 151.878L106.003 169.648L70.5057 164.565C68.9829 164.336 67.4389 164.798 66.2769 165.801C65.1202 166.804 64.4516 168.258 64.4516 169.802V196.331C64.4516 199.26 66.8234 203.187 69.7576 203.187H96.2874C105.063 203.187 112.205 208.774 112.205 217.555V261.552H96.2874ZM154.653 229.717C151.719 229.717 149.347 230.539 149.347 233.473V261.552H122.817V217.555C122.817 202.927 110.916 192.575 96.2874 192.575H75.0636V175.919L106.146 180.36C107.218 180.509 108.3 180.329 109.271 179.851L151.719 158.627C152.494 158.24 153.104 157.651 153.597 156.966C153.64 156.908 153.719 156.887 153.762 156.828L174.481 125.751L186.489 116.742V229.717H154.653ZM250.16 197.881H223.631V166.045H250.16V197.881ZM281.996 79.6002C281.996 88.3762 274.854 97.0674 266.078 97.0674H234.243C231.308 97.0674 228.937 97.8898 228.937 100.824V132.66C228.937 135.589 231.308 139.515 234.243 139.515H260.772C269.548 139.515 276.69 145.102 276.69 153.884V197.881H260.772V159.19C260.772 156.255 258.401 155.433 255.466 155.433H218.325C215.39 155.433 213.019 156.255 213.019 159.19V201.637V229.717H197.101V106.13C197.101 104.119 195.965 102.283 194.167 101.381C192.373 100.49 190.214 100.675 188.611 101.885L167.387 117.803C166.905 118.159 166.485 118.599 166.156 119.103L149.347 144.317L144.858 137.578L158.898 110.269L188.41 86.4555H198.815L208.089 108.873C208.896 110.889 210.849 111.823 213.019 111.823C215.189 111.823 217.136 111.086 217.948 109.069L227.223 86.4555H266.078C269.013 86.4555 271.384 82.529 271.384 79.6002V54.6197H281.996V79.6002ZM271.384 19.1758V12.676L281.137 15.9233L271.384 19.1758Z" fill="#191A29"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_1124_233">
                                <rect width="304" height="304" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </article>
            <article class="about__section promo-section">
                <div class="about__header section-header">
                    <h6 class="section-header__title-small h6">Етап 1</h6>
                    <h1 class="section-header__title h1">Підготовка</h1>
                </div>
                <div class="about__content">
                    <div class="about__card about-card">
                        <div class="about-card__image">
                            <svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M57.3125 114.625C57.3125 114.625 49.125 114.625 49.125 106.438C49.125 98.25 57.3125 73.6875 90.0625 73.6875C122.812 73.6875 131 98.25 131 106.438C131 114.625 122.812 114.625 122.812 114.625H57.3125ZM90.0625 65.5C96.5769 65.5 102.824 62.9122 107.431 58.3058C112.037 53.6994 114.625 47.4519 114.625 40.9375C114.625 34.4231 112.037 28.1756 107.431 23.5692C102.824 18.9628 96.5769 16.375 90.0625 16.375C83.5481 16.375 77.3005 18.9628 72.6942 23.5692C68.0878 28.1756 65.5 34.4231 65.5 40.9375C65.5 47.4519 68.0878 53.6994 72.6942 58.3058C77.3005 62.9122 83.5481 65.5 90.0625 65.5Z" fill="#A5A815"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M42.706 114.941C41.4922 112.385 40.8869 109.583 40.9375 106.754C40.9375 95.6594 46.505 84.2379 56.7885 76.296C51.6557 74.7145 46.3081 73.9411 40.9375 74.0035C8.1875 74.0035 0 98.566 0 106.754C0 114.941 8.1875 114.941 8.1875 114.941H42.706Z" fill="#FDFFBA"/>
                                <path d="M36.8438 65.5C42.2724 65.5 47.4787 63.3435 51.3173 59.5048C55.156 55.6662 57.3125 50.4599 57.3125 45.0312C57.3125 39.6026 55.156 34.3963 51.3173 30.5577C47.4787 26.719 42.2724 24.5625 36.8438 24.5625C31.4151 24.5625 26.2088 26.719 22.3702 30.5577C18.5315 34.3963 16.375 39.6026 16.375 45.0312C16.375 50.4599 18.5315 55.6662 22.3702 59.5048C26.2088 63.3435 31.4151 65.5 36.8438 65.5Z" fill="#FDFFBA"/>
                            </svg>
                        </div>
                        <div class="about-card__text">
                            <span class="h6">Набір учасників</span>
                        </div>
                    </div>
                    <div class="about__card about-card">
                        <div class="about-card__image">
                            <svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M52.2094 54.7296C49.1186 53.8289 46.1669 53.0614 43.3541 52.4268C42.1949 48.758 41.6098 44.9321 41.6194 41.0846C41.6194 24.2976 52.409 10.6885 65.7188 10.6885C79.0286 10.6885 89.808 24.2848 89.808 41.0743C89.8158 44.7414 89.2848 48.3897 88.2319 51.9023C84.7317 52.6358 81.003 53.5782 77.0457 54.7296C71.4168 56.3722 66.8651 57.9994 64.6212 58.8361C62.3901 57.9994 57.8383 56.3722 52.2094 54.7296ZM19.4722 76.4622C16.6808 76.4622 13.952 77.29 11.6311 78.8409C9.31012 80.3918 7.50119 82.5962 6.43307 85.1752C5.36495 87.7542 5.08562 90.592 5.63038 93.3297C6.17515 96.0675 7.51956 98.5822 9.49358 100.556C11.4676 102.53 13.9826 103.874 16.7204 104.418C19.4583 104.962 22.2961 104.682 24.8749 103.614C27.4537 102.545 29.6577 100.736 31.2082 98.4145C32.7586 96.0932 33.5859 93.3643 33.5854 90.5729C33.5847 86.8303 32.0975 83.2412 29.4509 80.595C26.8042 77.9488 23.2148 76.4622 19.4722 76.4622ZM111.528 76.4622C108.736 76.4622 106.008 77.29 103.687 78.8409C101.366 80.3918 99.5568 82.5962 98.4887 85.1752C97.4206 87.7542 97.1413 90.592 97.686 93.3297C98.2308 96.0675 99.5752 98.5822 101.549 100.556C103.523 102.53 106.038 103.874 108.776 104.418C111.514 104.962 114.352 104.682 116.931 103.614C119.509 102.545 121.713 100.736 123.264 98.4145C124.814 96.0932 125.642 93.3643 125.641 90.5729C125.64 86.8307 124.154 83.242 121.507 80.5959C118.861 77.9498 115.273 76.4629 111.53 76.4622H111.528ZM93.3235 90.5729C93.3274 87.0527 94.3505 83.609 96.2693 80.6578C98.188 77.7065 100.92 75.374 104.136 73.942V54.1001C87.6357 54.1001 64.6212 63.219 64.6212 63.219C64.6212 63.219 41.6066 54.1001 25.1062 54.1001V73.2691C28.7585 74.4592 31.9407 76.7742 34.1973 79.8828C36.4539 82.9914 37.6691 86.7342 37.6691 90.5755C37.6691 94.4167 36.4539 98.1595 34.1973 101.268C31.9407 104.377 28.7585 106.692 25.1062 107.882V109.673C41.6066 109.673 64.6212 120.311 64.6212 120.311C64.6212 120.311 87.646 109.68 104.136 109.68V107.204C100.92 105.772 98.188 103.439 96.2693 100.488C94.3505 97.5368 93.3274 94.093 93.3235 90.5729Z" fill="#A5A815"/>
                            </svg>
                        </div>
                        <div class="about-card__text">
                            <span class="h6">Ознайомлення з правилами</span>
                        </div>
                    </div>
                    <div class="about__card about-card">
                        <div class="about-card__image">
                            <svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M65.4987 0C29.381 0 0 29.3833 0 65.5C0 101.617 29.381 131 65.4987 131C101.616 131 131 101.617 131 65.5C131 29.3833 101.616 0 65.4987 0ZM65.4987 122.41C34.1189 122.41 8.59032 96.8797 8.59032 65.5C8.59032 34.1199 34.1186 8.59065 65.4987 8.59065C96.8788 8.59065 122.409 34.1203 122.409 65.5C122.409 96.8797 96.8784 122.41 65.4987 122.41Z" fill="#A5A815"/>
                                <path d="M89.213 44.0572L55.4376 77.831L41.7845 64.1808C40.1067 62.505 37.3888 62.504 35.711 64.1818C34.0325 65.8602 34.0325 68.5784 35.711 70.2562L52.4014 86.944C53.2401 87.7817 54.3388 88.2009 55.4376 88.2009C56.5364 88.2009 57.6381 87.7817 58.4765 86.9427C58.4791 86.9391 58.4811 86.9355 58.4853 86.9312L95.2862 50.1307C96.9646 48.4539 96.9646 45.7337 95.2862 44.0569C93.6087 42.3791 90.8888 42.3791 89.213 44.0572Z" fill="#FDFFBA"/>
                            </svg>
                        </div>
                        <div class="about-card__text">
                            <span class="h6">Вибір цілі на місяць</span>
                        </div>
                    </div>
                </div>
                <p class="promo-section__text h5">
                    Під кінець кожного місяця ми збираємо аудиторію, яка має за мету кожного дня ставати в чомусь краще.
                    Перед початком місячного марафону ми спілкуємось й вибираємо <a class="link link_default" href="#monthly-goal">місячну мету</a>.
                    Можливо, ви хотіли б бігати щодня, вчити іноземну мову чи прокидатись о 5 ранку.
                    Коли мету вибрано, вона закріплюється в чаті і з початком нового місяця ми стартуємо.
                </p>
            </article>
            <article class="about__section promo-section">
                <div class="about__header section-header">
                    <h6 class="section-header__title-small h6">Етап 2</h6>
                    <h1 class="section-header__title h1">Прогрес</h1>
                </div>
                <div class="about__content">
                    <div class="about__card about-card">
                        <div class="about-card__image">
                            <svg width="131" height="131" viewBox="0 0 131 131" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M27.2917 120.083H103.708C109.729 120.083 114.625 115.187 114.625 109.167V27.2917C114.625 21.2712 109.729 16.3751 103.708 16.3751H92.7917C92.7917 14.9274 92.2166 13.5391 91.193 12.5155C90.1693 11.4918 88.781 10.9167 87.3333 10.9167H43.6667C42.219 10.9167 40.8307 11.4918 39.807 12.5155C38.7834 13.5391 38.2083 14.9274 38.2083 16.3751H27.2917C21.2711 16.3751 16.375 21.2712 16.375 27.2917V109.167C16.375 115.187 21.2711 120.083 27.2917 120.083ZM27.2917 27.2917H38.2083V38.2084H92.7917V27.2917H103.708V109.167H27.2917V27.2917Z" fill="#A5A815"/>
                                <path d="M60.0416 74.1568L50.2548 64.37L42.5367 72.0881L60.0416 89.593L88.4632 61.1715L80.7451 53.4534L60.0416 74.1568Z" fill="#FDFFBA"/>
                            </svg>
                        </div>
                        <div class="about-card__text">
                            <span class="h6">Виконуємо завдання</span>
                        </div>
                    </div>
                    <div class="about__card about-card">
                        <div class="about-card__image">
                            <svg width="138" height="102" viewBox="0 0 138 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.9397 14.9796C25.9397 7.28177 32.1239 1.07373 39.9031 1.07373C47.6327 1.07373 53.8664 7.28177 53.8664 14.9796C53.8168 22.7273 47.5831 28.8854 39.9031 28.8854C32.1735 28.8854 25.9397 22.6773 25.9397 14.9796ZM102.961 74.6211H77.625V52.0737C77.625 41.0894 67.9861 32.2106 57.1407 32.2106H23.1797C11.2729 32.2106 1.07278 42.4857 1.07817 52.6106V93.9474C1.06415 98.5283 4.31308 100.92 7.54692 100.926C10.7888 100.932 14.0157 98.5401 14.0157 93.9474V53.6843H18.3282V100.926H60.375V53.6843H64.6875L64.7312 80.725C64.7026 85.4111 67.6109 87.4065 70.6172 87.5053H102.961C111.782 87.5053 111.782 74.6211 102.961 74.6211ZM136.922 44.406L126.934 34.5265C126.178 33.7739 126.178 32.5531 126.934 31.8004C127.459 31.2775 128.387 31.2239 128.879 31.3178C130.875 31.6995 132.524 31.4568 133.727 30.2586C135.794 28.2004 134.919 23.9539 132.31 21.1908C129.21 17.9075 125.179 17.5612 123.112 19.62C121.913 20.8145 121.69 22.57 122.044 24.4296C122.138 24.9213 122.076 25.849 121.551 26.3719C120.795 27.1245 119.569 27.1245 118.814 26.3719L109.591 17.187L100.131 26.6076C99.3751 27.3602 99.3751 28.581 100.131 29.3336C100.652 29.8522 101.7 29.8839 102.132 29.7293C102.135 29.7288 104.862 28.8354 106.917 30.8819C108.984 32.9401 108.477 36.7834 105.784 39.4649C103.09 42.1464 99.2317 42.6522 97.165 40.5939C95.8728 39.3071 95.8804 37.4861 96.1639 35.3377C96.2346 34.8019 96.0243 34.2474 95.6103 33.8356C94.8546 33.0829 93.6287 33.0829 92.873 33.8356L84.6329 42.0423L111.964 69.2613L120.205 61.0551C120.96 60.3024 120.96 59.0817 120.205 58.329C119.669 57.7959 118.927 57.7084 118.22 57.8523C116.416 58.2195 114.611 57.9693 113.418 56.7813C111.351 54.723 111.859 50.8798 114.552 48.1983C117.245 45.5167 121.104 45.011 123.17 47.0693C125.243 49.1334 124.214 52.0281 124.214 52.0281C124.067 52.6551 124.235 53.3391 124.725 53.8276C125.481 54.5802 126.82 54.475 127.685 53.6059L136.922 44.406Z" fill="#FDFFBA"/>
                            </svg>
                        </div>
                        <div class="about-card__text">
                            <span class="h6">Відправляємо звіт</span>
                        </div>
                    </div>
                </div>
                <p class="promo-section__text h5">
                    Кожного нового дня місяця ви маєте виконувати
                    обране завдання й відзвітувати про виконання модератору.
                    Для цього у вас є час від 5.00 до 23.00 . За виконане завдання вам нараховується 10 <a href="#skip-days" class="link link_default">поінтів</a>.
                    За місяць у вас можуть бути три дні пропуску <a href="#skip-days" class="link link_default">(skip days)</a>, під час яких ви можете взяти відпочинок
                    й нічого не звітувати. На четвертий день пропуску з вас почнуться знімати бали.
                    Кожен новий день пропуску -3 поінт.
                </p>
            </article>
        </section>
    </div>
@endsection

@once
    @push('js')
        <script src="{{ asset('app/js-min/default.min.js?v=' . random_int(1000, 9999)) }}"></script>
    @endpush
@endonce
