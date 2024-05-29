<nav class="navbar navbar-dark bg-dark navbar-expand-lg border-bottom">
    <div class="container-fluid">
        <a class="navbar-brand fw-light" href="/">
            <span class="fa-solid fa-dumbbell me-1"></span> WORKOUT HUB
        </a>

        <div class="navbar navbar-inverse">
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="{{ Route::is('categories') ? 'active' : '' }} nav-link" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                    <a class="{{ Route::is('trainings') ? 'active' : '' }} nav-link" href="/trainings">Trainings</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
