<?php require_once __DIR__ . '/../../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>FAQs | EduVerse</title>


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


    <!-- Page CSS -->

    <link rel="stylesheet"
          href="assets/css/faqs.css">


    <!-- Bootstrap Icons -->

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

    <div class="page-container">


        <section class="faq-page">


            <div class="section-heading">

                <span class="section-badge">

                    ❓ Frequently Asked Questions

                </span>


                <h1>

                    Frequently Asked

                    <span class="gradient-text">

                        Questions

                    </span>

                </h1>


                <p>

                    Find answers to the most common questions
                    about EduVerse.

                </p>

            </div>



            <div class="faq-list">


                <div class="faq-item">

                    <h3>

                        What is EduVerse?

                    </h3>

                    <p>

                        EduVerse is an educational platform that
                        helps learners discover courses, books,
                        institutes and career-learning resources.

                    </p>

                </div>



                <div class="faq-item">

                    <h3>

                        Are the books free?

                    </h3>

                    <p>

                        Book availability and pricing may vary
                        depending on the resource.

                    </p>

                </div>



                <div class="faq-item">

                    <h3>

                        Can I find institutes on EduVerse?

                    </h3>

                    <p>

                        Yes. EduVerse provides information about
                        different educational institutes and
                        their available programs.

                    </p>

                </div>



                <div class="faq-item">

                    <h3>

                        How can I contact EduVerse?

                    </h3>

                    <p>

                        You can contact the EduVerse team through
                        the Contact Us section.

                    </p>

                </div>


            </div>


        </section>



        <?php include("../../includes/footer.php"); ?>


    </div>

</div>


<script src="../../Assets/js/sidebar-header.js"></script>


</body>

</html>