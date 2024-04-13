@extends('dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <main class="login-form">
        <h1>Chi tiết user {{ $user->name }}</h1>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>MSSV</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->mssv}}</td>
                            <td>{{$user->email}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
