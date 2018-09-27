

        <!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    </head>
    <body>


<center>   <div class="col-md-4" style="margin-top: 1.5%">
        <div class="card mb-4 border-dark">
            <img class="card-img-top" src="{{ asset('images/every.svg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title" style="text-align: center">Gerenciamento de Propostas Comerciais</h5>
                <hr>
                @if (Route::has('login'))
                    <button class="btn btn-outline-primary">
                        @auth
                            <a href="{{ route('admin.home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Entrar</a>
                        @endauth
                        </button></div>
            @endif
            </div>
        </div></center>




    </body>
</html>


