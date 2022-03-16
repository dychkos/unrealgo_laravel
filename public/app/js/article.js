/*
* Nodes
* */

let addAnswerButtons = document.querySelectorAll('.to-add-comment');
let needFocusNode = document.querySelector('.add-comment__body textarea');
let formAnswerInput = document.querySelector('#answer_for');
let likesBtn = document.querySelectorAll('.likeable');



/*
* Event listeners
* */
window.addEventListener("load",()=>{
    let chosenNav = document.querySelector(".chosen");
    $([chosenNav.parentElement]).animate({ scrollTop: ($(".chosen").offset().top - 400)}, 500);
    chosenNav.parentElement.parentElement.classList.add("open");
});

addAnswerButtons.forEach(button => {
   button.addEventListener('click', () => {
       let answerID = button.dataset.comment;
       let answerFor = button.dataset.answerfor;
       if(answerID) {
           formAnswerInput.value = answerID;
           needFocusNode.value = '@' + answerFor + ' ';
       }
       needFocusNode.focus();
   })
});


likesBtn.forEach(likeBtn => {
    likeBtn.addEventListener('click', () => {
        let isAnswer = likeBtn.dataset.like === "answer";

        let modelID = likeBtn.nextElementSibling.dataset.comment;

        console.log('click', modelID);

        let formData = new FormData();
        isAnswer && formData.append("isAnswer", "true");
        formData.append("_token", csrfToken);
        formData.append("model", modelID);

        fetch(likeUrl,{
            method: "POST",
            body: formData
        }).then(response=>{
            if (!response.ok && response.status === 404){
                console.log("Like error")
            }else {
                response.json().then(
                    result => {
                        likeBtn.textContent = result.data.likes + " Нравится";
                    }
                )
            }
        }).catch(error => console.log(error));
    })
})
