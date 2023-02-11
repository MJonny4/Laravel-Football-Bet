<div class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a href="{{ route('inici') }} " class="navbar-brand">QuisIon</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="{{ route('jornades.index') }}">Jornades</a>
                <a class="nav-link" href="{{ route('apostes.index') }}">Apostes</a>
            </div>
            @guest()
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <a class="nav-link" href="{{ route('register') }}">Registre</a>
                </div>
            @else
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" style="color: purple;">{{ Auth::user()->nom }}</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="nav-link btn btn-link" type="submit">Logout</button>
                    </form>
                </div>
            @endguest
        </div>
    </div>
</div>
