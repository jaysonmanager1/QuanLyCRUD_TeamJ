<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('/front-end/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="nav-bar">
        <div class="container">
            <div class="menu">
                <ul>
                    <li>
                        <a href="#">HOME | </a>
                    </li>
                    @guest
                        <li>
                            <a href="{{ route('login') }}">Đăng Nhập | </a>
                        </li>
                        <li>
                            <a href="{{ route('user.registration') }}">Đăng Ký </a>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('signout') }}"> | Đăng Xuất</a>
                        </li>
                    @endguest
                </ul>
                <form class="d-flex" method="GET">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="content-yield">
        @yield('content')
        @yield('content_update')
    </div>

    <footer>
        <h5 class="text">Lập trình web be2 by team J</h5>
    </footer>

</body>

</html>
