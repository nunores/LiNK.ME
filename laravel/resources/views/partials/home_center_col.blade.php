<div id="center-col">
    @foreach ($posts as $post)
        @include('partials.post', ['post' => $post, 'comments' => $post->comments->where('deleted', '=', false)->take(2)])
    @endforeach
</div>
