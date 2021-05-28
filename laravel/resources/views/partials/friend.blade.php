<div class="post-header person-friends-header">
    <div class="col-1">
        <a href="{{ route('user', ['id' => $user->id])}}">
            @if (file_exists('images/profile/' . $user->id . '.png'))
                <img src="{{ asset('images/profile/' . $user->id . '.png') }}" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
            @else
                <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
            @endif
        </a>
    </div>
    <div class="post-name col-6">
        <a href="{{ route('user', ["id" => $user->id]) }}">
            <span id="name-tag-{{ $user->id }}" class="person-friends-name-tag"> {{'@' . $user->person->username}} </span>
        </a>
    </div>
</div>
