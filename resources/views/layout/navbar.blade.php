<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>

            @if (!auth()->check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $c)
                            <a class="dropdown-item" href="{{ url('/articles/' . $c->name) }}">{{ $c->name }}</a>
                        @endforeach

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            @else
                @can('is-admin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/manage-article')}}">Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/manage-user')}}">User</a>
                    </li>
                @endcan
                @cannot('is-admin')
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/user/manage-profile')}}">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/manage-article')}}">Blog</a>
                </li>
                @endcannot
            @endif

        </ul>
        @if (!auth()->check())
            <div class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/register') }}">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/login') }}">Login</a>
                </li>
            </div>
        @else
            <div class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/logout') }}">Log Out</a>
                </li>

            </div>
        @endif


    </div>
</nav>
