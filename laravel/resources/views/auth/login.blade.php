@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.sidebar.sidebar', ["page" => "login"])
        <div class="col-8">
            <div id="center-col">
                @php
                use App\Models\Post;
                    $posts = Post::all()->where('id', '>', '0')->where('id', '<', '10');
                @endphp
                @foreach ($posts as $post)
                    @include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
