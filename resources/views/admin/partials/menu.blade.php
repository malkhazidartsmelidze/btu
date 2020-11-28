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
                Create New
            </a>
        </div>
    </li>
    <li class="nav-item ">
        <a id="navbarDropdown" class="nav-link" href="{{ route('admin.category.index') }}" role="button"
            aria-haspopup="true" aria-expanded="false" v-pre>
            Category
        </a>

    </li>

</ul>
