@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post_page.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/likes.js') }}" defer></script>
<script src="{{ asset('js/commentTextArea.js') }}" defer></script>
<script src="{{ asset('js/comments.js') }}" defer></script>
<script src="{{ asset('js/delete_post.js') }}" defer></script>
@endpush


@section('content')

<body>
    @csrf
	<div class="container-fluid">
		<div class="row">
			@include('partials.sidebar')
			<div class="col-10">
				<div id="center-col">
					@include('partials.post', ['post' => $post])
				</div>
			</div>
		</div>
	</div>
</body>

@endsection
