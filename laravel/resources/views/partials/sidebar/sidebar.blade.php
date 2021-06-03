@if ($page == "admin")
    @include('partials.sidebar.sidebar_admin', ["reports" => $reports])
@else
    @if ($page == "profile")
        @include('partials.sidebar.sidebar_profile', ['checker' => $checker, 'user' => $user])
    @else
        @if($page == "login")
            @include('partials.sidebar.sidebar_login')
        @else
            @include('partials.sidebar.sidebar_normal', ['page' => $page])
        @endif
    @endif
@endif
