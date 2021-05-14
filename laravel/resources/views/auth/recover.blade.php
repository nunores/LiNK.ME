@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/login.css') }}" />
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-2 text-center collapse" id="left-col">
            <div id="credentials-input">
                <form method="POST" action="{{ route('recover') }}">
                    @csrf
                    <input required class="form-input" type="text" id="fname" name="email" placeholder="Email"><br>
                    @if ($errors->has('email'))
                      <span class="error">
                          {{ $errors->first('email') }}
                      </span>
                    @endif
                    <button id="login-button" class="card bg-dark border-secondary"><span id="login-string">Recover Password<span></button>
                </form>
            </div>
            <div id="login-messages">
                <p> <a href="{{ route('login') }}">Remembered the password?</a></p>
                <p> <a href="{{ route('register') }}">Don't have an account? </a> </p>
            </div>
            <div class="feed-change">
                <div id="feed-order">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRelevance">
                            Relevance
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="feedOrder" id="feedOrderRecent" checked>
                            Recent
                        </label>
                    </div>
                </div>
            </div>
            <div class="about-split">
                <a href="{{ route('about') }}" class="link-light">About</a>
                <span class="link-light"> | </span>
                <a href="{{ route('faq') }}" class="link-light">FAQ</a>
            </div>
        </div>
        <div class="col-8">
            <div id="center-col">
                @foreach ($posts as $post)
                    @include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
