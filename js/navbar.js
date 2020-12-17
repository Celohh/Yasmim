var search = document.getElementById("nav-search_button");
var search_input = document.getElementById("nav_search-input");
var button = document.getElementById("navbar-toggler");
var navbar_collapse = document.getElementById("navbarNavAltMarkup");

button.addEventListener("click", openmenu);
search.addEventListener("click", searchtext);

function openmenu() {
    console.log("ho");
	if (navbar_collapse.style.display == "block") {
		navbar_collapse.style.display = "none";
	}
	else {
		navbar_collapse.style.display = "block"
	}
}

function searchtext() {
    console.log("hu");
    location.replace("./?search="+search_input.value);
}
