@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/create_group.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/create_group.js') }}" defer></script>
<script src="{{ asset('js/search_group.js') }}" defer></script>
@endpush

@section('content')
<body>

	<div class="container-fluid">
		<div class="row">
			@include('partials.sidebar.sidebar', ["page" => "create_group"])
			<div class="col-8">
				<div id="center-col">
					<h2>Choose the name of your group</h2>
					<div class="input-group mb-3">
						<input type="text" class="form-control" id="name-input-group" placeholder="Group name" aria-label="Group name" aria-describedby="basic-addon2" maxlength="15">
						<button type="button" id="create-button-final" class="btn btn-dark">Create</button>
					</div>
					<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
						<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
							<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
						</symbol>
					</svg>
					<div class="alert alert-danger d-flex align-items-center alert-empty-group-name" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						<div>
							Group name cannot be empty!
						</div>
					</div>
				</div>
				<div id="center-col-friends">
					<h2>Choose the friends you want in your group</h2>

					<div id="search-friends-group">
						<form class="d-flex" id="search_group">
							<input class="form-control" id="search-group" type="search" placeholder="Search" aria-label="Search">
							<div id="search-icon-phone">
								<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
									<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
								</svg>
							</div>
						</form>
					</div>

					<!-- People list -->

                    @for ($i = 0; $i < $users->count(); $i++)
                        @if ($i % 2 == 0)
					        <div class="row people-row">
                        @endif
                            @include('partials.create_group_user', ['user' => $users[$i]])
                        @if ($i % 2 == 1)
                            </div>
                        @endif
                    @endfor
				</div>
			</div>
        </div>
    </div>
</body>

@endsection

