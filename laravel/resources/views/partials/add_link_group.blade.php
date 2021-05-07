<div class="post-header person-friends-header">
    <div class="col-1">
        <a href="{{ route('user', ["id" => $user->id]) }}">
            <img src="./images/jlopes.png" class="rounded-circle person-friends-profile-pic" alt="Profile picture">
        </a>
    </div>
    <div class="post-name col-6">
        <a href="{{ route('user', ["id" => $user->id]) }}">
            <span id="name-tag" class="person-friends-name-tag"> @{{ $user->person->username }} </span>
        </a>
    </div>
    <div class="add-person">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16" color="#1AB2A8">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </div>
</div>
