@extends('layouts.app')

@push('css_links')
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
@endpush

@push('js_scripts')
<script src="{{ asset('js/faq.js') }}" defer></script>
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
                        <div id="first">
                            <div id="first-question" class="faq-question">
                                <span>1. How can I join LiNK.ME?</span>
                            </div>
                            <div id="first-answer" class="faq-answer" hidden>
                                <span>It's simple, just head to link.me/register and fill the form that will appear at the left of your screen. </span>
                                <div><span>You just need a valid e-mail and a unique username.</span></div>
                            </div>
                        </div>
                        <div id="second">
                            <div id="second-question" class="faq-question">
                                <span>2. How can i report a post that i think is inappropriate/offensive?</span>
                            </div>
                            <div id="second-answer" class="faq-answer" hidden>
                                <span>When you see a post that you want to report just click in the 3 dots on the right and then click on the report post button.</span>
                            </div>
                        </div>
                        <div id="third">
                            <div id="third-question" class="faq-question">
                                <span>3. How can i create a group with my friends?</span>
                            </div>
                            <div id="third-answer" class="faq-answer" hidden>
                                <span>After you log in, on the left column, there is a create group, just click that button and you'll be redirected to a new page.</span>
                                <div><span>On that page choose a name for your group, choose the friends you want to add and create the group.</span></div>
                            </div>
                        </div>
                        <div id="fourth">
                            <div id="fourth-question" class="faq-question">
                                <span>4. Can I change my name/password?</span>
                            </div>
                            <div id="fourth-answer" class="faq-answer" hidden>
                                <span>Go to your profile page and, from there you can click on the little edit button on your name or on the change password button above your picture.</span>
                            </div>
                        </div>
                        <div id="fifth">
                            <div id="fifth-question" class="faq-question">
                                <span>5. I added a post and now I don't like it. How can i remove it?</span>
                            </div>
                            <div id="fifth-answer" class="faq-answer" hidden>
                                <span>If you want to remove your own post just click on the 3 dots on the left upper corner of the post and then click on the delete post button.</span>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection
