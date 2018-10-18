<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>mini CRM</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .flex-top-center{
                text-align: center;
            }
            .content {

            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 10px;
            }

            .text-center{
                text-align: center;
            }
            .subtitle h3{
                font-size: 23px;
                font-weight: normal;
                text-align: center;
                width: 720px;
                margin: 0 auto;
                padding-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    @if (Route::has('login'))
                        <div class="flex-top-center links">
                            @auth
                                <a href="{{ url('/companies') }}">Home</a>
                            @else
                                <a href="{{ route('login') }}">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                        Adminpanel to manage companies
                </div>
                <div class="text-center subtitle">
                    <h3>Basically, project to manage companies and their employees. Mini-CRM.</h3>
                    login: admin@admin.com<br>
                    pass: password
                </div>
            </div>
        </div>
    </body>
</html>
