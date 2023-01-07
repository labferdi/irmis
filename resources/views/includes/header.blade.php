<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('page-index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user-index') }}">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user-detail', 10) }}">User ke 10</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user-admin') }}">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user-login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>