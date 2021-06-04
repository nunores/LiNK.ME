<div class="card bg-dark border-secondary container-fluid report-box">
    <div class="row">
        <a href={{ route('post', ['id' => $report->post]) }}>
        <div class="card-body">
            This post has been reported by {{ '@' . $report->user->person->username }}
        </div>
    </div>
</div>
