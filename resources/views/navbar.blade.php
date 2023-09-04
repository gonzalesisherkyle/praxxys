<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <form class="form-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <li class="nav-item">
                <button class="btn btn-navbar" type="submit">
                    Logout
                </button>
            </li>
        </form>
    </ul>
</nav>