    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Middle Top -->
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="f-about single-footer">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo/logo.svg" alt="Logo"></a>
                            </div>
                            <p><?=setting('footer_description')?></p>
                            <div class="footer-social">
                                <ul>
                                    <li><a href="<?=setting('site_facebook')?>"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="<?=setting('site_twitter')?>"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="<?=setting('site_linkedin')?>"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="<?=setting('site_google')?>"><i class="lni lni-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer sm-custom-border f-link">
                            <h3>Navigation</h3>
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="events.php">All Events</a></li>
                                <?php if (!isUserLoggedIn()): ?>
                                    <li><a href="signup.php">Create an Account</a></li>
                                    <li><a href="login.php">Log In</a></li>
                                <?php else: ?>
                                    <li><a href="profile.php">My Profile</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer sm-custom-border f-link">
                            <h3>Corporate</h3>
                            <ul>
                                <?php
                                    $pages = mysqli_query($conn, "SELECT * FROM pages ORDER BY id ASC");
                                    while ($page = mysqli_fetch_object($pages)) {
                                ?>
                                    <li><a href="<?php echo pageUrl($page->slug); ?>"><?php echo $page->title; ?></a></li>
                                <?php } ?>
                                <li><a href="contact.php">Contact Us</a></li>
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer footer-newsletter">
                            <h3>Newsletter</h3>
                            <p>Subscribe to us to always stay in touch with us and get the latest news.</p>
                            <form action="mail/mail.php" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" class="common-input"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Your email address'" required="" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe Now!</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner">
                    <div class="row">
                        <div class="col-12">
                            <div class="left">
                                <p>Designed and Developed by<a href="https://bugrahan.me" rel="nofollow" target="_blank">Bugrahan Kök</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99">
        <div class="toast align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div id="toastBody" class="toast-body"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>

    <!-- ========================= JS here ========================= -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/count-up.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
        <?php if (isset($_TOASTER)): ?>
            let toaster = document.querySelector('.toast');
            let alert = new bootstrap.Toast(toaster);
            document.getElementById('toastBody').innerText = "<?=$_TOASTER?>";
            alert.show();
        <?php endif; ?>
    </script>

    <?php if (empty(currentPath()) || strpos(currentPath(), 'index.php') !== false): ?>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
        });
        //====== Clients Logo Slider
        tns({
            container: '.client-logo-carousel',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 4,
                },
                1170: {
                    items: 6,
                }
            }
        });
    </script>
    <?php endif; ?>
</body>

</html>