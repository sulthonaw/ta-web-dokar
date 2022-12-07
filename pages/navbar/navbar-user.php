<nav class=" navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="?page=home">
            <img src="images/logo.png" alt="Bootstrap" width="30" height="24"> <b class="text-light">Dokar</b>
        </a>
        <div class="container" class="">
            <form class="search-bar" action="controller/p_pencarian.php" method="get">
                <input type="text" name="pencarian" placeholder="Search..." autocomplete="off" maxlength="100">
                <button>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>
        </div>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item px-2" style="width: max-content; text-transform: capitalize;">
                    <a class="nav-link login-aktif" href="index.php?page=profile">
                        Welcome
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>