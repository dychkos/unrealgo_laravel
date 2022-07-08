/*
* Nodes
* */

let sort = document.querySelector('.sort');
let navigation = document.querySelector('.navigation__mobile');
let confirmSortForm = document.getElementById("confirm_sort");


/*
* Event listeners
* */
sort.addEventListener('click',(event) => {
    let sortBody = sort.querySelector('.sort__body');

    let hider = new Hider(".sort", ()=>{
        $(sortBody).removeClass("active");
    });

    if(event.target.classList.contains("sort__item")){
        let order = event.target.dataset.order;
        let chosenOrderNode = document.getElementById("chosen-order");
        chosenOrderNode.value = order;
        confirmSortForm.submit();
        return;
    }

    if (sortBody.classList.contains("active")) {
        $(sortBody).removeClass("active");
        document.removeEventListener('click', hider.hide);
    } else {
        $(sortBody).addClass("active");
        document.addEventListener('click', hider.hide);
    }
});

navigation.addEventListener("click",() => {
    let navBody = document.querySelector(".navigation__body");

    let hider = new Hider(".navigation__active",()=>{
        $(".navigation__body").removeClass("active");
    });

    if(navBody.classList.contains("active")){
        navBody.classList.remove("active");
        document.removeEventListener('mouseup',hider.hide);
    }else{
        navBody.classList.add("active");
        document.addEventListener('mouseup',hider.hide);
    }
})

