/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
//contact page event listener
var itSupportDownLink = document.querySelector("#it-support-down-link");
var itSupportDown = document.querySelector("#it-support-down");
var errorMessages = document.querySelector(".error-messages");
var errorMessage = document.querySelectorAll(".error-message");
var errorMessageClose = document.querySelectorAll(".error-message-close"); //Page Loaded

document.addEventListener('DOMContentLoaded', function () {
  itSupportDown.style.display = "none"; //REACTIVATE THE BELOW ONCE ALL VALIDATION ADDED AND TESTED
  // for (let i = 0; i < errorMessage.length; i++) {
  //     errorMessage[i].style.display = "none";
  // }
}); //Additional IT contact info

itSupportDownLink.addEventListener('click', function () {
  if (itSupportDown.style.display == "block") {
    itSupportDown.style.display = "none";
    itSupportDownLink.style.textDecoration = "none";
    console.log("hide");
  } else if (itSupportDown.style.display == "none") {
    itSupportDown.style.display = "block";
    console.log("display");
    itSupportDownLink.style.textDecoration = "underline";
  }
}); //Closing an error message
//add the listener to a parent element that uses querySelector instead of querySelectorAll so I don't have to loop through and add and event listener to every instance of the class.

errorMessages.addEventListener('click', function (e) {
  if (e.target.classList.contains("error-message-close")) {
    e.target.parentElement.style.display = "none";
  }
}); //Preventing required field html popup messages for invalid field

var nameInput = document.querySelector("#name");
var emailInput = document.querySelector("#email");
var phoneInput = document.querySelector("#phone");
var subjectInput = document.querySelector("#subject");
var messageInput = document.querySelector("#message");
nameInput.addEventListener("invalid", function (event) {
  event.preventDefault();
});
emailInput.addEventListener("invalid", function (event) {
  event.preventDefault(); //emailInput.classList.add("invalid");
});
phoneInput.addEventListener("invalid", function (event) {
  event.preventDefault();
});
subjectInput.addEventListener("invalid", function (event) {
  event.preventDefault();
});
messageInput.addEventListener("invalid", function (event) {
  event.preventDefault();
}); //when submit button is clicked

var submitButton = document.querySelector("#submit-button");
submitButton.addEventListener("click", function (e) {
  //add a red border to all empty/ invalid fields
  if (nameInput.value === "") {
    nameInput.style.border = "1px solid red";
  } else {
    nameInput.style.border = "1px solid #ccc";
  }

  if (emailInput.value === "" || emailInput.checkValidity() === false) {
    console.log("the email is not valid");
    emailInput.style.border = "1px solid red";
  } else {
    emailInput.style.border = "1px solid #ccc";
  }

  if (phoneInput.value === "") {
    phoneInput.style.border = "1px solid red";
  } else {
    phoneInput.style.border = "1px solid #ccc";
  }

  if (subjectInput.value === "") {
    subjectInput.style.border = "1px solid red";
  } else {
    subjectInput.style.border = "1px solid #ccc";
  }

  if (messageInput.value === "") {
    messageInput.style.border = "1px solid red";
  } else {
    messageInput.style.border = "1px solid #ccc";
  } //add focus to the first empty/invalid field


  if (nameInput.value === "") {
    nameInput.focus();
  } else if (emailInput.value === "" || emailInput.checkValidity() === false) {
    //emailInput.classList.contains("invalid")
    emailInput.focus();
  } else if (phoneInput.value === "") {
    phoneInput.focus();
  } else if (subjectInput.value === "") {
    subjectInput.focus();
  } else if (messageInput.value === "") {
    messageInput.focus();
  }
}); // document.addEventListener("invalid", ( () => {
//     return function (e) {
//         e.preventDefault();
//         console.log("prevented");
//         let name = document.querySelector("#name");
//       if(name === "") {
//         console.log("focus!!");
//         name.focus(); 
//         name.style.outline = "red";
//         name.style.border = "1px solid red";
//       }
//     };
//   })(), true);
// document.addEventListener("invalid", (e) => {
//     e.preventDefault();
//     console.log("prevented");
//     let name = document.querySelector("#name");
//     if(name === "") {
//         console.log("focus!!");
//         name.focus(); 
//         name.style.outline = "red";
//         name.style.border = "1px solid red";
//     }
// })

/* <script>
document.getElementById("myInput").addEventListener("invalid", myFunction);

function myFunction() {
  alert("Must contain 6 or more characters");
}
</script> */
/******/ })()
;