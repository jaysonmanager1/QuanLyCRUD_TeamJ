@extends('dashboard')
<link rel="stylesheet" href="/front-end/article-style.css">
@section('content_list_favorite')
    <div class="box-favorite">
        <div class="chua-danh-sach">
            @foreach ($favorities as $favoritie)
                <div class="id-favorite">{{ $favoritie->favorite_id }}</div>
                <div class="name-favorite">Admin</div>
                <div class="description-favorite">thich du thu tren doi nhu la thihc em ne</div>
            @endforeach
        </div>
    </div>
@endsection
