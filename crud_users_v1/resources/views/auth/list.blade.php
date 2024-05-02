<title>List</title>
@extends('dashboard')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@section('content')
    <main class="login-form">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th>{{ $user->id }}</th>
                                <th>{{ $user->name }}</th>
                                <th>{{ $user->mssv }}</th>
                                <th>
                                    <img class="border border-primary" src="{{ asset('storage/imgs/' . $user->photo) }}"
                                        alt="Avatar" width="100" height="100">
                                </th>
                                <th>{{ $user->email }}</th>
                                <th>
                                    {!! $user->favorities !!}
                                    {{-- {!! $find->favorities !!} --}}
                                </th>
                                <th>
                                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                                    <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                                    <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
