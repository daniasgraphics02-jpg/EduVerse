<?php require_once __DIR__ . '/../../includes/config.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Contact Us | EduVerse</title>


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
          href="assets/css/contact.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body>


<?php include("../../includes/sidebar.php"); ?>

<?php include("../../includes/header.php"); ?>


<div class="main-content">

    <div class="page-container">


        <section class="contact-page">


            <div class="contact-heading">

                <span class="section-badge">

                    📩 Contact EduVerse

                </span>


                <h1>

                    Get In

                    <span class="gradient-text">

                        Touch

                    </span>

                </h1>


                <p>

                    Have a question or need help?
                    Our team is here to assist you.

                </p>

            </div>



            <div class="contact-grid">


                <div class="contact-info">

                    <div class="contact-card">

                        <i class="bi bi-envelope"></i>

                        <div>

                            <h3>Email Us</h3>

                            <p>

                                support@eduverse.com

                            </p>

                        </div>

                    </div>


                    <div class="contact-card">

                        <i class="bi bi-headset"></i>

                        <div>

                            <h3>Support</h3>

                            <p>

                                We're here to help with
                                your learning journey.

                            </p>

                        </div>

                    </div>


                    <div class="contact-card">

                        <i class="bi bi-clock"></i>

                        <div>

                            <h3>Response Time</h3>

                            <p>

                                We usually respond within
                                24–48 hours.

                            </p>

                        </div>

                    </div>

                </div>



                <div class="contact-form">

                    <form id="contactForm">

                        <div class="form-group">

                            <label>Name</label>

                            <input
                                type="text"
                                name="name"
                                id="contactName"
                                placeholder="Enter your name"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>Email</label>

                            <input
                                type="email"
                                name="email"
                                id="contactEmail"
                                placeholder="Enter your email"
                                required
                            >

                        </div>


                        <div class="form-group">

                            <label>Message</label>

                            <textarea
                                rows="6"
                                name="message"
                                id="contactMessage"
                                placeholder="Write your message..."
                                required
                            ></textarea>

                        </div>


                        <button type="submit" id="contactSubmitBtn">

                            <span class="contact-btn-text">Send Message</span>

                            <i class="bi bi-send"></i>

                        </button>

                    </form>

                </div>


            </div>


        </section>



        <!--====================================
                CONTACT TOAST (hidden by default)
        =====================================-->

        <div id="contactToast" class="newsletter-toast" role="status" aria-live="polite">

            <div class="newsletter-toast-icon">

                <i class="bi bi-check-circle-fill"></i>

            </div>

            <div class="newsletter-toast-text">

                <strong id="contactToastTitle">Message Sent!</strong>

                <span id="contactToastMessage">Thanks for reaching out — we'll get back to you soon.</span>

            </div>

            <button type="button" class="newsletter-toast-close" id="contactToastClose" aria-label="Close">

                <i class="bi bi-x-lg"></i>

            </button>

        </div>


        <script>
        (function () {

            const form    = document.getElementById('contactForm');
            const btn     = document.getElementById('contactSubmitBtn');
            const toast      = document.getElementById('contactToast');
            const toastTitle = document.getElementById('contactToastTitle');
            const toastMsg   = document.getElementById('contactToastMessage');
            const toastClose = document.getElementById('contactToastClose');

            if (!form) return;

            let hideTimer = null;

            function showToast(success, title, message) {

                toast.classList.remove('is-success', 'is-error');
                toast.classList.add(success ? 'is-success' : 'is-error');

                toastTitle.textContent = title;
                toastMsg.textContent   = message;

                const icon = toast.querySelector('.newsletter-toast-icon i');
                icon.className = success ? 'bi bi-check-circle-fill' : 'bi bi-exclamation-circle-fill';

                toast.classList.add('is-visible');

                clearTimeout(hideTimer);
                hideTimer = setTimeout(function () {
                    toast.classList.remove('is-visible');
                }, 5000);
            }

            toastClose.addEventListener('click', function () {
                toast.classList.remove('is-visible');
            });

            form.addEventListener('submit', function (e) {

                e.preventDefault();

                btn.disabled = true;
                btn.classList.add('is-loading');

                const formData = new FormData(form);

                fetch('<?php echo BASE_URL; ?>api/contact-submit.php', {
                    method: 'POST',
                    body: formData
                })
                .then(function (res) { return res.json(); })
                .then(function (data) {

                    if (data.success) {
                        showToast(true, 'Message Sent!', data.message);
                        form.reset();
                    } else {
                        showToast(false, 'Oops!', data.message);
                    }
                })
                .catch(function () {
                    showToast(false, 'Oops!', 'Network error — please check your connection and try again.');
                })
                .finally(function () {
                    btn.disabled = false;
                    btn.classList.remove('is-loading');
                });
            });

        })();
        </script>



        <?php include("../../includes/footer.php"); ?>


    </div>

</div>


<script src="../../Assets/js/sidebar-header.js"></script>


</body>

</html>