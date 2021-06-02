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
                <div class="contact-details">
                    <h4>Contact Details</h4>
                    <p>16 Zobel Close</p>
                    <p>Norwich</p>
                    <p>Norfolk</p>
                    <p>NR3 2BY</p>
                    <br>
                    <p><a href="tel:+44-1235-852-894">01235-852-894</a></p>
                    <p><a href="mailto:info@terracotta.com">info@terracotta.com</a></p>
                    <br>
                </div> <!-- end contact-details -->

                <div class="contact-form-container">
                    <div class="form-submitted">
                        <p id="success-message">Thank you for your message. We will respond to your enquiry as soon as possible</p>
                    </div><!-- end form-submitted -->
                    <h3 class="h3-title">Send us a Message</h3>
                    <form action="contact.html">
                        <fieldset id="contact-fieldset">
                            <!-- <legend><span class="number">1</span>Your details</legend> -->
                            <label for="name" class="contact-label">Name:*</label><br>
                            <input type="text" id="name" name="user_name" class="contact-field" required="required"><br>
                            
                            <label for="email" class="contact-label">Email:*</label><br>
                            <input type="email" id="email" name="user_email" class="contact-field" required="required"><br>
                            
                            <label for="phone" class="contact-label">Phone:*</label><br>
                            <input type="tel" id="phone" name="user_phone" class="contact-field" required="required"><br>

                            <label for="message" class="contact-label">Message:*</label><br>
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
                            <h4>Contact Details</h4>
                            <p>16 Zobel Close</p>
                            <p>Norwich</p>
                            <p>Norfolk</p>
                            <p>NR3 2BY</p>
                            <br>
                            <p><a href="tel:+44-1235-852-894">01235-852-894</a></p>
                            <p><a href="mailto:info@terracotta.com">info@terracotta.com</a></p>
                            <br>
                        </div> <!-- end wymondham-address -->
                        <div class="wymondham-map">
                            <div id="mapid">MAP</div>
                        </div> <!-- end wymondham-map -->
                    </div> <!-- end office-wymondham -->
                    <div class="office-gorleston">
                        <div class="gorleston-address">
                        
                        </div> <!-- end gorleston-address -->
                        <div class="gorleston-map">
                        
                        </div> <!-- end gorleston-map -->
                    </div> <!-- end office-gorleston -->

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
    </body>
</html>

