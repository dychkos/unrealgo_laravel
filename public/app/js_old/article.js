/*
* Nodes
* */




/*
* Event listeners
* */
window.addEventListener("load",()=>{
    let chosenNav = document.querySelector(".chosen");
    $([chosenNav.parentElement]).animate({ scrollTop: ($(".chosen").offset().top - 400)}, 500);
    chosenNav.parentElement.parentElement.classList.add("open");
});



