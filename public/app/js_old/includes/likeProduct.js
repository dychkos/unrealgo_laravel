let likesBtn = document.querySelectorAll(".product__like");

likesBtn.forEach(likeBtn => {
    likeBtn.addEventListener('click', (e) => {
        e.preventDefault();

        console.log("likeProductURL", likeProductURL);

        let formData = new FormData();
        let productId = likeBtn.dataset.product;

        formData.append("_token", csrfToken);
        formData.append("product_id", productId);

        fetch(likeProductURL,{
            method: "POST",
            body: formData
        }).then(response=>{
            if(response.redirected){
                window.location.href = baseURL + "/login";
            }
            if (!response.ok && response.status === 404){
                console.log("Like error")
            }else {
                response.json().then(
                    () => {
                        likeBtn.classList.toggle("like_liked");
                    }
                )
            }
        }).catch(error => console.log(error));
    })
})
