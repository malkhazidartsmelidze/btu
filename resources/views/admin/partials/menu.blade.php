<ul class="navbar-nav mr-auto">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            Post
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('admin.post.index') }}">
                All Post
            </a>
            <a class="dropdown-item" href="{{ route('admin.post.create') }}">
                Create Post
            </a>
        </div>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
            Category
        </a>
    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.config.index') }}">
            Config
        </a>
    </li>
</ul>
<ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('auth.custom.logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('auth.custom.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>
