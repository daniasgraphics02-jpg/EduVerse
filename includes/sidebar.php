<?php

if (!isset($activePage)) {
    $activePage = '';
}

?>

<aside class="sidebar">


    <!-- =====================================================
         SIDEBAR TOP
    ====================================================== -->

    <div class="sidebar-top">

        <!-- HAMBURGER -->

        <button
            id="menuBtn"
            class="menu-btn"
            type="button"
            aria-label="Toggle sidebar"
        >

            <i class="bi bi-list"></i>

        </button>


        <!-- LOGO -->

        <div class="logo">

            <img
                src="<?php echo BASE_URL; ?>Assets/images/Logo.png"
                alt="EduVerse Logo"
            >

            <div class="logo-heading">

                <h1>EduVerse</h1>

                <p>Learn. Grow. Succeed.</p>

            </div>

        </div>

    </div>


    <!-- =====================================================
         MAIN MENU
    ====================================================== -->

    <p class="menu-title">MAIN MENU</p>


    <ul class="menu">


        <!-- HOME -->

        <li class="<?php echo ($activePage === 'home') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>Index.php">

                <i class="bi bi-house-door-fill"></i>

                <span>Home</span>

            </a>

        </li>


        <!-- COURSES -->

        <li class="<?php echo ($activePage === 'courses') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/courses/courses.php">

                <i class="bi bi-mortarboard-fill"></i>

                <span>Courses</span>

            </a>

        </li>


        <!-- BOOKS -->

        <li class="<?php echo ($activePage === 'books') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/books/books.php">

                <i class="bi bi-book-fill"></i>

                <span>Books</span>

            </a>

        </li>


        <!-- INSTITUTES -->

        <li class="<?php echo ($activePage === 'institutes') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/institutes/institutes.php">

                <i class="bi bi-building"></i>

                <span>Institutes</span>

            </a>

        </li>


        <!-- AI ADVISOR -->

        <li class="<?php echo ($activePage === 'ai-advisor') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/career-advisor/career-advisor.php">

                <i class="bi bi-robot"></i>

                <span>AI Career Advisor</span>

            </a>

        </li>


        <!-- ROADMAP -->

        <li class="<?php echo ($activePage === 'roadmap') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/career-advisor/roadmap.php">

                <i class="bi bi-signpost-split-fill"></i>

                <span>Roadmaps</span>

            </a>

        </li>


        <!-- WISHLIST -->

        <li class="<?php echo ($activePage === 'wishlist') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>pages/books/wishlist.php">

                <i class="bi bi-heart-fill"></i>

                <span>Wishlist</span>

            </a>

        </li>

    </ul>


    <!-- =====================================================
         DIVIDER
    ====================================================== -->

    <div class="divider"></div>


    <!-- =====================================================
         ACCOUNT
    ====================================================== -->

    <p class="menu-title">OTHER</p>


    <ul class="menu">


        <!-- PROFILE -->

        <li class="<?php echo ($activePage === 'profile') ? 'active' : ''; ?>">

            <a href="<?php echo BASE_URL; ?>dash.php">

                <i class="bi bi-person-circle"></i>

                <span>Profile</span>

            </a>

        </li>

    <!-- =====================================================
         DARK MODE
    ====================================================== -->

    <div class="dark-mode">

        <div class="dark-left">

            <i class="bi bi-moon-stars-fill"></i>

            <div>

                <h4>Dark Mode</h4>

                <p>Currently enabled</p>

            </div>

        </div>


        <label class="switch">

            <input
                type="checkbox"
                checked
            >

            <span class="slider"></span>

        </label>

    </div>


</aside>