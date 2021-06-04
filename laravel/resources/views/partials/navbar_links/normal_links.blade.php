<a href="{{ route('user', ['id' => Auth::user()->id]) }}" class="link-primary">My Profile</a>
<span class="link-primary"> | </span>
<a href="{{ route('logout') }}" class=" link-primary">Log Out</a>