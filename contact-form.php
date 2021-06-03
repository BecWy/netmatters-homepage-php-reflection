<?php 

require_once("./database.php");

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

    //filter input & to all lower case  - need additional criteria here or in JS
    if(isset($_POST['user_email'])) {
        $email = strtolower(filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL));
    }

    //filter input - need additional criteria here or in JS. 
    //Remove spaces? If I want to do this can use trim.
    if(isset($_POST['user_phone'])) {
        $phone = filter_var($_POST['user_phone'], FILTER_SANITIZE_STRING);
    }

    //filter input & to first character of first word in uppercase
    if(isset($_POST['user_subject'])) {
        $subject = ucfirst(strtolower(filter_var($_POST['user_subject'], FILTER_SANITIZE_STRING)));
    }

    //filter input & to first character of first word in uppercase
    if(isset($_POST['user_message'])) {
        $message = ucfirst(filter_var($_POST['user_message'], FILTER_SANITIZE_STRING));
    }
 
    //check if the checkbox is checked, if so the marketingYes value is updated to true
    if(isset($_POST['marketing_yes'])) {
        $marketingYes = true;
    }
    
 
    $sql= "INSERT INTO enquiries (date, name, email, phone, subject, message, marketing_yes) 
    VALUES(?, ?, ?, ?, ?, ?, ?)";  

    try {
        $stmt = $db->prepare($sql);
        $stmt->execute([$date, $name, $email, $phone, $subject, $message, $marketingYes]);
        header('Location: contact.php?status=success');
    } catch(Exception $e) {
        $success = "no";
        //echo $success;
        header('Location: contact.php?status=unsuccessful');
    }
}


//validation settings to add (before filtering)
// Validate e-mail
// if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
//     echo("$email is a valid email address");
//   } else {
//     echo("$email is not a valid email address");
//   }

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


?>

 


