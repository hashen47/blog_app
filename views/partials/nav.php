<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand pe-3" style="font-size:32px; font-weight:600;">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="/home" class="nav-link <?= (urlIs('/home')) ? 'active' : ''; ?>" aria-current="page" href="#">Home</a>
                </li>

                <?php if(\Core\Database::authorized()): ?>
                    <li class="nav-item">
                        <a href="/posts" class="nav-link <?= (urlIs('/posts')) ? 'active' : ''; ?>" href="#">Posts</a>
                    </li>

                    <li class="nav-item">
                        <a href="/profile" class="nav-link <?= (urlIs('/profile')) ? 'active' : ''; ?>" href="#">Profile</a>
                    </li>

                    <li class="nav-item">
                        <a href="/create" class="nav-link <?= (urlIs('/create')) ? 'active' : ''; ?>" href="#">Create</a>
                    </li>
                <?php endif; ?>

            </ul>

            <form class="d-lg-flex list-unstyled text-secondary">
                <?php if(! \Core\Database::authorized()) : ?>
                    <li class="nav-item me-3">
                        <a href="/login" class="nav-link" style="<?= (urlIs('/login')) ? 'color:white !important;' : ''; ?>" href="#">Login</a>
                    </li>
                    <li class="nav-item mt-3 mt-lg-0 mb-2 mb-lg-0 me-lg-2">
                        <a href="/register" class="nav-link" style="<?= (urlIs('/register')) ? 'color:white !important;' : ''; ?>" href="#">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link mb-2 me-lg-2" style="<?= (urlIs('/logout')) ? 'color:white !important;' : ''; ?>" href="#">Logout</a>
                    </li>
                <?php endif; ?>
            </form>

        </div>
    </div>
</nav>
