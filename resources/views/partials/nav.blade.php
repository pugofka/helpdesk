<div class="user-section">
    <a href="/"><img class="img-circle" src="{{ App\Models\User::get_gravatar(Auth::user()->email) }}">
        <p>{{Auth::user()->full_name}}</p>
    </a>
</div>

<div class="menu">
    <a class="active" href="/"><i class="icon ion-ios-home"></i> Главная</a>
    <a  href="/clients"><i class="icon ion-person"></i> Клиенты</a>
    <a  href="/"><i class="icon ion-document-text"></i> Договоры</a>
    <a href="/"><i class="icon ion-ios-briefcase"></i> Проекты</a>
    <a href="/"><i class="icon ion-ios-list"></i> Задачи</a>
    <a href="/"><i class="icon ion-lock-combination"></i> SLA</a>
    <a href="/"><i class="icon ion-ios-people"></i> Пользователи</a>
    <a href="/"><i class="icon ion-gear-b"></i> Настройки</a>
    <a href="" onclick="event.preventDefault();
       document.getElementById('logout-form').submit();"
        >
        <i class="icon ion-android-exit"></i> Выход
    </a>

    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

</div>

<div class="line"><hr></div>
