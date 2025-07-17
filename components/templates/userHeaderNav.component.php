<header>
    <nav role="navigation" aria-label="Main Navigation">
        <div class="navbar-brand">
            <a href="/pages/userDashboard/index.php" title="Brand Logo">
                <img class="brand-logo" src="/assets/img/baxcalibur-logo.png" height="40" alt="Baxcalibur Logo" />
            </a>
            <a class="brand-name" href="/pages/userDashboard/index.php" title="Brand Name">Baxcalibur</a>
        </div>

        <div class="toggle-menu">
            <button id="toggleMenuBtn" class="toggle-menu-btn" onclick="toggleMenu()" title="Toggle Navigation"
                aria-controls="navbarLinks" aria-expanded="false">
                <span id="toggleIcon" class="material-icons">menu</span>
            </button>
        </div>

        <div>
            <ul id="navbarLinks" class="navbar-links">
                <li><a class="active-link" href="/pages/userDashboard/index.php" title="View Homepage">Dashboard</a></li>
                <li><a class="" href="/pages/trips/index.php" title="View Trips">Trips</a></li>
                <li>
                    <form action="/handlers/auth.handler.php" method="POST">
                        <input type="hidden" name="action" value="logout">
                        <button type="submit" class="logout-btn">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>