@extends('layouts.app')

@push('css_links')    
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-3 space-col-3"></div>
        <div class="col-6 main-col">
            <div id="center-col">
                <div class="container-fluid">
                    <div class="row">
                        <div class="faq">
                            <div class="col-12">
                                <span class="faq-text"> FAQ </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="first-question">
                            <span>1. How can I join LiNK.ME?</span>
                        </div>
                        <div class="first-answer">
                            <span>It's simple, just head to link.me/register and fill the form that will appear at the left of your screen. </span>
                            <div><span>You just need a valid e-mail and a unique username.</span></div>
                        </div>
                        <div class="second-question">
                            <span>2. How can i report a post that i think is inappropriate/offensive?</span>
                        </div>
                        <div class="third-question">
                            <span>3. How can i create a group with my friends?</span>
                        </div>
                        <div class="fourth-question">
                            <span>4. Can I change my name/password?</span>
                        </div>
                        <div class="fifth-question">
                            <span>5. I added a post and now I don't like it. How can i remove it?</span>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection