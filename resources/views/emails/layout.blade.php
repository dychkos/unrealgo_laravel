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
            font-family: 'Rubik', sans-serif;
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
            //color: rgba(0,0,0,.3);
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
            font-family:
            line-height: 1;
            padding-bottom: 0;
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
<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f1f1f1;">
<center style="width: 100%; background-color: #f1f1f1;">
    <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
        &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
    </div>
    <div style="max-width: 600px; margin: 0 auto;" class="email-container">

        <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
            <tr>
                <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                    <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td class="logo" style="text-align: center;">
                                <a href="{{ route('home') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 684.65 668.08"><defs><style>.cls-1{fill:#191a29;}</style></defs><g data-name="Слой 5"><path class="cls-1" d="M498.5,841.5c69-40,123-96,174-159A485.21,485.21,0,0,1,534,585a480.64,480.64,0,0,1-98.5-144.5A799,799,0,0,1,388,180l-76,16a610.27,610.27,0,0,0,55,275A486.43,486.43,0,0,0,558.9,700.93l-61.9,49c-46-38.07-116-97.41-174.52-209.41C255.33,411.88,243,286.13,239,222.19L161.35,255a740.61,740.61,0,0,0,77.26,295.33,797.31,797.31,0,0,0,129,180A806.59,806.59,0,0,0,498.5,841.5Z" transform="translate(-161.35 -173.42)"/></g><g id="Слой_8" data-name="Слой 8"><path class="cls-1" d="M463,174" transform="translate(-161.35 -173.42)"/><path class="cls-1" d="M831,324c4.26-20.79,14.9-64,15-65-45.37-22.22-113.79-52.54-190.33-68.67A788.36,788.36,0,0,0,463,174a436.32,436.32,0,0,0,78.09,306,455.84,455.84,0,0,0,179,139.44,480.51,480.51,0,0,0,32.24-51.11A498.84,498.84,0,0,0,779,511.67a373.18,373.18,0,0,0,34.67-100l-48.95-24.11-40.39-19.89a343.85,343.85,0,0,0-92-30c9.56,16.22,57.82,90.43,63.34,96L725,447l-36,75c-15.79-9.64-32.3-24.58-52-44a282.69,282.69,0,0,1-41-51c-17-22-28.11-50.89-38.41-82.9-11.22-34.83-13.74-75-17.59-102.1,55,2,99.36,16.23,146,29l79,27Z" transform="translate(-161.35 -173.42)"/></g></svg>
                                </a>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                    <img src="images/email.png" alt="" style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                </td>
            </tr>
            <tr>
                <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
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
                <td valign="middle" class="bg_light footer email-section">
                    <table>
                        <tr>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: left; padding-left: 10px;">
                                            <h3 class="heading">Розділи</h3>
                                            <ul>
                                                <li><a href="{{ route('articles.index') }}">Блог</a></li>
                                                <li><a href="{{ route('store.index') }}">Магазин</a></li>
                                                <li><a href="{{ route('about') }}">Про нас</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" class="mobile-hide" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                            <h3 class="heading">Зв'язок</h3>
                                            <ul>
                                                <li><span class="text">м. Миколаїв, вул. Крилова 19Г</span></li>
                                                <li><span class="text">+380 95 083 95 81</span></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign="top" width="33.333%" style="padding-top: 20px;">
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                    <tr>
                                        <td style="text-align: left; padding-left: 10px;">
                                            <h3 class="heading">Соц. мережі</h3>
                                            <ul>
                                                <li>
                                                    <a href="https://twitter.com/unreal_go">
                                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.0589 0 0 8.0589 0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0ZM17.4987 15.2535L17.4609 14.6306C17.3476 13.0163 18.3422 11.5418 19.9161 10.9699C20.4953 10.7665 21.4773 10.741 22.1194 10.919C22.3712 10.9953 22.8497 11.2495 23.1896 11.4783L23.8066 11.8978L24.4865 11.6817C24.8642 11.5672 25.3678 11.3766 25.5944 11.2495C25.8085 11.1351 25.9973 11.0715 25.9973 11.1097C25.9973 11.3257 25.5315 12.063 25.1412 12.4697C24.6124 13.0418 24.7635 13.0926 25.8337 12.7112C26.4758 12.4951 26.4884 12.4952 26.3625 12.7367C26.2869 12.8638 25.8966 13.3087 25.4811 13.7154C24.776 14.4146 24.7383 14.4908 24.7383 15.0755C24.7383 15.978 24.3102 17.8592 23.8821 18.8888C23.0889 20.8209 21.3892 22.8165 19.6894 23.8207C17.2972 25.2317 14.1118 25.5875 11.43 24.7613C10.5361 24.4816 9 23.7698 9 23.6428C9 23.6046 9.46583 23.5537 10.0324 23.5411C11.216 23.5156 12.3995 23.1851 13.4067 22.6004L14.0866 22.1937L13.306 21.9268C12.198 21.5454 11.2034 20.6684 10.9516 19.8421C10.876 19.5752 10.9012 19.5625 11.6063 19.5625L12.3365 19.5498L11.7196 19.2575C10.9893 18.8888 10.322 18.2659 9.99465 17.6304C9.7554 17.1728 9.4533 16.0161 9.54142 15.9272C9.56655 15.8891 9.831 15.9653 10.1332 16.0669C11.0019 16.3847 11.1152 16.3085 10.6116 15.7746C9.66727 14.8086 9.3777 13.3722 9.831 12.0121L10.045 11.402L10.876 12.2282C12.5758 13.8934 14.5777 14.8849 16.8692 15.1772L17.4987 15.2535Z" fill="#A5A815"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://t.me/unrgo">
                                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0C8.0589 0 0 8.0589 0 18ZM14.7 26.25L15.0062 21.6617L15.006 21.6615L23.3527 14.1293C23.719 13.8041 23.2727 13.6456 22.7864 13.9405L12.4855 20.4392L8.03603 19.0505C7.07512 18.7563 7.06823 18.096 8.25173 17.6213L25.5902 10.9357C26.3822 10.5761 27.1465 11.1259 26.8441 12.3379L23.8914 26.2523C23.6852 27.2411 23.0878 27.4776 22.26 27.0209L17.762 23.6977L15.6 25.8C15.5932 25.8066 15.5864 25.8132 15.5797 25.8198C15.3379 26.0552 15.1378 26.25 14.7 26.25Z" fill="#A5A815"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="https://instagram.com/unrgo">
                                                        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0C8.0589 0 0 8.0589 0 18C0 27.9411 8.0589 36 18 36C27.9411 36 36 27.9411 36 18C36 8.0589 27.9411 0 18 0ZM14.0425 8.45798C15.0665 8.4114 15.3937 8.4 18.0009 8.4H17.9979C20.6059 8.4 20.9319 8.4114 21.9559 8.45798C22.978 8.50478 23.6759 8.66663 24.288 8.904C24.9199 9.14902 25.454 9.477 25.9879 10.011C26.522 10.5446 26.85 11.0802 27.096 11.7116C27.332 12.3221 27.494 13.0196 27.542 14.0417C27.588 15.0657 27.6 15.3928 27.6 18.0001C27.6 20.6073 27.588 20.9337 27.542 21.9578C27.494 22.9793 27.332 23.6771 27.096 24.2878C26.85 24.919 26.522 25.4546 25.9879 25.9882C25.4545 26.5222 24.9198 26.851 24.2886 27.0962C23.6777 27.3336 22.9793 27.4954 21.9574 27.5422C20.9333 27.5888 20.6071 27.6002 17.9997 27.6002C15.3927 27.6002 15.0657 27.5888 14.0417 27.5422C13.0198 27.4954 12.3221 27.3336 11.7113 27.0962C11.0802 26.851 10.5446 26.5222 10.0112 25.9882C9.47738 25.4546 9.1494 24.919 8.904 24.2875C8.66677 23.6771 8.505 22.9795 8.45798 21.9575C8.41162 20.9335 8.4 20.6073 8.4 18.0001C8.4 15.3928 8.412 15.0655 8.45782 14.0414C8.5038 13.0199 8.6658 12.3221 8.90378 11.7114C9.14978 11.0802 9.47783 10.5446 10.0118 10.011C10.5455 9.47722 11.081 9.14917 11.7125 8.904C12.3229 8.66663 13.0205 8.50478 14.0425 8.45798Z" fill="#A5A815"/>
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.1398 10.13C17.3069 10.1298 17.4869 10.1299 17.681 10.1299L18.001 10.13C20.5642 10.13 20.868 10.1392 21.8802 10.1852C22.8162 10.228 23.3242 10.3844 23.6626 10.5158C24.1106 10.6898 24.43 10.8979 24.7658 11.2339C25.1018 11.5699 25.3098 11.8899 25.4843 12.3379C25.6157 12.6759 25.7723 13.1839 25.8149 14.1199C25.8608 15.1319 25.8708 15.4359 25.8708 17.9979C25.8708 20.56 25.8608 20.8639 25.8149 21.876C25.772 22.812 25.6157 23.32 25.4843 23.658C25.3103 24.106 25.1018 24.425 24.7658 24.7608C24.4298 25.0968 24.1108 25.3048 23.6626 25.4788C23.3246 25.6108 22.8162 25.7668 21.8802 25.8096C20.8682 25.8556 20.5642 25.8656 18.001 25.8656C15.4376 25.8656 15.1337 25.8556 14.1217 25.8096C13.1857 25.7664 12.6777 25.61 12.3391 25.4786C11.8911 25.3046 11.5711 25.0966 11.2351 24.7606C10.8991 24.4246 10.6911 24.1054 10.5167 23.6572C10.3853 23.3192 10.2287 22.8112 10.1861 21.8752C10.1401 20.8632 10.1309 20.5591 10.1309 17.9955C10.1309 15.4319 10.1401 15.1295 10.1861 14.1175C10.2289 13.1815 10.3853 12.6735 10.5167 12.3351C10.6907 11.887 10.8991 11.5671 11.2351 11.2311C11.5711 10.8951 11.8911 10.687 12.3391 10.5127C12.6775 10.3807 13.1857 10.2247 14.1217 10.1816C15.0073 10.1416 15.3506 10.1296 17.1398 10.1276V10.13ZM23.1254 11.7241C22.4894 11.7241 21.9734 12.2395 21.9734 12.8757C21.9734 13.5117 22.4894 14.0277 23.1254 14.0277C23.7614 14.0277 24.2774 13.5117 24.2774 12.8757C24.2774 12.2397 23.7614 11.7237 23.1254 11.7237V11.7241ZM13.0709 18.0001C13.0709 15.2776 15.2782 13.0702 18.0008 13.0701C20.7234 13.0701 22.9302 15.2775 22.9302 18.0001C22.9302 20.7228 20.7236 22.9292 18.001 22.9292C15.2783 22.9292 13.0709 20.7228 13.0709 18.0001Z" fill="#A5A815"/>
                                                            <path d="M18.0009 14.8C19.7682 14.8 21.201 16.2327 21.201 18.0001C21.201 19.7673 19.7682 21.2001 18.0009 21.2001C16.2336 21.2001 14.8009 19.7673 14.8009 18.0001C14.8009 16.2327 16.2336 14.8 18.0009 14.8Z" fill="#A5A815"/>
                                                        </svg>
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
            <tr>
                <td class="bg_light" style="text-align: center;">
                    <p>У вас є можливість <a href="{{ route("email.unsubscribe") }}" style="color: rgba(0,0,0,.8);">відписатись від розсилання</a></p>
                </td>
            </tr>
        </table>
    </div>
</center>

</body>
</html>
