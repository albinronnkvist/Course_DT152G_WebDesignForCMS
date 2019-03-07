/*
// Sidemenu
// Author: Albin Rönnkvist
*/

// Open menu
function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
}

// Close menu
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}


// Accesability
// Make all <a>-tags focusable (for people who use tab to navigate the page)
var divs = document.getElementsByTagName('a');
for (var i = 0, len = divs.length; i < len; i++){
    divs[i].setAttribute('tabindex', '0');
}

// Open menu with Enter-button (for people who use tab and enter to navigate the page)
document.getElementById("menuclick")
    .addEventListener("keyup", function(event) {
    event.preventDefault();
    if (event.keyCode === 13) {
        document.getElementById("menuclick").click();
    }
});