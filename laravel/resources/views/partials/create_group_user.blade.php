<div class="col-5 search-people">
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
                <span id="name-tag"> {{ '@' . $user->person->username }} </span>
                <span id="person-name"> {{ $user->name }} </span>
            </a>
            <span hidden>{{$user->id}}</span>
        </div>
    </div>
</div>
<div class="col-1 checkbox">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
    </div>
</div>
