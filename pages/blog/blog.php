<?php require_once __DIR__ . '/../../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Blog | EduVerse</title>


    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/style.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/components.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/animations.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/core/utilities.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/sidebar.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/header.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/footer.css">

    <link rel="stylesheet"
          href="<?php echo BASE_URL; ?>Assets/css/responsive.css">

    <link rel="stylesheet"
          href="assets/css/blog.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

    <div class="page-container">


        <section class="blog-page">


            <div class="section-heading">

                <span class="section-badge">

                    📝 EDUVERSE BLOG

                </span>


                <h1>

                    Learn More.

                    <span class="gradient-text">

                        Grow More.

                    </span>

                </h1>


                <p>

                    Explore educational tips, career advice,
                    technology trends and learning strategies.

                </p>

            </div>



            <div class="blog-grid">


                <article class="blog-card">

                    <div class="blog-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/software-engineering.jpg"
                            alt="Software Engineering">

                    </div>


                    <div class="blog-content">

                        <span>

                            💻 Technology

                        </span>


                        <h2>

                            How to Start Your Software
                            Engineering Journey

                        </h2>


                        <p>

                            Discover the essential skills and
                            learning path for becoming a software
                            engineer.

                        </p>


                        <a href="#">

                            Read Article

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </article>



                <article class="blog-card">

                    <div class="blog-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/atomic-habits.jpg"
                            alt="Learning">

                    </div>


                    <div class="blog-content">

                        <span>

                            📚 Learning

                        </span>


                        <h2>

                            5 Habits That Can Improve
                            Your Learning

                        </h2>


                        <p>

                            Simple learning habits that can help
                            students become more productive.

                        </p>


                        <a href="#">

                            Read Article

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </article>



                <article class="blog-card">

                    <div class="blog-image">

                        <img
                            src="<?php echo BASE_URL; ?>Assets/images/aptech.jpg"
                            alt="Education">

                    </div>


                    <div class="blog-content">

                        <span>

                            🎓 Education

                        </span>


                        <h2>

                            How to Choose the Right
                            Institute

                        </h2>


                        <p>

                            Important things to consider when
                            selecting an institute for your career.

                        </p>


                        <a href="#">

                            Read Article

                            <i class="bi bi-arrow-right"></i>

                        </a>

                    </div>

                </article>


            </div>


        </section>



        <?php include("../../includes/footer.php"); ?>


    </div>

</div>


<script src="../../Assets/js/sidebar-header.js"></script>


</body>

</html>