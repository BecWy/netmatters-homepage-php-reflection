//the related css can be found in js.scss, under Search bar toggle

const searchBar = document.querySelector("#search-bar");
const searchButton = document.querySelector("#submit");
const searchInput = document.querySelector("#search-bar-input");
const supportButton = document.querySelector("#support-button");
const contactButton = document.querySelector("#contact-button");


export const searchbarJS = () => { //re-activate when switch back to the app js file after testing
//const searchbarJS = () => {    // this line is for testing only
    searchButton.addEventListener('click', () => {
        searchToggle()
    })
    
     const searchToggle = () => {
        supportButton.classList.toggle("toggle-visible"); //transition
        contactButton.classList.toggle("toggle-visible"); //transition
        searchInput.classList.toggle("toggle-visible") //transition

        setTimeout(function(){ 
            supportButton.classList.toggle("toggle-hide"); //displays/hides the button
            contactButton.classList.toggle("toggle-hide"); //displays/hides the button
            searchBar.classList.toggle("toggle-search-width"); //expands/reduces the width of the searchbar container 
            searchInput.classList.toggle("toggle-hide") //displays/hides the search input 
        }, 400);
        
    }
}

//searchbarJS(); for testing purposes only - this breaks it if it's set to export.

