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
              <form method="POST" action="{{ route('register') }}">
                  @csrf
                  <input required class="form-input" type="text" id="fname" name="name" placeholder="Name"><br>
                  @if ($errors->has('name'))
                    <span class="error">
                        {{ $errors->first('name') }}
                    </span>
                  @endif

                  <input required class="form-input" type="text" id="lname" name="username" placeholder="Username" minlength="4"><br>
                  @if ($errors->has('username'))
                    <span class="error">
                        {{ $errors->first('username') }}
                    </span>
                  @endif

                  <input required class="form-input" type="email" id="lname" name="email" placeholder="Email"><br>
                  @if ($errors->has('email'))
                    <span class="error">
                        {{ $errors->first('email') }}
                    </span>
                  @endif

                  <input required class="form-input" type="password" id="lname" name="password" placeholder="Password" minlength="6"><br>
                  @if ($errors->has('password'))
                    <span class="error">
                        {{ $errors->first('password') }}
                    </span>
                  @endif

                  <input required class="form-input" type="password" id="lname" name="password_confirmation" placeholder="Repeat Password" minlength="6"><br>
                  @if ($errors->has('password_confirmation'))
                    <span class="error">
                        {{ $errors->first('password_confirmation') }}
                    </span>
                  @endif

                  <button id="login-button" class="card bg-dark border-secondary"><span id="login-string">Register<span></button>
              </form>
          </div>
          <div id="login-messages">
              <p> <a href="{{ route('login')}}"> Already have an account? </a></p>
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
            @php
            use App\Models\Post;
                $posts = Post::all()->where('id', '>', '0')->where('id', '<', '10');
            @endphp
            @foreach ($posts as $post)
                @include('partials.homePost', ['post' => $post])
            @endforeach
          </div>
      </div>
  </div>
</div>
@endsection
