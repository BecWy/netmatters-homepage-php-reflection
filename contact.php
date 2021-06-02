<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <?php include "./inc/head.php"; ?>
        <!-- leaflet map -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin=""/>
        <!-- main stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>


    <body>
        <!-- side-menu -->
        <?php include "./inc/side-menu.php"; ?>

        <div class="body-container">
            <!-- header -->
            <?php include "./inc/header.php"; ?>

            <main>
                <div class="breadcrumbs">
                    <p>
                        <a href="./index.php">Home </a> 
                        / How Can We Help You?
                    </p>
                </div>

                <div class="contact-container">
                    <div class="contact-details-title">
                        <h1>How Can We Help You?</h1>
                    </div>
                    <div class="contact-details">
                        <p><strong>Call us on:</strong></p>
                        <p>Wymondham Office</p>
                        <p><a href="tel:+44-1603-704-020">01603 70 40 20</a></p>
                        <p>Gorleston Office</p>
                        <p><a href="tel:+44-1493-603-204">01493 60 32 04</a></p>
                        <p><strong>Email us on:</strong></p>
                        <p><a href="sales@netmatters.com">sales@netmatters.com</a></p>
                        <p><strong>Business Hours:</strong></p>
                        <p><strong>Monday - Friday 07:00 - 18:00</strong></p>
                        <a id="it-support-down-link"><p><strong>Out of Hours IT Support </strong><i class="fa fa-chevron-down" id="it-support-down-icon"></i></p></a>
                        <div class="it-support-down" id="it-support-down">
                            <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                            <p><strong>Monday - Friday 18:00 - 22:00</strong></p>
                            <p><strong>Saturday 08:00 - 16:00</strong></p>
                            <p><strong>Sunday 10:00 - 18:00</strong></p>
                            <p>To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours  voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
                        </div>
                    </div> <!-- end contact-details -->

                    <div class="contact-form-container">
                        <div class="form-submitted">
                            <p id="success-message">Thank you for your message. We will respond to your enquiry as soon as possible</p>
                        </div><!-- end form-submitted -->
                        <form action="contact.html">
                            <fieldset id="contact-fieldset">
                                <!-- <legend><span class="number">1</span>Your details</legend> -->
                                <label for="name" class="contact-label">Your Name *</label><br>
                                <input type="text" id="name" name="user_name" class="contact-field" required="required"><br>
                                
                                <label for="email" class="contact-label">Your Email *</label><br>
                                <input type="email" id="email" name="user_email" class="contact-field" required="required"><br>
                                
                                <label for="phone" class="contact-label">Your Telephone Number *</label><br>
                                <input type="tel" id="phone" name="user_phone" class="contact-field" required="required"><br>

                                <label for="subject" class="contact-label">Subject *</label><br>
                                <input type="text" id="subject" name="user_subject" class="contact-field" required="required"><br>

                                <label for="message" class="contact-label">Message *</label><br>
                                <textarea id="message" name="user_message" class="contact-field" required="required"></textarea><br>
                                
                                <div id="gdpr-div">
                                    <input type="checkbox" id="gdpr" value="NA" name="user_interest" required="required">
                                    <label for="gdpr" id="checkbox-label" class="contact-label">Please tick this box if you wish to receive marketing information from us. Please see our <span id="privacy"><a>Privacy Policy</a></span> for more information on how we use your data</label><br>
                                </div>

                            </fieldset>  
                            <div id="button-div">
                                <button type="submit" id="submit-button" class="g-recaptcha" 
                                data-sitekey="reCAPTCHA_site_key" 
                                data-callback='onSubmit' 
                                data-action='submit'>
                                    Send
                                </button>
                            </div>
                        </form>
                    </div> <!-- end contact-form-container -->

                    <div class="offices">
                        <div class="office-wymondham">
                            <div class="wymondham-address">
                                <i class="fas fa-home home-icon"></i>
                                <h3>Netmatters Office: Wymondham</h3>
                                <p>Netmatters</p>
                                <p>11 Penfold Drive</p>
                                <p>Wymondham</p>
                                <p>Norfolk</p>
                                <p>NR18 0WZ</p>
                                <br>
                            </div> <!-- end wymondham-address -->
                            <div class="wymondham-map">
                                <div id="mapid">MAP</div>
                            </div> <!-- end wymondham-map -->
                        </div> <!-- end office-wymondham -->
                        <div class="office-gorleston">
                            <div class="gorleston-address">
                                <i class="fas fa-home home-icon"></i>
                                <h3>Netmatters Office: Gorleston, Great Yarmouth</h3>
                                <p>Netmatters - Great Yarmouth</p>
                                <p>Suite F23 Beacon Innovation Centre, Beacon Park</p>
                                <p>Gorleston, Great Yarmouth</p>
                                <p>Norfolk</p>
                                <p>NR31 7RA</p>
                                <br>
                            </div> <!-- end gorleston-address -->
                            <div class="gorleston-map">
                            
                            </div> <!-- end gorleston-map -->
                        </div> <!-- end office-gorleston -->
                    </div> <!-- end contact-container -->
                    <!-- newsletter signup -->
                    <?php include "./inc/newsletter.php"; ?>
         
                </div> <!-- end offices -->

            </main>

            <!-- footer -->
            <?php include "./inc/footer.php"; ?>

        </div> <!-- end body-container -->

        <!-- leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
        <script src="./js/map.js"></script>
        <!-- other JavaScript files -->
        <script src="dist/js/app.js"></script>
        <script src="js/contact-page.js"></script>
    </body>
</html>

