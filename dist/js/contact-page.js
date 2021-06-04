/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
//contact page event listener
var itSupportDownLink = document.querySelector("#it-support-down-link");
var itSupportDown = document.querySelector("#it-support-down");
var successMessage = document.querySelector(".success-message");
var failMessage = document.querySelector(".fail-message");
var messageP = document.querySelector(".message-p");
document.addEventListener('DOMContentLoaded', function () {
  itSupportDown.style.display = "none";
});
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
});
/******/ })()
;