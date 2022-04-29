<link href="<?php echo base_url();?>fontassets/css/contact.css" rel="stylesheet ">

<section class="contact-banner ">
        <div class="container ">
            <div class="banner-content">
                <div class="row"></div>
            </div>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-form">
                        <h2 class="contact-form-title">Your Opinion</h2>
                        <p class="contact-form-description">You may want to get in touch with the team directly by selecting from the options below.</p>
                        <form action="<?php echo base_url();?>contact/add" method="post">
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="name" placeholder="Your name" required>
                                </div>
                                <div class="col">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" style="text-transform: none;"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"  required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <textarea class="form-control" rows="5" name="message" placeholder="write your message here"  required></textarea>
                                </div>
                            </div>
                            <div class="form-row contact-btn">
                                <div class="col">
                                    <button type="submit" class="contact-submit-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-details">
                        <h2>Contact Us Via Mail</h2>
                        <p>we'd love to hear about your project and help you. <br> <b>Mail us or contact us : </b></p>
                        <h5>Connect With Us</h5>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.facebook.com/crackerclassifiedsads"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        <a href="#"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
