@extends('dashboard')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

@section('content')
    <main class="login-form">
        <h1>Chi tiết user {{ $user->name }}</h1>
        <div class="container">
            <div class="row justify-content-center">
                <table class="table border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>MSSV</th>
                            <th>IMG</th>
                            <th>Email</th>
                            <th>Favorities</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->mssv }}</td>
                            <td><img class="border border-primary" src="{{ asset('storage/imgs/' . $user->photo) }}" alt="..." width="50"
                                    height="50"></td>
                            <td>{{ $user->email }}</td>
                            <th>{!! $user->favorities !!}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
