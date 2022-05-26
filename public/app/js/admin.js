/*
* Nodes
* */
let openMenuBtn = document.querySelector('.admin-burger');
let menuNav = document.querySelector('.admin-navbar');
let navItems = document.querySelectorAll('.admin-navbar__title');
let mainGrid = document.querySelector('.admin-body');

/*
* Listeners
* */
openMenuBtn.addEventListener('click', () => {
    openMenuBtn.classList.toggle('open');
    menuNav.classList.toggle('open');
    mainGrid.classList.toggle('active');
    $(navItems).fadeToggle('open');
})

document.getElementById('file_input').addEventListener("change",function (e) {
    let files = this.files;
    let fileNames = "";

    for (const file of files) {
        fileNames += `<span>${file.name}</span>`;
    }


    let fileLabel = document.querySelector(".file-input__files");
    if (files.length >= 2) {
        fileLabel.innerHTML  = fileNames;
    } else {
        fileLabel.textContent = e.target.value.split("\\").pop();
    }
});

