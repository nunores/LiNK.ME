<div class="card bg-dark border-secondary container-fluid">
    <div class="row">
        <a href={{ route('post', ['id' => $report->comment->post]) }}>
            <div class="card-body">
                This comment has been reported by {{ '@' . $report->user->person->username }}
            </div>
        </a>
    </div>
</div>
