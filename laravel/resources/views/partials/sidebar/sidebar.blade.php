@if ($page == "admin")
    @include('partials.sidebar.sidebar_admin', ["reports" => $reports])
@else
    @if ($page == "profile")
        @include('partials.sidebar.sidebar_normal')
    @else
        @include('partials.sidebar.sidebar_normal')
    @endif
@endif
