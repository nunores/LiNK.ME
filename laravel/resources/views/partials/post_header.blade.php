
<div class="col-6 search-people" data-id={{ $post->id }}>
    <div class="post-header">
        <div class="col-4">
        </div>
        <div class="col-1">
            <a href="{{ route('user', ['id' => $post->user->id])}}">
                @if (file_exists('images/profile/' . $post->user->id . '.png'))
                    <img src="{{ asset('images/profile/' . $post->user->id . '.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                @else
                    <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                @endif
            </a>
        </div>
        <div class="post-name col-6">
            <a href="{{ route('post', ['id' => $post->id]) }}">
                <span id="name-tag"> {{ '@' . $post->user->person->username }} </span>
                <span class="post-description" id="description-{{$post->id}}"> {{$post->description}} </span>
            </a>
        </div>
    </div>
</div>
