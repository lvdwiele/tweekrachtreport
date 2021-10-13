<nav class="navbar navbar-expand-md navbar-default navbar-light bg-transparent px-4 py-3">

    <button type="button" id="sidebarCollapse" class="btn btn-light mr-3 bg-white shadow-sm">
        <i class="fas fa-align-left"></i>
    </button>

    <a class="navbar-brand text-white">@yield('title')</a>

    <div class="navbar-nav ml-auto">
        <a href="{{ route('home') }}" class="btn mx-1 text-white @if(Route::getCurrentRoute()->getName() === 'home') dashboard-active @endif">
            <i class="fas fa-home"></i>
        </a>
        <a href="{{ route('profile') }}" class="btn mx-1 text-white @if(Route::getCurrentRoute()->getName() === 'profile') dashboard-active @endif">
            <i class="fas fa-user"></i>
        </a>
        <a href="/logout" class="btn mx-1 text-white">
            <i class="fas fa-sign-out-alt mr-3"></i>
        </a>
    </div>

</nav>
