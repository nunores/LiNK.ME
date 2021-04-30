@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post_page.css') }}" />
@endpush


@section('content')

<body>
	<div class="container-fluid">
		<div class="row">
			@include('partials.sidebar')
			<div class="col-10">
				<div id="center-col">
					@include('partials.post')
				</div>
			</div>
		</div>
	</div>
</body>

@endsection
