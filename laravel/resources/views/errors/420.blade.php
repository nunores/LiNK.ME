@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
<link rel="stylesheet" href="{{ asset('css/404.css') }}" />

@endpush

@section('content')

<div id="center-col">
    <h1><span id="error-number-4">4</span><span id="error-number-1">2</span><span id="error-number-4">0</span></h1>
    <img src= {{ asset("./images/broken_chain.png")}} id="broken-chain">
    <h2 id="error-text">We could not link you to this page!</h2>
</div>


@endsection
