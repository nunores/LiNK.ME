<div>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        <div>
            Post must have a description and/or picture
        </div>
    </div>
    <div class="add-post container-fluid">
        <div class="add-post-header">
            <div class="row">
                <div class="col-1">
                    <a href="{{ route("user", ["id" => Auth::user()->id])}}">
                        @if (file_exists('images/profile/' . Auth::user()->id . '.png'))
                            <img src="{{ asset('images/profile/' . Auth::user()->id . '.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                        @else
                            <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle post-profile-pic" alt="Profile picture">
                        @endif
                    </a>
                </div>
                <div class="post-name col-10">
                    <a href="{{ route("user", ["id" => Auth::user()->id])}}">
                        <span class="name-tag"> {{ "@" . Auth::user()->username }} </span>
                        <span class="person-name"> {{ Auth::user()->user->name }} </span>
                    </a>
                </div>
            </div>
        </div>
        <iframe name="dummyframe" id="dummyframe" onload="insert_added_post()" style="display: none;"></iframe>
        <form id="add-post-form" method="POST" action="{{ route("createPost") }}" target="dummyframe" enctype="multipart/form-data">
            @csrf
            <input type=hidden id="group_id" name="group_id">
            <textarea name="description" maxlength="250" class="form-control add-post-textarea" aria-label="With textarea" placeholder="Insert text here..."></textarea>
            <div class="row">
                <label class="col-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Add a photo"><input name="picture" type="file" class="form-control" id="add-post-file" accept="image/*">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                        <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                    </svg>
                </label>
                <label class="col-1" id="add-post-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Submit your post">
                    <input type="submit" value="Send" id="submit-post" hidden>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                    </svg>
                </label>
                <div class="col-9" id="add-post-form-space" style="display: inline-block"></div>
                @include('partials.contextual_help')

            </div>

            <span class="glyphicon glyphicon-send"></span>
        </form>
    </div>
</div>
