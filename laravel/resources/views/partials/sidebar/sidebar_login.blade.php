<div class="col-2 text-center collapse" id="left-col">
    <div id="credentials-input">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input required class="form-input" type="text" id="fname" name="username" placeholder="Username" minlength="4"><br>
            @if ($errors->has('username'))
              <span class="error">
                  {{ $errors->first('username') }}
              </span>
            @endif

            <input required class="form-input" type="password" id="lname" name="password" placeholder="Password" minlength="6"><br>
            @if ($errors->has('password'))
              <span class="error">
                  {{ $errors->first('password') }}
              </span>
            @endif

            <button id="login-button" class="card bg-dark border-secondary"><span id="login-string">Log-In<span></button>
        </form>
    </div>

    <div id="login-messages">
        <p> <a href="{{ route('recover') }}">Recover your password</a></p>
        <p> <a href="{{ route('register') }}">Don't have an account? </a> </p>
    </div>
    <div class="feed-change"></div>
    <div class="about-split">
        <a href="{{ route('about') }}" class="link-light">About</a>
        <span class="link-light"> | </span>
        <a href="{{ route('faq') }}" class="link-light">FAQ</a>
    </div>
</div>
