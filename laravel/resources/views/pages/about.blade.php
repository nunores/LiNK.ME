@extends('layouts.app')

@push('css_links')    
<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" />
<link rel="stylesheet" href="{{ asset('css/post.css') }}" />
<link rel="stylesheet" href="{{ asset('css/left_col.css') }}" />
<link rel="stylesheet" href="{{ asset('css/about.css') }}" />
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div id="center-col">
                <div class="container-fluid">
                    <div class="row">
                        <div class="about">
                            <div class="col-12">
                                <span class="about-text"> About </span>
                            </div>
                        </div>
                    </div>
                    <div class="row people-section">
                        <div class="container-fluid both-col">
                            <div class="col-6 full-screen-col first-col">
                                <div class="col-title">
                                    <span>About Us</span>
                                </div>
                                <div class="about-description first-paragraph">
                                    <span>We are a group of people that have been working from home for almost a year and want a faster way to take a look at our friend's lives while in a quick break from work.</span>
                                </div>
                                <div class="about-description second-paragraph">
                                    <span>In this website you'll be able to be linked with other people while working and living at the comfort of your home.</span>
                                </div>
                                <img src="{{ asset('images/bacalhau.png')}}" class="bacalhau" alt="Bacalhau">
                            </div>
                            <div class="col-6 full-screen-col second-col">
                                <div class="col-title">
                                    <span>Our Team</span>
                                </div>
                                <div class="row developers-first-row">
                                    <div class="col-6 developer">
                                        <img src="{{ asset('images/profile/calves.png') }}" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                        <div class="developer-name">
                                            <span>João Gonçalves</span>
                                        </div>
                                        <div class="developer-user">
                                            <span>@Ranhocas2000</span>
                                        </div>
                                    </div>
                                    <div class="col-6 developer">
                                        <img src="{{ asset('images/profile/nunores.png') }}" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                        <div class="developer-name">
                                            <span>Nuno Resende</span>
                                        </div>
                                        <div class="developer-user">
                                            <span>@nunores</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row  developers-second-row">
                                    <div class="col-6 developer">
                                        <img src="{{ asset('images/profile/coelho.png') }}" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                        <div class="developer-name">
                                            <span>Pedro Coelho</span>
                                        </div>
                                        <div class="developer-user">
                                            <span>@Mine4Phantom</span>
                                        </div>
                                    </div>
                                    <div class="col-6 developer">
                                        <img src="{{ asset('images/profile/xavier.png') }}" class="rounded-circle post-profile-pic developer-pic" height="300" width="300" alt="Profile picture">
                                        <div class="developer-name">
                                            <span>Xavier Pisco</span>
                                        </div>
                                        <div class="developer-user">
                                            <span>@psico</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection