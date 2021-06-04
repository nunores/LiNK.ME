<div class="container-fluid">
    <div class="row">
        <div class="col-2 text-center collapse" id="left-col">
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
            <div id="groups">
                @php
                    $groups = Auth::user()->user->groups;
                @endphp
                @if (count($groups) > 0)
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @for ($i = 0; $i < count($groups); $i++)
                                @if ($i % 2 == 0)
                                    @if ($i == 0)
                                        <div class="carousel-item active">
                                    @else
                                        <div class="carousel-item">
                                    @endif
                                @endif
                                @include('partials.group_carousel', ['group' => $groups[$i]])
                                @if ($i % 2 == 1)
                                    </div>
                                @endif
                            @endfor
                            @if (count($groups) % 2 == 1)
                                </div>
                            @endif
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="false"></span>
                            <span class="visually-hidden">Next</span>
                    </div>
                @endif
                <a href="{{ route('create_group') }}" type="button" id="create-group-button" class="btn btn-dark">Create Group</a>
            </div>
            <div>
                <a href="./about.php" class="link-light">About</a>
                <span class="link-light"> | </span>
                <a href="./faq.php" class="link-light">FAQ</a>
            </div>
            <div>
                <a href="#" class="link-danger delete_user" user-id = "{{ $user->id }}">Delete account</a>
            </div>
        </div>
        <div class="col-8">
            <div id="center-col">
                @include('partials.user_info')
                @php
                use App\Models\Post;
                    $posts = Post::all()->where('banned', '=', false);
                @endphp
                @foreach ($posts as $post)
                    @if($post->user->id == Auth::user()->user->id)
                        @include('partials.post', ['post' => $post, 'comments' => $post->comments])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="add-post-icon" class="add-post-icon">
    <a href="#">
        <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>
    </a>
</div>
