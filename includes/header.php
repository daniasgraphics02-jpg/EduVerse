<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header class="main-header">

    <!-- =====================================================
         HEADER LEFT / SEARCH
    ====================================================== -->

    <form class="header-search" action="<?php echo BASE_URL; ?>pages/search/search.php" method="GET">

        <button type="submit" aria-label="Search">
            <i class="bi bi-search"></i>
        </button>

        <input
            type="text"
            name="q"
            placeholder="Search books, courses, institutes..."
            aria-label="Search"
            value="<?php echo isset($_GET['q']) ? htmlspecialchars($_GET['q']) : ''; ?>"
        >

    </form>


    <!-- =====================================================
         HEADER RIGHT
    ====================================================== -->

    <div class="header-right">

        <!-- NOTIFICATION -->

        <button
            class="header-icon"
            type="button"
            aria-label="Notifications"
        >

            <i class="bi bi-bell-fill"></i>

            <span class="notification-badge"></span>

        </button>


        <!-- =================================================
             LOGGED-IN USER
        ================================================== -->

        <?php if (isset($_SESSION['user_id'])): ?>

            <div class="user-profile-dropdown">

                <button
                    class="user-profile-btn"
                    type="button"
                    aria-label="Open profile menu"
                >

                    <img
                        src="<?php echo BASE_URL; ?>Assets/images/avatar.png"
                        alt="Profile"
                        class="profile-avatar"
                    >

                    <div class="profile-info">

                        <h4>
                            <?php
                            echo htmlspecialchars(
                                $_SESSION['user_name'] ?? 'User'
                            );
                            ?>
                        </h4>

                        <p>Team EduVerse</p>

                    </div>

                    <i class="bi bi-chevron-down profile-arrow"></i>

                </button>


                <!-- PROFILE DROPDOWN -->

                <div class="profile-dropdown-menu">

                    <a href="<?php echo BASE_URL; ?>dash.php" class="profile-dropdown-item">
                        <i class="bi bi-person"></i>
                        <span>Dashboard</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <a href="<?php echo BASE_URL; ?>logout.php" class="profile-dropdown-item logout-item">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>

                </div>

            </div>


        <!-- =================================================
             GUEST USER
        ================================================== -->

        <?php else: ?>

            <div class="auth-buttons">

                <a href="<?php echo BASE_URL; ?>login.php" class="login-nav-btn">Login</a>

                <a href="<?php echo BASE_URL; ?>register.php" class="reg-nav-btn">Register</a>

            </div>

        <?php endif; ?>

    </div>

</header>


<!-- =========================================================
     PROFILE DROPDOWN JAVASCRIPT
========================================================= -->

<script>

document.addEventListener("DOMContentLoaded", function () {

    const profileDropdown =
        document.querySelector(".user-profile-dropdown");

    const profileButton =
        document.querySelector(".user-profile-btn");


    if (profileDropdown && profileButton) {

        profileButton.addEventListener("click", function (event) {

            event.stopPropagation();

            profileDropdown.classList.toggle("active");

        });


        document.addEventListener("click", function () {

            profileDropdown.classList.remove("active");

        });

    }

});

</script>