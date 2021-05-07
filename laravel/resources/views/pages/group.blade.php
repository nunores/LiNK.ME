@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/group_page.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/likes.js') }}" defer></script>
<script src="{{ asset('js/delete_post.js') }}" defer></script>
<script src="{{ asset('js/delete_comment.js') }}" defer></script>
<script src="{{ asset('js/comments.js') }}" defer></script>
<script src="{{ asset('js/commentTextArea.js') }}" defer></script>
<script src="{{ asset('js/group_request.js') }}" defer></script>
@endpush

@section('content')

<body>
    @csrf
	<div class="container-fluid">
		<div class="row">
			@include('partials.sidebar')
            <div class="col-8">
                <div id="center-col">
					@foreach ($posts as $post)
						@include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
					@endforeach
				</div>
			</div>

            <div id="group-name" class="col-2 group-name" data-group-id="{{ $group->id }}">
                <p>{{ $group->name }}</p>
                <form id="add-search" class="d-flex">
                    <input class="form-control search" type="search" placeholder="Search" aria-label="Search">
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

        </div>
    </div>
		</div>
	</div>

</body>

@endsection
