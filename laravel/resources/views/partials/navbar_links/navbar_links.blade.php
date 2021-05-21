@php
use App\Models\Person;
use App\Models\User;
@endphp

@if (Auth::check())
    @if (Auth::user()->is_admin == true)
        @include('partials.navbar_links.admin_links')
    @else
        @include('partials.navbar_links.normal_links')
    @endif
@endif
