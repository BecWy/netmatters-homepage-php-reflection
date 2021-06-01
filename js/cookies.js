
const myStorage = window.localStorage;
const cookies = document.querySelector(".cookies");
const cookiesButton = document.querySelector("#cookies-button");
const cookiesOuter = document.querySelector(".cookies-outer-container");
const bodyCont = document.querySelector(".body-container");
const header = document.querySelector("header");


export const cookiesJS = () => {  //re-activate when switch back to the app js file after testing
//const cookiesJS = () => { // this line is for testing only

    document.addEventListener("DOMContentLoaded", ()=> {
        const cookiesSaved = localStorage.getItem('cookiesAccepted');
    
        //Checks if cookies are saved. Decides whether to display the cookies popup or not.
        if (cookiesSaved === 'yes') {
            cookiesOuter.style.display = "none"; 
            //console.log("cookies already accepted"); //for testing purposes
        } else {
            cookiesOuter.style.display = "block"; //"flex" caused issues in mobile as need the ability to scroll
            //console.log("user needs to accept cookies"); //for testing purposes
            cookiesOuter.style.overflowY = "auto";
            bodyCont.style.overflowY = "hidden"; //hide the scrollbar on the body container div (needed for IE)
        }
    });
    
    //when cookies are accepted by the user
    cookiesButton.addEventListener('click', () => {
        //accesses the current domain's local Storage object and adds a data item to it.
        myStorage.setItem('cookiesAccepted', 'yes')
        //console.log('cookies accepted'); //for testing purposes
        //hides the popup
        cookies.style.display = "none";
        cookiesOuter.style.overflowY = "hidden";
        cookiesOuter.style.display = "none";  
        bodyCont.style.overflowY = "scroll"; //show the scrollbar on the body container div when the popup closes
        
        //for internet explorer
        //check if the browser is Internet Explorer
        let ua = window.navigator.userAgent;
        let isIE = /MSIE|Trident/.test(ua);
        let internetExplorer = false;
        
        if ( isIE ) {
            internetExplorer = true;
        } else {
            internetExplorer = false;
        }

        if(internetExplorer === true) {
            let bodyContWidth = document.querySelector(".body-container").clientWidth; //get the value each time
            //console.log(`The body cont width is ${bodyContWidth}`);
            header.style.width = `${bodyContWidth}px`; //makes sure the header is the correct width and always the same width as the body if set to position:fixed (for IE sticky header settings)
        }
    });
}

//cookiesJS(); for when testing this as a separate file