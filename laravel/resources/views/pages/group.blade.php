@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/group_page.css') }}" />
@endpush


@section('content')

<body>
	<div class="container-fluid">
		<div class="row">
			@include('partials.sidebar')
            <div class="col-8">
                <div id="center-col">
					@foreach ($group->posts as $post)
						@include('partials.homePost', ['post' => $post])
					@endforeach
				</div>
			</div>

            <div class="col-2 group-name">
                <p>{{ $group->name }}</p>
                <form id="add-search" class="d-flex">
                    <input class="form-control" id="search" type="search" placeholder="Search" aria-label="Search">
                    <div id="search-icon-phone">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </form>
                <div class="person-friends">
                    {{Auth::user()->links}}
                </div>
            </div>

        </div>
    </div>
		</div>
	</div>

</body>

@endsection
