<div class="card bg-dark border-secondary container-fluid">
    <div class="row">
        <div class="card-body col-8">
            <a href="{{ route("post", ['id' => $notification->bannedComment->comment->post->id]) }}">
                Your comment was banned
            </a>
        </div>
    </div>
</div>
