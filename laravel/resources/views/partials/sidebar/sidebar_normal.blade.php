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
	@include('partials.notifications.notifications', ["notifications" => $notifications])
    @include('partials.full_group_carousel', ["groups" => Auth::user()->user->groups])
	<div>
		<a href="{{ route('about') }}" class="link-light">About</a>
		<span class="link-light"> | </span>
		<a href="{{ route('faq') }}" class="link-light">FAQ</a>
	</div>
</div>
