<?php require_once __DIR__ . '/../../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Featured Resources | EduVerse</title>

    <!-- Core CSS -->

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/style.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/components.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <!-- Layout -->

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/header.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/footer.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <!-- Page CSS - we will create this later -->

    <link rel="stylesheet"
          href="assets/css/Featured-resouces.css">

    <!-- Bootstrap Icons -->

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

    <div class="page-container">


        <!-- =====================================
                FEATURED LEARNING RESOURCES
        ====================================== -->

        <section class="featured-resources">


            <!-- Section Header -->

            <div class="resources-header">

                <span class="section-tag">

                    📚 FEATURED RESOURCES

                </span>


                <h1>

                    Discover the Best

                    <span class="gradient-text">

                        Learning Resources

                    </span>

                </h1>


                <p>

                    Explore carefully selected books, professional
                    courses, and Pakistan's leading institutes
                    recommended by EduVerse.

                </p>

            </div>



            <!-- Resource Grid -->

            <div class="resources-grid">


                <!-- ================= BOOK ================= -->

                <div class="resource-card">

                    <div class="resource-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/atomic-habits.jpg"
                            alt="Atomic Habits">

                    </div>


                    <div class="resource-content">

                        <span class="resource-category">

                            📘 Best Selling Book

                        </span>


                        <h3>

                            Atomic Habits

                        </h3>


                        <p>

                            Learn powerful habits that transform your
                            productivity and personal growth.

                        </p>


                        <div class="resource-meta">

                            <span>

                                ⭐ 4.9

                            </span>

                            <span>

                                James Clear

                            </span>

                        </div>


                        <a
                            href="<?php echo BASE_URL; ?>pages/books/book-details.php?id=317"
                            class="resource-btn">

                            View Details

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>



                <!-- ================= COURSE ================= -->

                <div class="resource-card">

                    <div class="resource-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/software-engineering.jpg"
                            alt="Software Engineering Diploma">

                    </div>


                    <div class="resource-content">

                        <span class="resource-category">

                            💻 Professional Diploma

                        </span>


                        <h3>

                            Software Engineering Diploma

                        </h3>


                        <p>

                            Learn HTML, CSS, JavaScript, PHP,
                            MySQL, Python and modern Full Stack
                            Development.

                        </p>


                        <div class="resource-meta">

                            <span>

                                ⭐ 4.9

                            </span>

                            <span>

                                2 Years

                            </span>

                        </div>


                        <a
                            href="<?php echo BASE_URL; ?>pages/courses/course-detail.php?slug=backend&id=6"
                            class="resource-btn">

                            View Details

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>



                <!-- ================= INSTITUTE ================= -->

                <div class="resource-card">

                    <div class="resource-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/aptech.jpg"
                            alt="Aptech Learning">

                    </div>


                    <div class="resource-content">

                        <span class="resource-category">

                            🏫 Top Institute

                        </span>


                        <h3>

                            Aptech Learning

                        </h3>


                        <p>

                            One of Pakistan's leading institutes
                            for Software Engineering and
                            Digital Skills.

                        </p>


                        <div class="resource-meta">

                            <span>

                                ⭐ 4.7

                            </span>

                            <span>

                                Karachi

                            </span>

                        </div>


                        <a
                            href="<?php echo BASE_URL; ?>pages/institutes/aptech.php"
                            class="resource-btn">

                            View Details

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </div>


            </div>

        </section>



        <?php include("../../includes/footer.php"); ?>


    </div>

</div>


<script src="../../Assets/js/sidebar-header.js"></script>


</body>

</html>