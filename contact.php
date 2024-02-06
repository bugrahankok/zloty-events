<?php
    require_once __DIR__ . '/partials/header.php';
?>

    <!-- Start Hero Area -->
    <div class="breadcrumbs overlay">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 offset-lg-2 col-md-12 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Exclusive Events</h1>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Hero Area -->

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="form-main">
                        <h3 class="title"><span>Ready to Start?</span>
                            Let's Talk
                        </h3>
                        <form class="form" method="post" action="assets/mail/mail.php">
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Name</label>
                                        <input name="name" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Subject</label>
                                        <input name="subject" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Email Address</label>
                                        <input name="email" type="email" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="form-group">
                                        <label>Your Phone Number</label>
                                        <input name="phone" type="text" placeholder="" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group message">
                                        <label>Your Message</label>
                                        <textarea name="message" placeholder=""></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group button">
                                        <button type="submit" class="btn ">Submit Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-map-marker"></i>
                            <h4>Visit Our Office</h4>
                            <p class="no-margin-bottom">Palace of Culture and Science Ltd.
                                <br> Warsaw, WAW 03-700.</p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-phone"></i>
                            <h4>Let's Talk</h4>
                            <p class="no-margin-bottom">Phone: (+48) 123 456 789
                                <br> Fax: 123 456 789</p>
                        </div>
                        <!-- End Single Info -->
                        <!-- Start Single Info -->
                        <div class="single-info">
                            <i class="lni lni-envelope"></i>
                            <h4>E-mail Us</h4>
                            <p class="no-margin-bottom"><a href="mailto:info@zlotyevents.com">info@zlotyevents.com</a>
                                <br> <a href="mailto:contact@zlotyevents.com">contact@zlotyevents.com</a></p>
                        </div>
                        <!-- End Single Info -->
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
    require_once __DIR__ . '/partials/footer.php';
?>