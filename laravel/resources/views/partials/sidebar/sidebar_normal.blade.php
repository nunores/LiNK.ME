<div class="col-2 text-center collapse" id="left-col">
	<a href="{{ route('user', ['id' => Auth::user()->id]) }}">
        @if (file_exists('images/profile/' . Auth::user()->id . '.png'))
            <img src="{{ asset('images/profile/' . Auth::user()->id . '.png') }}" class="rounded-circle profile-picture" alt="Profile picture">
        @else
            <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle profile-picture" alt="Profile picture">
        @endif
		<h2>{{ Auth::user()->user->name }}</h2>
	</a>
	<div class="feed-change">
		<div id="feed-type">
			@if ($page != 'group')
				<div class="form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="feedType" id="feedTypeGeneral">
						General
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="feedType" id="feedTypeFriends" checked>
						Friends
					</label>
				</div>
			@endif
		</div>
	</div>
	@include('partials.notifications.notifications')
	<div id="groups">
        @php
            $groups = Auth::user()->user->groups;
        @endphp
        @if (count($groups) > 0)
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @for ($i = 0; $i < count($groups); $i++)
                        @if ($i % 2 == 0)
                            @if ($i == 0)
                                <div class="carousel-item active">
                            @else
                                <div class="carousel-item">
                            @endif
                        @endif
                        @include('partials.group_carousel', ['group' => $groups[$i]])
                        @if ($i % 2 == 1)
                            </div>
                        @endif
                    @endfor
                    @if (count($groups) % 2 == 1)
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="false"></span>
                    <span class="visually-hidden">Next</span>
            </div>
        @endif
		<a href="{{ route('create_group') }}" type="button" id="create-group-button" class="btn btn-dark">Create Group</a>
	</div>
	<div>
		<a href="{{ route('about') }}" class="link-light">About</a>
		<span class="link-light"> | </span>
		<a href="{{ route('faq') }}" class="link-light">FAQ</a>
	</div>
</div>
