@extends('dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('/front-end/login-style.css') }}">
    <section class="login-form">
        <div class="card-login">
            <div class="card-title">
                <h1>Màn hình đăng nhập</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('user.authUser') }}">
                    <div class="input">
                        @csrf
                        <div class="email-login">
                            <label for="email">Email</label>
                            <input type="text" id="email" name="email" required autofocus class="user">
                            {{-- --}}
                        </div>
                        <div class="password-login">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" class="pass" required>
                            {{-- --}}
                        </div>
                    </div>

                    <input type="checkbox"><span>Ghi nhớ đăng nhập</span>
            </div>
            <div class="card-end">
                <a href="#">Quên mật khẩu?</a>
                <div>
                    <button type="submit" class="btn-login">Đăng nhập</button>
                </div>
            </div>
            </form>
        </div>
    </section>
@endsection
