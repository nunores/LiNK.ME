@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/infinite_scrolling.js') }}" defer></script>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('partials.sidebar.sidebar', ["page" => "login"])
        <div class="col-8">
            <div id="center-col">
                @foreach ($posts as $post)
                    @include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
                @endforeach
                <svg id="load-more" data-login="{{ Auth::check() && (true || Auth::user()->is_admin) }}" data-page-id="1" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                </svg>
            </div>
        </div>
    </div>
</div>
@endsection
