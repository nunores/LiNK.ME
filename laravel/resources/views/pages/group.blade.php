@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/group_page.css') }}" />
<link rel="stylesheet" href="{{ asset('css/add_post.css') }}" />
@if (Auth::user()->is_admin)
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endif
@endpush

@push('js_scripts')
@if (!Auth::user()->is_admin)
    <script src="{{ asset('js/likes.js') }}" defer></script>
    <script src="{{ asset('js/commentTextArea.js') }}" defer></script>
    <script src="{{ asset('js/comments.js') }}" defer></script>
    <script src="{{ asset('js/group_request.js') }}" defer></script>
    <script src="{{ asset('js/add_post.js') }}" defer></script>
    <script src="{{ asset('js/friends_search.js') }}" defer></script>
@endif
<script src="{{ asset('js/delete_post.js') }}" defer></script>
<script src="{{ asset('js/delete_comment.js') }}" defer></script>
@endpush

@section('content')

<body>
    @csrf
	<div class="container-fluid">
		<div class="row">
            @if (Auth::user()->is_admin)
			    @include('partials.sidebar.sidebar', ["page" => "admin"])
            @else
			    @include('partials.sidebar.sidebar', ["page" => "group"])
            @endif
            <div class="col-8">
                <div id="center-col">
                    <div class="group-name" data-group-id="{{ $group->id }}">
                        <p>{{ $group->name }}</p>
                    </div>
					@foreach ($posts as $post)
						@include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
					@endforeach
				</div>
			</div>

            @if (!Auth::user()->is_admin)
            <div id="add-friends-group" class="col-2" data-group-id="{{ $group->id }}">
                <form id="add-search" class="d-flex">
                    <input class="form-control search" type="search" placeholder="Search" aria-label="Search">
                    <input type="hidden" id="authenticated-user" data-user-id="{{ Auth::user()->id }}">
                    <div id="search-icon-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </form>
                <div class="person-friends">
                    @foreach ($links as $link)
                        @include('partials.add_link_group', ["user" => $link])
                    @endforeach
                </div>
            </div>
            @endif
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
