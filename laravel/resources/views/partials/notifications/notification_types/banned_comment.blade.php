<div class="card bg-dark border-secondary container-fluid">
    <div class="row">
        <div class="card-body col-8">
            Your comment {{ '"' . \Illuminate\Support\Str::limit($notification->bannedComment->text, $limit = 10, $end = '...') . '"' }} was banned <!-- TODO Add references to what post and comment-->
        </div>
    </div>
</div>
