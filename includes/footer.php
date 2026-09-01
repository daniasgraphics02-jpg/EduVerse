<!--=========================================================
                        FOOTER
==========================================================-->

<footer class="footer">

    <div class="footer-container">

        <!--====================================
                    TOP AREA
        =====================================-->

        <div class="footer-top">

            <!-- LEFT -->

            <div class="footer-about">

                <div class="footer-logo">

                    <img
                        src="<?php echo BASE_URL; ?>Assets/images/Logo.png"
                        alt="EduVerse"
                    >

                    <div>

                        <h3>EduVerse</h3>

                        <span>Learn. Grow. Succeed.</span>

                    </div>

                </div>


                <p class="footer-description">

                    Empowering every learner to build a smarter future.
                    Discover courses, books, institutes and AI-powered
                    career guidance—all in one intelligent platform.

                </p>


                <!-- Newsletter -->

                <div class="newsletter">

                    <h4>Subscribe to our Newsletter</h4>

                    <p>

                        Get updates about new courses, institutes,
                        learning resources and platform features.

                    </p>


                    <form class="newsletter-form" id="newsletterForm">

                        <input
                            type="email"
                            name="email"
                            id="newsletterEmail"
                            placeholder="Enter your email address"
                            required
                        >

                        <button type="submit" id="newsletterBtn">

                            <span class="newsletter-btn-text">Subscribe</span>

                        </button>

                    </form>

                </div>

            </div>



            <!--====================================
                    PLATFORM
            =====================================-->

            <div class="footer-links">

                <h4>Platform</h4>

                <ul>

                    <!-- HOME -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>Index.php">
                            Home
                        </a>
                    </li>


                    <!-- COURSES -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/courses/courses.php">
                            Courses
                        </a>
                    </li>


                    <!-- BOOKS -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/books/books.php">
                            Books
                        </a>
                    </li>


                    <!-- INSTITUTES -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/institutes/institutes.php">
                            Institutes
                        </a>
                    </li>


                    <!-- AI CAREER ADVISOR -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/career-advisor/career-advisor.php">
                            AI Career Advisor
                        </a>
                    </li>

                </ul>

            </div>



            <!--====================================
                    RESOURCES
            =====================================-->

            <div class="footer-links">

                <h4>Resources</h4>

                <ul>

                    <!-- LEARNING ROADMAPS
                         Leave for now -->

                    <li>
                        <a href="#">
                            Learning Roadmaps
                        </a>
                    </li>


                    <!-- FEATURED RESOURCES -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/resources/Featured-resouces.php">
                            Featured Resources
                        </a>
                    </li>


                    <!-- SUCCESS STORIES -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/resources/Success-stories.php">
                            Success Stories
                        </a>
                    </li>


                    <!-- FAQS -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/support/faqs.php">
                            FAQs
                        </a>
                    </li>


                    <!-- BLOG -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/blog/blog.php">
                            Blog
                        </a>
                    </li>

                </ul>

            </div>



            <!--====================================
                    SUPPORT
            =====================================-->

            <div class="footer-links">

                <h4>Support</h4>

                <ul>

                    <!-- CONTACT -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/support/contact.php">
                            Contact Us
                        </a>
                    </li>


                    <!-- PRIVACY POLICY -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/legal/privacy-policy.php">
                            Privacy Policy
                        </a>
                    </li>


                    <!-- TERMS -->

                    <li>
                        <a href="<?php echo BASE_URL; ?>pages/legal/terms.php">
                            Terms & Conditions
                        </a>
                    </li>

                </ul>

            </div>

        </div>



        <!--====================================
                DIVIDER
        =====================================-->

        <div class="footer-divider"></div>



        <!--====================================
                BOTTOM AREA
        =====================================-->

        <div class="footer-bottom">


            <!-- COPYRIGHT -->

            <div class="copyright">

                © 2026 EduVerse. All Rights Reserved.

            </div>



            <!-- SOCIAL MEDIA -->

            <div class="footer-social">

                <a href="#" aria-label="Facebook">

                    <i class="bi bi-facebook"></i>

                </a>


                <a href="#" aria-label="Instagram">

                    <i class="bi bi-instagram"></i>

                </a>


                <a href="#" aria-label="LinkedIn">

                    <i class="bi bi-linkedin"></i>

                </a>


                <a href="#" aria-label="YouTube">

                    <i class="bi bi-youtube"></i>

                </a>


                <a href="#" aria-label="GitHub">

                    <i class="bi bi-github"></i>

                </a>

            </div>



            <!-- FOOTER CREDIT -->

            <div class="footer-credit">

                💙 Empowering every learner to build a smarter future.

            </div>

        </div>

        <!--====================================
                GIANT WORDMARK
        =====================================-->

        <div class="footer-giant-wordmark" aria-hidden="true">EduVerse</div>

    </div>

</footer>


<!--====================================
        NEWSLETTER TOAST (hidden by default)
=====================================-->

<div id="newsletterToast" class="newsletter-toast" role="status" aria-live="polite">

    <div class="newsletter-toast-icon">

        <i class="bi bi-check-circle-fill"></i>

    </div>

    <div class="newsletter-toast-text">

        <strong id="newsletterToastTitle">Subscribed!</strong>

        <span id="newsletterToastMessage">You have subscribed successfully.</span>

    </div>

    <button type="button" class="newsletter-toast-close" id="newsletterToastClose" aria-label="Close">

        <i class="bi bi-x-lg"></i>

    </button>

</div>


<script>
(function () {

    const form      = document.getElementById('newsletterForm');
    const emailInput = document.getElementById('newsletterEmail');
    const btn        = document.getElementById('newsletterBtn');
    const toast       = document.getElementById('newsletterToast');
    const toastTitle  = document.getElementById('newsletterToastTitle');
    const toastMsg    = document.getElementById('newsletterToastMessage');
    const toastClose  = document.getElementById('newsletterToastClose');

    if (!form) return;

    let hideTimer = null;

    function showToast(success, message) {

        toast.classList.remove('is-success', 'is-error');
        toast.classList.add(success ? 'is-success' : 'is-error');

        toastTitle.textContent   = success ? 'Subscribed!' : 'Oops!';
        toastMsg.textContent     = message;

        const icon = toast.querySelector('.newsletter-toast-icon i');
        icon.className = success ? 'bi bi-check-circle-fill' : 'bi bi-exclamation-circle-fill';

        toast.classList.add('is-visible');

        clearTimeout(hideTimer);
        hideTimer = setTimeout(hideToast, 5000);
    }

    function hideToast() {
        toast.classList.remove('is-visible');
    }

    toastClose.addEventListener('click', hideToast);

    form.addEventListener('submit', function (e) {

        e.preventDefault();

        const email = emailInput.value.trim();

        if (!email) {
            showToast(false, 'Please enter your email address.');
            emailInput.focus();
            return;
        }

        btn.disabled = true;
        btn.classList.add('is-loading');

        const formData = new FormData();
        formData.append('email', email);

        fetch('<?php echo BASE_URL; ?>api/newsletter-subscribe.php', {
            method: 'POST',
            body: formData
        })
        .then(function (res) { return res.json().then(function (data) {
            return { ok: res.ok, data: data };
        }); })
        .then(function (result) {

            showToast(result.data.success, result.data.message);

            if (result.data.success) {
                form.reset();
            }
        })
        .catch(function () {
            showToast(false, 'Network error — please check your connection and try again.');
        })
        .finally(function () {
            btn.disabled = false;
            btn.classList.remove('is-loading');
        });
    });

})();
</script>


<?php include __DIR__ . '/ai-assistant-widget.php'; ?>