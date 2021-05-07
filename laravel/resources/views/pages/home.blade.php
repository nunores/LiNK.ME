@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/likes.js') }}" defer></script>
<script src="{{ asset('js/commentTextArea.js') }}" defer></script>
<script src="{{ asset('js/comments.js') }}" defer></script>
<script src="{{ asset('js/delete_post.js') }}" defer></script>
<script src="{{ asset('js/delete_comment.js') }}" defer></script>
@endpush

@section('content')

<div class="container-fluid">
    @csrf
    <div class="row">
        @include('partials.sidebar')
        <div class="col-8">
            <div id="center-col">
                @php
                use App\Models\Post;
                    $posts = Post::all()->where('id', '>', '173')->where('id', '<', '185')->where('banned', '=', false);
                @endphp
                @foreach ($posts as $post)
                    @include('partials.homePost', ['post' => $post])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
