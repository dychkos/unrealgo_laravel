<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>
    <style id="" media="all">/* latin-ext */
        /* cyrillic */
        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 300;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v21/iJWKBXyIfDnIV7nFrXyi0A.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 400;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v21/iJWKBXyIfDnIV7nFrXyi0A.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
        /* cyrillic */
        @font-face {
            font-family: 'Rubik';
            font-style: normal;
            font-weight: 700;
            font-display: swap;
            src: url(https://fonts.gstatic.com/s/rubik/v21/iJWKBXyIfDnIV7nFrXyi0A.woff2) format('woff2');
            unicode-range: U+0301, U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }
    </style>

    <style>

        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode:bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],  /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img + div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u ~ div .email-container {
                min-width: 320px !important;
            }
        }
        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u ~ div .email-container {
                min-width: 375px !important;
            }
        }
        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u ~ div .email-container {
                min-width: 414px !important;
            }
        }

    </style>


    <style>

        .primary{
            background: #A5A815;
        }
        .bg_white{
            background: #ececec;
        }
        .bg_light{
            background: #fafafa;
        }
        .bg_black{
            background: #000000;
        }
        .bg_dark{
            background: #191a29;
        }
        .email-section{
            padding:2.5em;
        }

        /*BUTTON*/
        .btn{
            padding: 10px 25px;
            display: inline-block;
        }
        .btn.btn-primary{
            border-radius: 20px;
            background: #A5A815;
            color: #ffffff;
        }
        .btn.btn-white{
            border-radius: 20px;
            background: #ffffff;
            color: #000000;
        }
        .btn.btn-white-outline{
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }
        .btn.btn-black-outline{
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }

        h1,h2,h3,h4,h5,h6{
            font-family: 'Rubik', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }

        body{
            font-family: 'Rubik', 'sans-serif';
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            //color: rgba(0,0,0,.4);
        }

        a{
            color: #A5A815;
        }

        table{
        }
        /*LOGO*/

        .logo {
            height: 35px;
            width: 35px;
            margin: 0;
        }
        .logo svg {
            height: 100%;
            width: 100%;
        }

        /*HERO*/
        .hero{
            position: relative;
            z-index: 0;
        }

        .hero .text{
            color: rgba(0,0,0,.3);
        }
        .hero .text h2{
            color: #A5A815;
            font-size: 40px;
            margin-bottom: 0;
            font-weight: 400;
            line-height: 1.4;
        }
        .hero .text h3{
            font-size: 24px;
            font-weight: 300;
        }
        .hero .text h2 span{
            font-weight: 600;
            color: #A5A815;
        }

        .text-gray {
            color: rgba(0,0,0,.4);
        }

        .table-responsive table {
            width: 100%;
            margin: 30px 10px!important;
        }

        .table-responsive table thead td {
            color: rgba(0,0,0,.4);
            padding-bottom: 12px;
        }

        .table-responsive table tbody td {
            color: #191a29;
            padding-bottom: 12px;
            width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .table-responsive table tbody tr {
           padding-bottom: 12px;
        }

        .table-responsive table tbody a {
            color: #191a29;
            padding-bottom: 12px;
        }

        .table-responsive table tbody a:hover {
           text-decoration: underline;
        }


        /*HEADING SECTION*/
        .heading-section{
        }
        .heading-section h2{
            color: #000000;
            font-size: 28px;
            margin-top: 0;
            line-height: 1.4;
            font-weight: 400;
        }
        .heading-section .subheading{
            margin-bottom: 20px !important;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(0,0,0,.4);
            position: relative;
        }
        .heading-section .subheading::after{
            position: absolute;
            left: 0;
            right: 0;
            bottom: -10px;
            content: '';
            width: 100%;
            height: 2px;
            background: #30e3ca;
            margin: 0 auto;
        }

        .heading-section-white{
            color: rgba(255,255,255,.8);
        }

        .heading-section-white h2{
            color: #ffffff;
        }
        .heading-section-white .subheading{
            margin-bottom: 0;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,.4);
        }


        ul.social{
            padding: 0;
        }
        ul.social li{
            display: inline-block;
            margin-right: 10px;
        }

        /*FOOTER*/

        .footer{
            border-top: 1px solid rgba(0,0,0,.05);
            background: #191a29;
        }
        .footer .heading{
            color: #FFF;
            text-align: center;
            font-size: 20px;
        }
        .footer ul{
            margin: 0;
            padding: 0;
        }
        .footer ul li{
            list-style: none;
            margin: 0 auto 8px;
            text-align: center;
            color: #A5A815;
        }
        .footer ul li a{
            color: #A5A815;
        }

        .footer ul li a:hover{
            text-decoration: underline;
        }


        @media screen and (max-width: 768px) {
            .mobile-hide {
                display: none;
            }

        }


    </style>
    <meta name="robots" content="noindex, follow">
    <script nonce="fe789195-c74b-44a6-ba30-f8f3429d8f2e">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{};a.zarazData.executed=[];a.zaraz={deferred:[]};a.zaraz.q=[];a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text);a.zarazData.x=Math.random();a.zarazData.w=a.screen.width;a.zarazData.h=a.screen.height;a.zarazData.j=a.innerHeight;a.zarazData.e=a.innerWidth;a.zarazData.l=a.location.href;a.zarazData.r=e.referrer;a.zarazData.k=a.screen.colorDepth;a.zarazData.n=e.characterSet;a.zarazData.o=(new Date).getTimezoneOffset();a.zarazData.q=[];for(;a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin";z.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData)));t.parentNode.insertBefore(z,t)};["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;   font-weight: 400; font-size: 15px; line-height: 1.8;">
<center style="width: 100%; background-color: #FFF;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 800px; margin: 0 auto;">
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="top" style="padding: 1em 2.5em 0 2.5em; background: #ececec">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td style="margin: 0; text-align: center">
                                <a href="{{ route('store.index') }}">
                                    <img style="height: 50px; width: 50px;" src="{{$message->embed(asset('app/img/unrgo_sm.png'))}}" alt="">
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="middle" style="position: relative; padding: 2em 0 4em 0; z-index: 0; background: #ECECEC">
                    <table>
                        <tr>
                            <td>
                               @yield("content")
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="middle" style="border-top: 1px solid rgba(0,0,0,.05); padding: 0.8em; background: #191a29;">
                    <table>
                        <tr>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: center; padding-left: 10px;">
                                            <h4 style="color: #FFF; text-align: center; font-size: 18px;">Розділи</h4>
                                            <ul style="list-style: none; padding: 0">
                                                <li><a style="color: #A5A815;font-size: 14px;" href="{{ route('articles.index') }}">Блог</a></li>
                                                <li><a style="color: #A5A815;font-size: 14px;" href="{{ route('store.index') }}">Магазин</a></li>
                                                <li><a style="color: #A5A815;font-size: 14px;" href="{{ route('about') }}">Про нас</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" class="mobile-hide" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: center; padding-left: 5px; padding-right: 5px;">
                                            <h4 style="color: #FFF; text-align: center; font-size: 18px;" >Зв'язок</h4>
                                            <ul style="list-style: none; padding: 0">
                                                <li><span style="color: #ffffff; font-size: 14px;">м. Миколаїв, <br> вул. Крилова 19Г <br> +380 95 083 95 81</span></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: center; padding-left: 10px;">
                                            <h4 style="color: #FFF; text-align: center; font-size: 18px;">Соц. мережі</h4>
                                            <ul style="list-style: none; padding: 0; margin: 0">
                                                <li>
                                                    <a style="color: #A5A815; font-size: 16px" href="https://twitter.com/unreal_go">
                                                        <img src="{{$message->embed(asset('app/img/twitter.svg.png'))}}" alt="twitter">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style="color: #A5A815;" href="https://t.me/unrgo">
                                                        <img src="{{$message->embed(asset('app/img/telegram.svg.png'))}}" alt="twitter">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a style="color: #A5A815;" href="https://instagram.com/unrgo">
                                                        <img src="{{$message->embed(asset('app/img/instagram.svg.png'))}}" alt="twitter">
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            @if(isset($needFooter))
                <tr>
                    <td class="bg_light" style="text-align: center;">
                        <p>У вас є можливість <a href="{{ route("email.unsubscribe") }}" style="color: rgba(0,0,0,.8);">відписатись від розсилання</a></p>
                    </td>
                </tr>
            @endif
        </table>
    </div>
</center>

</body>
</html>
