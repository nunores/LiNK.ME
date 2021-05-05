@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
@endpush

@section('content')

<body>
    <header>
        @include('partials.navbar')
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-2 text-center collapse" id="left-col">
                <div id="credentials-input">
                    <form action="index.php">
                        <input required class="form-input" type="text" id="fname" name="fname" placeholder="Username"><br>
                        <input required class="form-input" type="password" id="lname" name="lname" placeholder="Password"><br>
                        <button id="login-button" class="card bg-dark border-secondary"><span id="login-string">Log-In<span></button>
                    </form>
                </div>

                <div id="login-messages">
                    <p> <a href="./recover_password.php">Recover your password</a></p>
                    <p> <a href="register.php">Don't have an account? </a> </p>
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
                    <a href="../about.php" class="link-light">About</a>
                    <span class="link-light"> | </span>
                    <a href="./faq.php" class="link-light">FAQ</a>
                </div>
            </div>
            <div class="col-8">
                <div id="center-col">
                </div>
            </div>
        </div>
    </div>
</body>

</html>
