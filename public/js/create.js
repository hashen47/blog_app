window.addEventListener("load", () => {

    // create a post
    const titleErr = document.querySelector(".title-err");
    const contentErr = document.querySelector(".content-err");
    const createBtn = document.getElementById("create-btn");

    createBtn.addEventListener("click", e => {

        clearErr(); // clear previous all errors

        (async () => {

            const title = document.getElementById("title");
            const content = document.getElementById("content");  


            const response = await fetch("/create", {
                method : "POST", 
                headers : {
                    "Content-Type" : "application/x-www-form-urlencoded"
                },
                body : `title=${title.value}&content=${content.value}`
            });


            const resp = await response.json();


            if (resp.status == "success")
            {
                alert(resp.msg);
                title.value = "";
                content.value = "";
            }


            if (resp.status == "error")
            {
                if (resp.msg.hasOwnProperty("title")) 
                    titleErr.innerText = resp.msg.title;
                    
                if (resp.msg.hasOwnProperty("content")) 
                    contentErr.innerText = resp.msg.content;
            }
            
        })();
    })


    // remove the error messages
    function clearErr(title=true, content=true)
    {
        if (title) titleErr.innerText = "";
        if (content) contentErr.innerText = "";
    }


    document.getElementById("title").addEventListener("focus", () => clearErr(title=true, content=false));
    document.getElementById("content").addEventListener("focus", () => clearErr(title=false, content=true));

})
