@extends('dashboard')

@section('content')
    <link rel="stylesheet" href="{{ asset('/front-end/register-style.css') }}">
    <section>
        <div class="card-login">
            <div class="card-body">
                <h1>Màn hình đăng ký</h1>
                <form action="{{-- route('user.postUser') --}}" method="POST" class="regis-form">
                    @csrf
                    <div>
                        <label class="lb-input" for="name">Name</label>
                        <input type="text" id="name" name="name" required autofocus>
                    </div>
                    <div>
                        <label class="lb-input" for="email">Email</label>
                        <input type="text" id="email_address" name="email" required autofocus>
                    </div>
                    <div>
                        <label class="lb-input" for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div>
                        <div class="checkbox">
                            <input type="checkbox" name="remember"><span>Nhớ tôi</span>
                        </div>
                    </div>
                    <div class="button-">
                        <button type="submit" class="btn-regis">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
