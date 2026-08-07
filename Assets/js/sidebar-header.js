// =====   EduVerse Sidebar + Header + hero Javascript ===========


// Select Elements
const menuBtn = document.getElementById("menuBtn");
const sidebar = document.querySelector(".sidebar");
const menuItems = document.querySelectorAll(".menu li");
const mainContent = document.querySelector(".main-content");
const header = document.querySelector(".header");

// sidebar collapse / Expand
    menuBtn.addEventListener ("click", () => {
    sidebar.classList.toggle("collapsed");
    mainContent.classList.toggle("expanded");
    header.classList.toggle("expanded");

   // Save sidebar state
    if(sidebar.classList.contains("collapsed")){
        localStorage.setItem("sidebar", "collapsed");
    }
    else{
        localStorage.setItem("sidebar", "expanded");
    }
});

// Restore sidebar
window.addEventListener("load", () => {

    if(localStorage.getItem("sidebar") === "collapsed"){

        sidebar.classList.add("collapsed");
         header.classList.add("expanded");
        header.classList.add("expanded");

    }

});

// Active Menu

menuItems.forEach(item=>{

    item.addEventListener("click",()=>{

        menuItems.forEach(i => i.classList.remove("active"));

        item.classList.add("active");

    });

});
