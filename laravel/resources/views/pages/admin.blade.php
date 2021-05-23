@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/delete_post.js') }}" defer></script>
<script src="{{ asset('js/delete_comment.js') }}" defer></script>
@endpush

@section('content')

<div class="container-fluid">
    @csrf
    <div class="row">
        @include('partials.sidebar.sidebar', ["page" => "admin", "reports" => $reports])
        <div class="col-8">
            <div id="center-col">
                @foreach ($posts as $post)
                    @include('partials.post', ["post" => $post, "comments" => $post->comments->take(2)])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
