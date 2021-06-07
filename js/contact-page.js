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
    let isPhoneValid = true; //assume true intitially when clicked, then if the phone fails validation this changes to false.
    if(phoneInput.value !== "") {
        const phoneUtil = require('google-libphonenumber').PhoneNumberUtil.getInstance();
        if(!phoneUtil.isValidNumberForRegion(phoneUtil.parse(phoneInput.value, 'GB'), 'GB')) {
            event.preventDefault(); 
            errorMessagePhone.style.display = "flex";
            isPhoneValid = false;
        } else {
            errorMessagePhone.style.display = "none";
            isPhoneValid = true;
        }
    }


    //add a red border to all empty/ invalid fields
    if(nameInput.value === "") {
        nameInput.style.border = "1px solid red";
    } else {
        nameInput.style.border = "1px solid #ccc";
    }
    if(emailInput.value === "" || emailInput.checkValidity() === false) {
        //console.log("the email is not valid");
        emailInput.style.border = "1px solid red";
    } else {
        emailInput.style.border = "1px solid #ccc";
    }
    if(phoneInput.value === "" || isPhoneValid === false) {
        phoneInput.style.border = "1px solid red";
    } else {
        phoneInput.style.border = "1px solid #ccc";
    }
    if(subjectInput.value === "") {
        subjectInput.style.border = "1px solid red";
    } else {
        subjectInput.style.border = "1px solid #ccc";
    }
    if(messageInput.value === "" || messageInput.value.length < 5) {
        messageInput.style.border = "1px solid red";
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
