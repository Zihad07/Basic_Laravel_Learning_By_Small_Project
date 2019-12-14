<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/services">Services</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/posts">Blog</a>
                </li>
            </ul>

            <ul class="navbar-nav navbar-right">
                <li class="nav-item active">
                    <a class="nav-link" href="/posts/create">Created Post</a>
                </li>

            </ul>

        </div>
    </div>
</nav>
