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
            <div class="col-1 three-dots post-comment-div collapsed" type="link" data-bs-toggle="collapse" data-bs-target="#delete-comment" aria-expanded="false" aria-controls="delete-comment">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                    <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z" />
                </svg>
            </div>
            @if (Auth::user()->id == $comment->user->id)
            <!-- Only shows if owner of the comment is the current user -->
            <div id="delete-comment" data-comment-id="{{ $comment->id }}" class="comment-options collapse delete-comment">
                <div class="card card-body bg-dark">
                    <span class="link link-danger">Delete Comment</span>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
