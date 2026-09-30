window.addEventListener("DOMContentLoaded",(event) => {
    console.log("DOM entièrement chargé et analysé");
    setTimeout(function() {
         document.getElementById("loader").style.top = "-100vh";
    }, 1000)

    inputs = document.querySelectorAll("input:not(input[type=\"submit\"]), textarea");

    inputs.forEach(e => {
        e.addEventListener("click",function () {
            inputs.forEach(e => {
                e.style.borderBottom = "2px solid #FF7E7E";
            });
            e.style.borderBottom = "2px solid black";
        })
    })
   
});

const burger = document.getElementById("burger");
const menuList = document.getElementById("menu-list");

burger.addEventListener("click", () => {
    menuList.classList.toggle("active");
});
window.addEventListener("load", () => {
    document.getElementById("loader").style.top = "-100%";
});