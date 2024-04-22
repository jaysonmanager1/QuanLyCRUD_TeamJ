@extends('dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content_update')
    <main class="update-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center">Update User</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUpdateUser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input value="{{ $user->id }}" type="text" placeholder="ID" id="id">
                                </div>
                                <div class="form-group mb-3">
                                    <input value="{{ $user->name }}" type="text" placeholder="Name" id="name"
                                        class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input value="{{ $user->email }}" type="text" placeholder="Email" id="email_address"
                                        class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="Password" id="password" class="form-control"
                                        name="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <p>Ảnh cũ</p>
                                    <img src="{{ asset('/storage/imgs/' . $user->photo) }}" alt="Ảnh cũ" width="50"
                                        height="50">
                                    <br>
                                    <label for="photo" class="mt-3">Chọn ảnh mới</label>
                                    <input type="file" id="photo" class="form-control" name="photo" required>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" name="remember"> Remember Me</label>
                                    </div>
                                </div>
                                <div class="d-grid mx-auto">
                                    <button type="submit" class="btn btn-dark btn-block">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
