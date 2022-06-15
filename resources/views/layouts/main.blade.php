<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    
    @yield('css')

</head>

<body>

<div id="main">
    <div class="header p-4">
        <div class="logo"><img src="/images/logo.png"></div>
    </div>
    <div class="conteiner-fluid">
        <div class="row">
            <div class="col-3 left_body">
                @include('front.pages.category')
            </div>
            <div class="col-9 right_body">@yield('content')</div>
        </div>
    </div>
    

</div>
    

    
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    @yield('js')

</body>

</html>
