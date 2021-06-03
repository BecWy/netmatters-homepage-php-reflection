//contact page event listener
const itSupportDownLink = document.querySelector("#it-support-down-link");
const itSupportDown = document.querySelector("#it-support-down");
const successMessage = document.querySelector(".success-message");
const failMessage = document.querySelector(".fail-message");
const messageP = document.querySelector(".message-p");

document.addEventListener('DOMContentLoaded', () => {
    itSupportDown.style.display = "none";
})


itSupportDownLink.addEventListener('click', ()=> {
    if (itSupportDown.style.display == "block") {
        itSupportDown.style.display = "none";
        console.log("hide");
    } else if(itSupportDown.style.display == "none") {
        itSupportDown.style.display = "block";
        console.log("display");
    } 
})