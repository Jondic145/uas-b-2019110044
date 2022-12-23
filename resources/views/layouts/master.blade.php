<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'MeFood') | MeFood</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    @stack('css_after')
</head>

<body>
    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark bg-secondary"">
        <a class="navbar-brand" href="#">Shopping</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{ route('main.index') }}">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}">Items List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('order.index') }}">Order List</a>
              </li>
            </ul>
          </div>
    </nav>
    {{-- Content --}}
    <div class="col p-4"> @yield('content') </div>
    {{-- Content END --}}
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js_after')
</body>

</html>
