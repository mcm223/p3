<!doctype html>
<html lang='en'>
<head>
    <title>{{ $title }}</title>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom CSS -->
    <link href='/css/p3_style.css' type='text/css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" href="/images/books-icon.png">
    @stack('head')
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ $url }}">@yield('title','Blind Date with a Book')</a>
        <div id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ $url }}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ $githubUrl }}" target='_blank'>GitHub</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<section>
    @yield('content')
</section>

<section>
    @yield('form')
</section>

<footer>
    &copy; {{ date('Y') }}
</footer>

@stack('body')

</body>
</html>