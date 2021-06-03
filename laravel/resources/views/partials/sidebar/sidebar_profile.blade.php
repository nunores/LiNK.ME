<div class="col-2 text-center collapse" id="left-col"><!--
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
    </div> -->
    @if ($checker)
        @include('partials.notifications.notifications')
    @endif
    <div class="person-friends">
        @php
            use App\Models\User;
            $links = $user->links;
            $user = User::find($user->id);
        @endphp
        @for ($i = 0; $i < count($links) && $i < 300; $i++)
        @include('partials.friend', ['user' => $links[$i] ])
        @endfor
    </div>
    <div id="groups">
        @if ($checker)
            @include('partials.full_group_carousel')
        @endif
        <div>
            <a href="{{ route('about') }}" class="link-light">About</a>
            <span class="link-light"> | </span>
            <a href="{{ route('faq') }}" class="link-light">FAQ</a>
        </div>
        @if($checker)
            <div><!--"{{route('logout')}}"-->
                <a href="#" class="link-danger delete_user" user-id="{{ $user->id }}">Delete account</a>
            </div>
        @endif
    </div>
@if (!$checker)
</div>
@endif
