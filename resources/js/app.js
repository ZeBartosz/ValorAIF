import './bootstrap';

// Define the function globally by attaching it to the window object
window.openTable = function (evt, tableName) {
    // Hide all tables
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("table-content");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].classList.remove("active");
    }

    // Remove active class from all tab buttons
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current table and activate the corresponding tab
    document.getElementById(tableName).classList.add("active");
    evt.currentTarget.className += " active";
};

function searchByCatagory() {
    
    var search = document.getElementById("search");
    var searchCatagory = document.getElementById("catagoryInput");
    var searchByCatagory = searchCatagory.firstChild.data
    console.log(searchCatagory)
    search.setAttribute("value", searchByCatagory);
    document.getElementById("searchSubmit").click();

};

document.getElementById("searchCatagory").addEventListener("click", searchByCatagory);
