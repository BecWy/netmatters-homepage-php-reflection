//contact page event listener
const itSupportDownLink = document.querySelector("#it-support-down-link");
const itSupportDown = document.querySelector("#it-support-down");
const successMessage = document.querySelector(".success-message");
const failMessage = document.querySelector(".fail-message");
const messageP = document.querySelector(".message-p");
const errorMessages = document.querySelector(".error-messages");
const errorMessage = document.querySelectorAll(".error-message");
const errorMessageClose = document.querySelectorAll(".error-message-close");


//Page Loaded
document.addEventListener('DOMContentLoaded', () => {
    itSupportDown.style.display = "none";
    // for (let i = 0; i < errorMessage.length; i++) {
    //     errorMessage[i].style.display = "none";
    // }
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





