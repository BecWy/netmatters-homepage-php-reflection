//This file imports all of my other JS files
//jQuery and plugins are separate to avoid any potential conflicts/issues.

import { cookiesJS } from "./cookies.js"
import { searchbarJS } from "./searchbar.js"
import { stickyHeader } from "./sticky-header.js"
import { burgerMenuJS } from "./burger-menu.js"

const app = () => {
    burgerMenuJS();
    cookiesJS();
    stickyHeader();
    searchbarJS();
    slickSettings();
}

const slickSettings = () => { 
    $('.slides').slick({
        fade: false,
        autoplay: true,
        autoplaySpeed: 3000,
        arrows: false,
        dots: true,
        pauseOnFocus: false       
    });
}

app();
