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
    }

    //filter input & to all lower case & has to be a valid email address format
    if(isset($_POST['user_email'])) {
        $sanitizedEmailInput = strtolower(filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL));
        if(!filter_var($sanitizedEmailInput, FILTER_VALIDATE_EMAIL) === false) {
            $email = $sanitizedEmailInput;
        }
    }

    //filter input - need additional criteria here or in JS. 
    //Remove spaces? If I want to do this can use trim.
    if(isset($_POST['user_phone'])) {
        $sanitizedPhone = filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING);
        $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
        //var_dump("this is the sanitised number: $sanitizedPhone");
        
        try {
            $sanitizedPhoneProto = $phoneUtil->parse($sanitizedPhone, 'GB');
            //var_dump($sanitizedPhoneProto);
            $isValid = $phoneUtil->isValidNumber($sanitizedPhoneProto);
            //var_dump($isValid);
            if($isValid === true) {
                // Produces format "044 668 18 00"
                $phone = $phoneUtil->format($sanitizedPhoneProto, \libphonenumber\PhoneNumberFormat::INTERNATIONAL);
            }
        } catch (\libphonenumber\NumberParseException $e) {
            var_dump($e);
        }
    }

    //filter input & to first character of first word in uppercase
    if(isset($_POST['user_subject'])) {
        $subject = ucfirst(strtolower(filter_var($_POST['user_subject'], FILTER_SANITIZE_STRING)));
    }

    //filter input & to first character of first word in uppercase & has to be at least 5 characters
    if(isset($_POST['user_message']) && strlen($_POST['user_message']) >= 5) {
        $message = ucfirst(filter_var($_POST['user_message'], FILTER_SANITIZE_STRING));
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


//phone
//Needs to accept numbers and special chars only.
//min and max number of characters
// Use strlen to validate the field lengths.

//$phone = preg_replace('^[0-9+\(\)#\.\s\/ext-]+$');




// $phone = '000-0000-0000';

// if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
//   // $phone is valid
// }

//eliminate every char except 0-9
//$justNums = preg_replace("/[^0-9]/", '', $string);
//Better option... just strip all non-digit characters on input (except 'x' and leading '+' signs)
//also allow brackets

// If you just want to verify you don't have random garbage in the field (i.e., from form spammers) this regex should do nicely:
//this finds any character that is NOT between the brackets
//     ^[0-9+\(\)#\.\s\/ext-]+$
