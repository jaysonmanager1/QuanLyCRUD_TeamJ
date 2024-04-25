@extends('dashboard')
<link rel="stylesheet" href="{{ asset('/front-end/register-style.css') }}">
<script src="{{ asset('/js-front/script.js') }}"></script>
@section('content')
    <div class="notifi-success" style="display: none">
        {{ session('Success') }}
    </div>
    <section class="register">
        <div class="card-login">
            <div class="card-body">
                <h1>Màn hình đăng ký</h1>
                <form action="{{ route('user.postUser') }}" method="POST" class="regis-form" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label class="lb-input" for="name">Name</label>
                        <input type="text" id="name" name="name" required autofocus>
                    </div>
                    <div>
                        <label class="lb-input" for="mssv">mssv</label>
                        <input type="text" id="mssv" name="mssv" required autofocus>
                    </div>
                    <div>
                        <label class="lb-input" for="email">Email</label>
                        <input type="text" id="email_address" name="email" required autofocus>
                    </div>
                    <div>
                        <label class="lb-input" for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    {{-- Them cot so thich --}}
                    <div>
                        <label class="lb-input" for="favorities">favorities</label>
                        <input type="text" name="favorities" id="favorities" required>
                    </div>
                    <div>
                        <label class="lb-input" for="photo">Photo</label>
                        <input type="file" name="photo" id="photo" required>
                    </div>
                    <div class="button-">
                        <button type="submit" class="btn-regis">Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>
        const notifiSuccess = document.querySelector('.notifi-success');
        if (notifiSuccess) {
            alert(notifiSuccess.textContent);
        }
    </script>
@endsection
