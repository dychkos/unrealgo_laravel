let acc = document.getElementsByClassName("closebtn");
let i;

for (i = 0; i < acc.length; i++) {
    acc[i].onclick = function(){
        let div = this.parentElement;
        div.style.opacity = "0";
        setTimeout(function(){ div.style.display = "none"; }, 600);
    }
}
