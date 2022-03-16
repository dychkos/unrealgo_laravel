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
})

likesBtn.forEach(likeBtn => {
    likeBtn.addEventListener('click', () => {
        let isAnswer = likeBtn.dataset.like === "answer";

        console.log('click');

        let formData = new FormData();
        isAnswer && formData.append("isAnswer", "true");
        formData.append("_token", csrfToken);

        fetch(likeUrl,{
            method: "POST",
            body: formData
        }).then(response=>{
            if (!response.ok && response.status === 404){
                console.log("Like error")
            }else {
                response.json().then(
                   result => console.log(result)
                )
            }
        }).catch(error => console.log(error));
    })
})
