@if ($report->post == null)
    @include('partials.report.report_comment')
@else
    @include('partials.report.report_post')
@endif
