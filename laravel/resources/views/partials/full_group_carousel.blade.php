
<div id="groups">
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
    <a href="{{ route('create_group') }}" id="create-group-button" class="btn btn-dark">Create Group</a>
</div>
