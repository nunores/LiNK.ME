<div class="card bg-dark border-secondary container-fluid report-box">
    <div class="row">
        <a href={{ route('post', ['id' => $report->comment->post]) }}>
            <div class="card-body">
                The comment {{ '"' . \Illuminate\Support\Str::limit($report->comment->text, $limit = 10, $end = '...') . '"' }} has been reported by {{ '@' . $report->user->person->username }}
            </div>
        </a>
    </div>
</div>
