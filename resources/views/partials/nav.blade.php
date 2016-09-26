<div class="user-section">
    <a href="/"><img class="img-circle" src="{{ App\Models\User::get_gravatar(Auth::user()->email) }}">
        <p>{{Auth::user()->full_name}}</p>
    </a>
</div>

<div class="menu">
    <a class="active" href="/"><i class="icon ion-ios-home"></i> Home</a>
    <a class="active" href="/"><i class="icon ion-person"></i> Person</a>
    <a class="active" href="/"><i class="icon ion-gear-b"></i> Yee</a>
    <a href="{{ url('/logout') }}"
       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
        <i class="icon ion-android-exit"></i> Logout
    </a>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>

<div class="line"><hr></div>
