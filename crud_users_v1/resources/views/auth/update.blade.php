@extends('dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content_update')
    <main class="update-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h3 class="card-header text-center bg-white">Update User</h3>
                        <div class="card-body">
                            <form action="{{ route('user.postUpdateUser') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <input name="id" type="hidden" value="{{ $user->id }}">
                                    <label for="#">Name</label>
                                    <input value="{{ $user->name }}" type="text" placeholder="Name" id="name"
                                        class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="#">Email</label>
                                    <input value="{{ $user->email }}" type="text" placeholder="Email" id="email_address"
                                        class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="#">MSSV</label>
                                    <input value="{{ $user->mssv }}" type="text" placeholder="Mssv" id="mssv"
                                        class="form-control" name="mssv" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <label for="#">Password</label>
                                    <input type="password" placeholder="Đổi lại mật khẩu" id="password"
                                        class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                {{-- !!Them favorities!! --}}
                                <div class="form-group mb-3">
                                    <label for="#">favorities</label>
                                    <input value="{!! $user->favorities !!}" type="text" placeholder="So thich"
                                        id="favorities" class="form-control" name="favorities" required autofocus>
                                </div>
                                {{-- !!!! --}}
                                <div class="form-group mb-3">
                                    <label for="photo" class="mt-3">Chọn ảnh mới</label>
                                    <input type="file" id="photo" class="form-control" name="photo" required>
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
