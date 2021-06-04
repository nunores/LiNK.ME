<div class="profile-info my-profile">
    <div>
        @if (file_exists('images/profile/' . $user->id . '.png'))
            <img src="{{ asset('images/profile/' . $user->id . '.png') }}" class="rounded-circle profile-info-picture" alt="Profile picture">
        @else
            <img src="{{ asset('images/profile/default.png') }}" class="rounded-circle profile-info-picture" alt="Profile picture">
        @endif
        @if ($my_profile)
            <form id="add-picture-form" method="POST" action="{{ route("changePicture") }}" enctype="multipart/form-data">
                @csrf
                <label>
                    <input name="picture" type="file" class="form-control" id="add-picture-file" accept="image/*">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-pencil" id="change-photo" viewBox="0 0 16 16">
                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                    </svg>
                </label>
            </form>
        @endif
    </div>
    <span id="profile-name-tag">{{ '@' . $user->person->username}}</span>
    <br>
    <span id="profile-person-name" data-user-name="{{$user->name}}">{{$user->name}}
        @if ($my_profile)
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil collapsed" id="change-name-icon" viewBox="0 0 16 16" type="link" data-bs-toggle="collapse" data-bs-target="#change-name-pop"  aria-expanded="false" aria-controls="add-comment">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
            </svg>
        @endif
    </span>
    <form>
        <div class="form-group name-box change-name-form collapse" id="change-name-pop">
            <div class="container">
                <div class="row">
                    <div class="col-11 add-comment-textarea">
                        <textarea class="form-control name-textarea" data-user-id="{{ Auth::user()->id }}" rows="1" placeholder="Add a new username..." maxlength="25"></textarea>
                    </div>
                    <div class="col-1 send-button">
                        <span class="clickable-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-right-circle change-name" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
                            </svg>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @if ($my_profile)
        <a class="link-primary" data-bs-toggle="collapse" href="#change-password-form" role="button" aria-expanded="false" aria-controls="change-password-form" id="change-password">
            Change password
        </a>
    @endif
    @if (Auth::check() && !Auth::user()->is_admin)
        @if ($linkable)
            <br>
            <button type="button" id="link-us" class="btn btn-outline-primary friend-request-button" data-user-id="{{ $user->id }}">LiNK US</button>
        @endif
    @endif
    <div class="collapse" id="change-password-form">
        <div class="card bg-dark border-secondary">
            <input id="old-password" type="password" class="form-control bg-dark change-password-input" placeholder="Old password" minlength="6">
            <input id="new-password" type="password" class="form-control bg-dark change-password-input" placeholder="New password" minlength="6">
            <input id="confirm-password" type="password" class="form-control bg-dark change-password-input" placeholder="Confirm password" minlength="6">
            <span class="wrong-pass" role="alert">
                Holder
            </span>
            <input id="submit-password-change" type="submit" class="form-control change-password-input bg-dark">
        </div>
    </div>
</div>
