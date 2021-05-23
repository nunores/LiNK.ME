@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/profile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/add_post.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/likes.js') }}" defer></script>
<script src="{{ asset('js/delete_post.js') }}" defer></script>
<script src="{{ asset('js/delete_comment.js') }}" defer></script>
<script src="{{ asset('js/comments.js') }}" defer></script>
<script src="{{ asset('js/commentTextArea.js') }}" defer></script>
<script src="{{ asset('js/friend_request.js') }}" defer></script>
<script src="{{ asset('js/change_name.js') }}" defer></script>
<script src="{{ asset('js/add_post_profile.js') }}" defer></script>
@endpush



@section('content')

@php
    $checker = (Auth::user()->user == $user ? true : false)
@endphp
<body>
    @csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 text-center collapse" id="left-col"><!--
                <div class="feed-change">
                    <div id="feed-order">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRelevance">
                                Relevance
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRecent" checked>
                                Recent
                            </label>
                        </div>
                    </div>
                </div> -->
                @if ($checker)
                    @include('partials.notifications.notifications')
                @endif
                <div class="person-friends">
                    @php
                        $links = $user->links;
                        @endphp
                    @for ($i = 0; $i < count($links) && $i < 300; $i++)
                    @include('partials.friend', ['user' => $links[$i] ])
                    @endfor
                </div>
                <div id="groups">
                    @if ($checker)
                        @include('partials.full_group_carousel')
                    @endif
                    <div>
                        <a href="{{ route('about') }}" class="link-light">About</a>
                        <span class="link-light"> | </span>
                        <a href="{{ route('faq') }}" class="link-light">FAQ</a>
                    </div>
                    @if($checker)
                        <div>
                            <a href="#" class="link-danger">Delete account</a>
                        </div>
                    @endif
                </div>
        @if (!$checker)
            </div>
        @endif
            <div class="col-8">
                <div id="center-col">
                    @include('partials.user_info', ['user' => $user, 'checker' => $checker])
                    @php
                        $posts = $user->posts->where('banned', '=', false);
                    @endphp
                    @foreach ($posts->reverse() as $post)
                            @include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @if (!Auth::user()->is_admin)
	<div id="add-post-icon" class="add-post-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
	</div>
	<div hidden id="return-icon" class="add-post-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
        </svg>
	</div>
    @endif
</body>

@endsection
