@if ($notification->friendRequest != null)
    @include('partials.notifications.notification_types.friend_request', ['notification' => $notification])
@endif

@if ($notification->postComment != null)
    @include('partials.notifications.notification_types.post_comment', ['notification' => $notification])
@endif

@if ($notification->likedPost != null)
    @include('partials.notifications.notification_types.liked_post', ['notification' => $notification])
@endif

@if ($notification->bannedPost != null)
    @include('partials.notifications.notification_types.banned_post', ['notification' => $notification])
@endif

@if ($notification->bannedComment != null)
    @include('partials.notifications.notification_types.banned_comment', ['notification' => $notification])
@endif

@if ($notification->groupRequest != null)
    @include('partials.notifications.notification_types.', ['notification' => $notification])
@endif


