//contact page event listener
const itSupportDownLink = document.querySelector("#it-support-down-link");
const itSupportDown = document.querySelector("#it-support-down");
const errorMessages = document.querySelector(".error-messages");
const errorMessage = document.querySelectorAll(".error-message");
const errorMessageClose = document.querySelectorAll(".error-message-close");
const errorMessagePhone = document.querySelector(".error-message-phone");
const errorMessageMessage = document.querySelector(".error-message-message");


//Page Loaded
document.addEventListener('DOMContentLoaded', () => {
    itSupportDown.style.display = "none";
    //REACTIVATE THE BELOW ONCE ALL VALIDATION ADDED AND TESTED
    for (let i = 0; i < errorMessage.length; i++) {
        errorMessage[i].style.display = "none";
    }
})


//Additional IT contact info
itSupportDownLink.addEventListener('click', ()=> {
    if (itSupportDown.style.display == "block") {
        itSupportDown.style.display = "none";
        itSupportDownLink.style.textDecoration = "none";
        console.log("hide");
    } else if(itSupportDown.style.display == "none") {
        itSupportDown.style.display = "block";
        console.log("display");
        itSupportDownLink.style.textDecoration = "underline";
    } 
})

//Closing an error message
//add the listener to a parent element that uses querySelector instead of querySelectorAll so I don't have to loop through and add and event listener to every instance of the class.
errorMessages.addEventListener('click', (e) => {
    if (e.target.classList.contains("error-message-close")) {
        e.target.parentElement.style.display = "none";
    }
});

//Preventing required field html popup messages for invalid field
const nameInput = document.querySelector("#name");
const emailInput = document.querySelector("#email");
const phoneInput = document.querySelector("#phone");
const subjectInput = document.querySelector("#subject");
const messageInput = document.querySelector("#message");


//Form input event listeners (need to refactor these)
nameInput.addEventListener("invalid", function( event ) {
    event.preventDefault();
});

emailInput.addEventListener("invalid", function( event ) {
    event.preventDefault();
});

phoneInput.addEventListener("invalid", function( event ) {
    event.preventDefault();
});

subjectInput.addEventListener("invalid", function( event ) {
    event.preventDefault();
});

messageInput.addEventListener("invalid", function( event ) {
    event.preventDefault();
});

//when submit button is clicked
const submitButton = document.querySelector("#submit-button");
submitButton.addEventListener( "click", (event)=> {
    //prevent the form from submitting if the message is not valid
    if(messageInput.value !== "") {
        if(messageInput.value.length < 5) {
            event.preventDefault(); 
            errorMessageMessage.style.display = "flex";
        } else {
            errorMessageMessage.style.display = "none ";
        }
    }

    //prevent the form from submitting if the phone number is not valid
    let isPhoneValid = false; //assume false intitially when clicked, then if the phone fails validation this changes to false.
    if(phoneInput.value !== "") {
        let phoneString = phoneInput.value.replace(/[^\d\+]/g,""); //remove characters that shouldn't be pesent in a phone number
        //console.log(phoneString); test

        const phoneUtil = require('google-libphonenumber').PhoneNumberUtil.getInstance();
        
        //check if the number can be identified as a UK number.
        try {
            //was a not statement with '!' in front of phoneUtil at the start of the statement.
            if(phoneUtil.isValidNumberForRegion(phoneUtil.parse(phoneInput.value, 'GB'), 'GB')) {
                isPhoneValid = true;
                errorMessagePhone.style.display = "none";
                console.log("if one"); 

            //if the number could still be valid (i.e. international)
            } else if (phoneString.length > 5 && phoneString.length < 20) {
                isPhoneValid = true;
                errorMessagePhone.style.display = "none";
                console.log("if five"); 
            }
            
            //if an error is not thrown, but the number has been identified as invalid
            else {
                event.preventDefault(); 
                errorMessagePhone.style.display = "flex";
                isPhoneValid = false;
                console.log("if four"); 
            }
        } 
        // if an error is thrown, check if the number could still possibly be a valid number (i.e. an international number).
        catch {
            //check the string with any extra characters removed to see if the number could still be valid
            if (phoneString.length > 5 && phoneString.length < 20) {
                isPhoneValid = true;
                errorMessagePhone.style.display = "none";
                console.log("if two"); 

            //if the number is not valid
            } else { 
                event.preventDefault(); 
                errorMessagePhone.style.display = "flex";
                isPhoneValid = false;
                console.log("if three"); 
            }
        }
    }    


    //add a red border to all empty/ invalid fields
    if(nameInput.value === "") {
        nameInput.style.border = "1px solid #d64541";
    } else {
        nameInput.style.border = "1px solid #ccc";
    }
    if(emailInput.value === "" || emailInput.checkValidity() === false) {
        //console.log("the email is not valid");
        emailInput.style.border = "1px solid #d64541";
    } else {
        emailInput.style.border = "1px solid #ccc";
    }
    if(phoneInput.value === "" || isPhoneValid === false) {
        phoneInput.style.border = "1px solid #d64541";
    } else {
        phoneInput.style.border = "1px solid #ccc";
    }
    if(subjectInput.value === "") {
        subjectInput.style.border = "1px solid #d64541";
    } else {
        subjectInput.style.border = "1px solid #ccc";
    }
    if(messageInput.value === "" || messageInput.value.length < 5) {
        messageInput.style.border = "1px solid #d64541";
    } else {
        messageInput.style.border = "1px solid #ccc";
    }

    //add focus to the first empty/invalid field
    if(nameInput.value === "") {
        nameInput.focus(); 
    } else if(emailInput.value === "" || emailInput.checkValidity() === false) { 
        emailInput.focus(); 
    } else if(phoneInput.value === "" || isPhoneValid === false) {
        phoneInput.focus(); 
    } else if(subjectInput.value === "") {
        subjectInput.focus(); 
    } else if(messageInput.value === "" || messageInput.value.length < 5) {
        messageInput.focus(); 
    }
})
