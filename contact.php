<?php
include("./contact-form.php");

$pageTitle = "Contact Us | Netmatters";
?>



<!DOCTYPE html>
<html lang="en">
    <!-- head -->
    <?php include "./inc/head.php"; ?>
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
                        <a href="./index.php">Home</a> 
                        &nbsp /&nbsp &nbsp How Can We Help You?
                    </p>
                </div>

                <?php //display success message
                if(isset($_GET['status'])) {
                    if( $_GET['status'] == 'success') {
                        echo '<div class="success-message">';
                        echo '<p class="message-p">Thank you for your enquiry. We will be in touch shortly.</p>';
                        echo '</div>';
                        ?>

                        <script> 
                            setTimeout( () => { 
                                messageP.style.opacity = "0";
                            }, 6700);
                            setTimeout( () => { 
                                successMessage.style.height = "0px";
                                successMessage.style.opacity = "0";
                            }, 7000);
                            setTimeout( () => { 
                                successMessage.style.display = "none";
                            }, 8500);
                        </script>


                    <?php
                    } elseif($_GET['status'] == 'unsuccessful') {
                        echo '<div class="fail-message">';
                        echo '<p class="message-p">Enquiry submission unsuccessful. Please try again.</p>';
                        echo '</div>';
                    }
                    ?>
                    <script> 
                        setTimeout( () => { 
                            failMessage.style.height = "0px";
                            //need to fade the text opacity at the same time as the height
                            //at the moment fading the whole message
                            messageP.style.opacity = "0";
                            failMessage.style.opacity = "0";
                        }, 7000);
                        setTimeout( () => { 
                            failMessage.style.display = "none";
                        }, 8500);
                    </script>

                <?php
                }
                ?>


                <div class="contact-container">
                    <div class="contact-details-title">
                        <h1>How Can We Help You?</h1>
                    </div>

                    <div class="contact-inner-container">
                        <div class="contact-details">
                            <p class="br"><strong>Call us on:</strong></p>
                            <p>Wymondham Office</p>
                            <p class="br"><a href="tel:+44-1603-704-020">01603 70 40 20</a></p>
                            <p>Gorleston Office</p>
                            <p class="br"><a href="tel:+44-1493-603-204">01493 60 32 04</a></p>
                            <p><strong>Email us on:</strong></p>
                            <p class="br"><a href="sales@netmatters.com">sales@netmatters.com</a></p>
                            <p class="br"><strong>Business Hours:</strong></p>
                            <p class="br"><strong>Monday - Friday 07:00 - 18:00</strong></p>
                            <a id="it-support-down-link"><p class="br"><strong>Out of Hours IT Support </strong><i class="fa fa-chevron-down" id="it-support-down-icon"></i></p></a>
                            <div class="it-support-down" id="it-support-down">
                                <p>Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                                <p><strong>Monday - Friday 18:00 - 22:00</strong></p>
                                <p><strong>Saturday 08:00 - 16:00</strong></p>
                                <p><strong>Sunday 10:00 - 18:00</strong></p>
                                <p>To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours  voicemail. A technician will contact you on the number provided within 45 minutes of your call.</p>
                            </div>
                        </div> <!-- end contact-details -->

                        <div class="contact-form-container">
                            <form action="contact.php" method="post">
                                <fieldset id="contact-fieldset">
                                    <!-- <legend><span class="number">1</span>Your details</legend> -->
                                    <div class="error-messages">
                                        <div class="error-message error-message-phone">
                                            <!-- use php to echo the message? or add message with JS? -->
                                            <p>Telephone number is invalid</p>
                                            <i class="fas fa-times error-message-close"></i>
                                        </div> <!-- end error-message-phone -->
                                        <div class="error-message error-message-message">
                                            <!-- use php to echo the message? or add message with JS? -->
                                            <p>The message must be at least 5 characters.</p>
                                            <i class="fas fa-times error-message-close"></i>
                                        </div> <!-- end error-message-message -->
                                    </div> <!-- end error-messages -->
                                    
                                    <div id="name-container">
                                        <label for="name" class="contact-label">Your Name <span class="required">*</span></label><br>
                                        <input type="text" id="name" name="user_name" class="contact-field" required="required"><br>
                                    </div>

                                    <div>
                                        <label for="email" class="contact-label">Your Email <span class="required">*</span></label><br>
                                        <input type="email" id="email" name="user_email" class="contact-field" required="required"><br>
                                    </div>

                                    <div id="phone-container">
                                        <label for="phone" class="contact-label">Your Telephone Number <span class="required">*</span></label><br>
                                        <input type="tel" id="phone" name="user_phone" class="contact-field" required="required"><br>
                                    </div>

                                    <div>
                                        <label for="subject" class="contact-label">Subject <span class="required">*</span></label><br>
                                        <input type="text" id="subject" name="user_subject" class="contact-field" required="required"><br>
                                    </div>

                                    <label for="message" class="contact-label">Message <span class="required">*</span></label><br>
                                    <textarea id="message" name="user_message" class="contact-field" required="required"></textarea><br>
                                    
                                    <div id="form-checkbox-div"> <!--change these names/classes to marketing. I've removed required already -->
                                        <input type="checkbox" id="form-checkbox" value="NA" name="marketing_yes">
                                        <span class="checkmark"></span>
                                        <label for="form-checkbox" id="checkbox-label" class="contact-label">Please tick this box if you wish to receive marketing information from us. Please see our <span id="privacy"><a>Privacy Policy</a></span> for more information on how we use your data</label><br>
                                    </div>

                                </fieldset>  
                                <div id="button-div">
                                    <button type="submit" id="submit-button" class="g-recaptcha" 
                                    data-sitekey="reCAPTCHA_site_key" 
                                    data-callback='onSubmit' 
                                    data-action='submit'>
                                        Send Enquiry
                                    </button>
                                </div>
                            </form>
                        </div> <!-- end contact-form-container -->
                    </div> <!-- end contact-inner-container -->

                    <div class="offices">
                        <div class="office-wymondham">
                            <div class="wymondham-address">
                                <i class="fas fa-home home-icon" style="line-height:58px;"></i>
                                <h3>Netmatters Office: Wymondham</h3>
                                <p class="first-p">Netmatters</p>
                                <p>11 Penfold Drive</p>
                                <p>Wymondham</p>
                                <p>Norfolk</p>
                                <p>NR18 0WZ</p>
                                <br>
                            </div> <!-- end wymondham-address -->
                            <div class="wymondham-map" id="wymondham-map">
                                <div id="mapid">MAP</div>
                            </div> <!-- end wymondham-map -->
                        </div> <!-- end office-wymondham -->
                        <div class="office-gorleston">
                            <div class="gorleston-address">
                                <i class="fas fa-home home-icon" style="line-height:58px;"></i>
                                <h3>Netmatters Office: Gorleston, Great Yarmouth</h3>
                                <p class="first-p">Netmatters - Great Yarmouth</p>
                                <p>Suite F23 Beacon Innovation Centre, Beacon Park</p>
                                <p>Gorleston, Great Yarmouth</p>
                                <p>Norfolk</p>
                                <p>NR31 7RA</p>
                                <br>
                            </div> <!-- end gorleston-address -->
                            <div class="gorleston-map" id="gorleston-map">
                                
                            </div> <!-- end gorleston-map -->
                        </div> <!-- end office-gorleston -->
                    </div> <!-- end offices -->
                    <!-- newsletter signup -->
                    <?php include "./inc/newsletter.php"; ?>
         
                </div> <!-- end contact-container -->

            </main>

            <!-- footer -->
            <?php include "./inc/footer.php"; ?>

        </div> <!-- end body-container -->


        <!-- <script src="./js/map.js"></script> -->
        <script src="./js/map.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBSBDeMEwX9MBMEDCavlK03yATT7_vLojc&callback=initMap&libraries=&v=weekly"
            async
        ></script>

        <!-- other JavaScript files -->
        <script src="dist/js/app.js"></script>
        <script src="dist/js/contact-page.js"></script>
    </body>
</html>

