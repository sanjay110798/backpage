 <link href="<?php echo base_url();?>fontassets/css/term-condition.css" rel="stylesheet">
 <!-- /////////// -->

  <section class="about-banner">
        <div class="container">
            <div class="banner-content">
                <div class="row">
                    <h2>Terms & Conditions</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="about-sec">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="categories-filter">
                        <div class="row">
                            <?php 
                            if($this->session->userdata('session')=='')
                            {
                            $session_id = $this->input->ip_address();
                            $this->session->set_userdata('session',$session_id);
                            }
                            if($this->session->userdata('session')!='')
                            {
                            $session_id = $this->session->userdata('session');
                            }
                            if($this->session->userdata('login_id')!='')
                            {
                            $user_id=$this->session->userdata('login_id');
                            }
                            if($this->session->userdata('login_id')=='')
                            {
                            $user_id=0;
                            }
                            $term=$this->db->get_where('save_term',array('session_id'=>$session_id,'user_id'=>$user_id))->row();
                            $category_qry=$this->db->get('category_master')->result_array();
                            foreach ($category_qry as $cat) {
                            ?>
                            <div class="col mb-1" style="padding: 0px 6px 0 0;">
                                <div class="category-box" style="    height: 105px;width: 105px;text-align: center;background: aliceblue;padding: 6px 4px 6px 4px;">
                                    <?php 
                                    
                                    if($cat['id']!=10){?>
                                    <a href="<?php echo base_url();?>ad/category/<?=strtolower(str_replace(" ", "_",$cat['category_name']));?>">
                                    <?php } if($cat['id']==10){
                                    if($term->status=='N')
                                    {
                                    ?>
                                    <a href="<?php echo base_url();?>term">
                                    <?php } if($term->status=='Y'){?>   
                                    <a href="<?php echo base_url();?>ad/category/<?=strtolower(str_replace(" ", "_",$cat['category_name']));?>">  
                                    <?php } } ?>
                                        <img class="white-icon" style="    height: 75px;
    width: 87px;" src="<?=$cat['category_icon']?>" alt="Category Image">
                                        <p><?=$cat['category_name'];?></p>
                                    </a>
                                </div>
                            </div>
                           <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="about-content mt-3">
                    <h6 class="about-title">Backpage Terms Of Use</h6>
                    <p class="p-title">Welcome to Backpage Classifieds (“Backpage Classifieds”). The Backpage Classifieds website is provided to you by Backpage Classifieds</p>
                    <p>Who we are Our website address is: <a href="https://backpageclassifieds.com/">https://backpageclassifieds.com</a></p>
                    <h4>1. OBLIGATIONS AND BEHAVIOR OF THE USER</h4>
                    <p>In this section (Terms and Conditions) the word “User” refers both the Demanding Users and Offer Users. The service can be used for people Over 18. An eventual use of the service by Minor Age people, presupposes the parents authorization,
                        or the authorization of the people in charge of their supervision and tutelage.</p>
                    <p>These people are assuming full and exclusive responsibility for the behaviour of the Minor Age during the access, use and enjoyment of the service. The User must be aware that Backpage Classifieds will not make any previous control
                        on the content of the online ads and is not an intermediary on the possible transactions between Users We only provide an online advertising service The Users are assuming the full and exclusive responsibility of their behaviour
                        towards Backpage Classifieds and towards third parties.</p>
                    <p>The User makes use of the service provided by Backpage Classifieds , being aware of the fact that this website does not guarantee the veracity of the contents on the ads, or the good results on the negotiations.</p>
                    <p>By publishing an ad on Backpage Classifieds , the User is authorizing us to use it with Advertising purposes for its greater visibility and for an easier access by the rest of the Users, even by showing it in Search Engines and publications
                        in different webpages in collaboration with Backpage Classifieds , by publishing it in Media to promote the ads more efficiently.</p>
                    <p>The User undertakes not to use the services provided by Backpage Classifieds either improper or contrary to the provisions of Law , rules of ethics and good conduct of the Network services. The User, in particular, undertakes to not
                        transmit, through Backpage Classifieds , material of offensive and libellous nature, defamatory, pornographic, paedophile, vulgar, blasphemous or which is some way contrary to the principles of public order and good morals. The
                        Advertiser and Users are aware that the email address provided in Backpage Classifieds is for Support use only please allow 24 to 48 hours for a response</p>
                    <p>User confirms that he/she is of legal age according to his jurisdiction and he has not been forced in any way to create this profile User confirms that she/he will not offer any services that are against the law in his region</p>
                    <p>Ads that contains references to sexual services in exchange for money are prohibited Inserting pornographic pictures that contains explicit genital organs vision are prohibited The insertion of paedophile material will be immediately
                        reported to the competent Authorities, including all the access data, in order to reach the responsible people involucrate. By placing the add on Backpage Classifieds , the User is certifying that he can access to the contents with
                        full rights, and is also declaring that the pictures eventually inserted belongs to persons of legal age( over 18) which have given their consent to publish them in Backpage Classifieds .</p>
                    <p>It is not allowed to make any reference of reception modality or similar. Insert vulgar and offensive text or pictures Accept the Conditions of Use</p>
                    <p>Before enjoying any service, the User has an obligation to get informed about the eventual modifications and updates made in “Conditions of Use”. These modifications and updates will be an integral part of the present General Conditions
                        and they will constitute the agreement between Backpage Classifieds and the User.</p>

                    <h4>2. REFUND POLICY OF Backpage Classifieds</h4>
                    <p>When you buy a product you are buying credits $1 equals 1 credit (sold in Australian dollars )that you can only use for publishing adds on this website.</p>
                    <p>Credit reimbursement can only happen if Backpage Classifieds breaches Australian consumer law or If your advert were on the Go to the Top promo and:</p>
                    <p>It was deleted by the staff due to the fact that it was against our policy or regulation It was deleted from the software (automatically blocked) A refund will be authorized.</p>

                    <h4>3. ADVERTISEMENTS</h4>
                    <p>Escort and Bodyrubs won’t reimburse remaining credits regarding intentional cancellations of the service. We recommended to only purchase Credits as required that is intended to be useful.</p>
                    <p>Backpage Classifieds will always reimburse the remaining credits resulting from the interruption of the service. Reimbursement currency (AUD):</p>
                    <p>Backpage Classifieds will not repay in cash (just credit card deposits will be made) for non used credits.</p>

                    <h4>4. EXCEPTIONS</h4>
                    <p>Individual cases where mistakes are made clearly and absolutely by the staff, concern these following exceptions:.</p>

                    <h4>5. Total refund of credit:</h4>
                    <p>If the customer demonstrates that they have uploaded the ad by mistake and delete it immediately, communicating this situation to the website using the contact us now email address provided.</p>

                    <h4>6.Reimbursement currency (AUD):</h4>
                    <p>If the cardholder proves they have been a victim of fraudulent use of their credit card (theft, cloning, misuse), in such case, the website will not be involved in this situation in any way.</p>
                    <p>If the customer have made a mistake about the purchase or the choice of the package of credits buying a disproportionate amount of credits, and after an analysis of the client’s purchase history, a full refund can be returned.</p>
                    <p>Direct refunds in euros or $USD will not be considerate on direct purchases of our products.</p>
                    <p>All of the above in the “Exceptions” section is subject to the staff discretion.</p>
                    <p>Refund claims, of any kind, can be submitted to our email support@escortsandbodyrubs.com</p>
                    <p>Accreditation mistakes and payment errors are not considered for refunds and, consequently, the specifications of this section won’t be applied to them.</p>
                    <p>For errors arisen from credit transactions, please email support@escortsandbodyrubs.com stipulating the kind of mistake, including the sales receipt and/or the e-mail given at the moment of the purchase.</p>
                    <p>We remind to all of our clients that reclaimations are not solved automatically and, in case of any questions, queries, refund claims or any other, please email : support@escortsandbodyrubs.com</p>
                    <p>What personal data we collect and why we collect it Comments When visitors leave comments on the site we collect the data shown in the comments form, and also the visitor’s IP address and browser user agent string to help spam detection.</p>
                    <p>An anonymized string created from your email address (also called a hash) may be provided to the Gravatar service to see if you are using it. The Gravatar service privacy policy is available here: https://automattic.com/privacy/. After
                        approval of your comment, your profile picture is visible to the public in the context of your comment.</p>

                    <h4>7. Media</h4>
                    <p>If you upload images to the website, you should avoid uploading images with embedded location data (EXIF GPS) included. Visitors to the website can download and extract any location data from images on the website. Contact forms .</p>

                    <h4>8. Cookies</h4>
                    <p>If you leave a comment on our site you may opt-in to saving your name, email address and website in cookies. These are for your convenience so that you do not have to fill in your details again when you leave another comment. These
                        cookies will last for one year.</p>
                    <p>If you have an account and you log in to this site, we will set a temporary cookie to determine if your browser accepts cookies. This cookie contains no personal data and is discarded when you close your browser.</p>
                    <p>When you log in, we will also set up several cookies to save your login information and your screen display choices. Login cookies last for two days, and screen options cookies last for a year. If you select “Remember Me”, your login
                        will persist for two weeks. If you log out of your account, the login cookies will be removed.</p>
                    <p>If you edit or publish an article, an additional cookie will be saved in your browser. This cookie includes no personal data and simply indicates the post ID of the article you just edited. It expires after 1 day.</p>
                    <p>Embedded content from other websites Articles on this site may include embedded content (e.g. videos, images, articles, etc.). Embedded content from other websites behaves in the exact same way as if the visitor has visited the other
                        website.
                    </p>
                    <p>These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account
                        and are logged in to that website.</p>

                    <h4>9. Analytics</h4>
                    <p>Who we share your data with How long we retain your data If you leave a comment, the comment and its metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding
                        them in a moderation queue.</p>
                    <p>For users that register on our website (if any), we also store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their
                        username). Website administrators can also see and edit that information.</p>
                    <p>What rights you have over your data If you have an account on this site, or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can
                        also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
                    <p>Where we send your data Visitor comments may be checked through an automated spam detection service.</p>
                </div>
            </div>
        </div>
    </section>