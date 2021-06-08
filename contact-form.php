<?php 

require_once("./database.php");
require __DIR__ . '/vendor/autoload.php';

if($_POST) {
    $name = "";
    $email = "";
    $phone = "";
    $subject = "";
    $message = "";
    $marketingYes = false;
    $date = date("Y-m-d");


    //check docs to see if I want to use htmlspecialchars instead of filter_var

    //filter input & to first letter of each word in uppercase
    if(isset($_POST['user_name'])) {
        $name = ucwords(strtolower(filter_var($_POST['user_name'], FILTER_SANITIZE_STRING)));
        $name = trim($name);
    }

    //filter input & to all lower case & has to be a valid email address format
    if(isset($_POST['user_email'])) {
        $sanitizedEmailInput = strtolower(filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL));
        if(!filter_var($sanitizedEmailInput, FILTER_VALIDATE_EMAIL) === false) {
            $email = $sanitizedEmailInput;
            $email = trim($email);
        }
    }

    //filter input. First checks for a valid British number, but will ultimately accept any number 5-20 digits in length once letters have been removed.
    if(isset($_POST['user_phone'])) {
        $sanitizedPhone = trim(filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING));
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        $editedSanitizedPhone = preg_replace("/[^0-9+ ]/", "", $sanitizedPhone); //the space before the closing ] is important so that any input spaces are retained. The + permits a plus to be used in the database format.
        //var_dump("this is the sanitised number: $sanitizedPhone"); TEST
        
        try {
            $sanitizedPhoneProto = $phoneUtil->parse($sanitizedPhone, 'GB');
            $isValid = $phoneUtil->isValidNumber($sanitizedPhoneProto);
            if($isValid === true) {
                // Produces international format
                $phone = $phoneUtil->format($sanitizedPhoneProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
                //var_dump("totally valid"); TESTING
            } else if(strlen($editedSanitizedPhone) > 5 && strlen($editedSanitizedPhone) < 20) {
                //number may still be valid, but an international number. Just need to make sure it's not malicious.
                $phone = $editedSanitizedPhone;
                //var_dump("could be valid"); TESTING
            }
            //if there's an exception I still need to check if there is any possibility the number could be valid (if an international number etc)
        } catch (\libphonenumber\NumberParseException $e) {
            if(strlen($editedSanitizedPhone) > 5 && strlen($editedSanitizedPhone) < 20) {
                $phone = $editedSanitizedPhone;
                //var_dump("exception, but could still be valid"); TESTING
            // } else {
            //     //var_dump("invalid"); TESTING
            // }
            }
        }      
    }

    //filter input & to first character of first word in uppercase
    if(isset($_POST['user_subject'])) {
        $subject = ucfirst(strtolower(filter_var($_POST['user_subject'], FILTER_SANITIZE_STRING)));
        $subject = trim($subject);
    }

    //filter input & to first character of first word in uppercase & has to be at least 5 characters
    if(isset($_POST['user_message']) && strlen($_POST['user_message']) >= 5) {
        $message = ucfirst(filter_var($_POST['user_message'], FILTER_SANITIZE_STRING));
        $message = trim($message);
    }
 
    //check if the checkbox is checked, if so the marketingYes value is updated to true
    if(isset($_POST['marketing_yes'])) {
        $marketingYes = true;
    }
    

    //if all fields are set, the information can then be validated and, if this is successful, 
    //added to the database.
    if(!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message) ) {
        $sql= "INSERT INTO enquiries (date, name, email, phone, subject, message, marketing_yes) 
        VALUES(?, ?, ?, ?, ?, ?, ?)";  

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute([$date, $name, $email, $phone, $subject, $message, $marketingYes]);
            header('Location: contact.php?status=success');
        } catch(Exception $e) {
            header('Location: contact.php?status=unsuccessful');
        }
    } else {
        header('Location: contact.php?status=unsuccessful');
    }    
}
?>



<?php



//phone
//Needs to accept numbers and some special chars only.
//min and max number of characters - use strlen

//$phone = preg_replace("^[0-9+\(\)#\.\s\/ext-]+$", "", $sanitizedPhone);
//$justNums = preg_replace("/[^0-9]/", '', $string);

