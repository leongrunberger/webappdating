<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    

        <title>Willkommen bei Flankr!</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        

        <!-- Styles -->
        <style>
            html, body {
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-color: $grey-20;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

        </style>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="container">                
                <div class="row justify-content-center">
                    <img src="flankr-logo.svg" class="flankr-logo-start" alt="logo"/>     
                </div>           

                @guest

                    <div class="row justify-content-center">
                        <h1>Willkommen bei Flankr!</h1>
                    </div>

                    <div class="row justify-content-center">
                        <p>Flankr ist die beste Dating-App auf dem Markt.</p>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <a class="btn btn-light flankr-button" href="/login">Login</a>
                        <a class="btn btn-light flankr-button ml-3" href="/register">Registrieren</a>
                    </div>

                @else

                    <div class="row justify-content-center">

                    <!--- Willkommen zurück mit Username wäre natürlich nice. ---->

                    <h1>Willkommen zurück, {{ Auth::user()->name }}!</h1>
                    </div>

                    <div class="row justify-content-center">
                        <p>Singles in deiner Umgebung warten auf dich.</p>
                    </div>

                    <div class="row justify-content-center mt-5">
                        <a class="btn btn-light flankr-button" href="/start">Start</a>
                        <a class="btn btn-light flankr-button ml-3" href="/profile">Dein Profil</a>
                    </div>

                @endguest

            </div>




            <!-- PK killed vue

                <div id="app">
                    <app />
                </div>
                <script type="text/javascript" src="js/app.js"></script>

            -->

        </div>
    </body>
</html>
