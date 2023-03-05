window.addEventListener("load", () => {

    const commentBtns = document.querySelectorAll(".comment-btn");
    commentBtns.forEach(btn => {
        btn.addEventListener("click", e => {

            const commentBox = e.target.previousElementSibling;
            const commentCount = e.target.closest(".card").querySelector(".comment-count");

            (async () => {
                const response = await fetch("/comment", {
                    method : "POST",
                    headers : {
                        "Content-Type" : "application/x-www-form-urlencoded"
                    },
                    body : `pid=${commentBox.getAttribute("pid")}&comment=${commentBox.value}`
                });

                const resp = await response.json();

                if (resp.status == "error") alert(resp.msg);
                if (resp.status == "success") 
                {
                    commentBox.closest(".card").querySelector(".comments").insertAdjacentHTML("beforeend", `<p>${commentBox.value}</p>`);
                    commentBox.value = "";

                    if (commentCount.innerText == "") commentCount.innerText = 1;
                    else commentCount.innerText = Number(commentCount.innerText) + 1;
                }
            })();

        })
    })

})