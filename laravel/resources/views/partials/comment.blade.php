<div class="comment">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="{{ route('user', ['id' => $comment->user_id]) }}">
                    <img src="{{ asset('images/profile/' . $comment->user_id . '.png') }}"  class="rounded-circle post-comment-pic" alt="Profile picture">
                </a>
            </div>
            <div class="col-9 post-comment-div">
                <span class="post-comment-text"> {{ $comment->text }} </span>
            </div>
            <div class="col-1 three-dots post-comment-div">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                </svg>
            </div>
        </div>
    </div>
</div>
