<div class="col-6 search-people">
    <div class="post-header">
        <div class="col-4">
        </div>
        <div class="col-1">
            <a href="{{ route('user', ['id' => $user->id])}}">
                @if (file_exists('images/profile/' . $user->id . '.png'))
                    <img src="{{ asset('images/profile/' . $user->id . '.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                @else
                    <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                @endif
            </a>
        </div>
        <div class="post-name col-6">
            <a href="{{ route('user', ['id' => $user->id])}}">
                <span id="name-tag" class="name-tag"> {{ '@' . $user->person->username }} </span>
                <span id="person-name" class="person-name"> {{ $user->name }} </span>
            </a>
            <span hidden>{{$user->id}}</span>
        </div>
    </div>
</div>
