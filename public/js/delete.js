window.addEventListener("load", () => {

    
    const deleteBtns = document.querySelectorAll(".delete"); 

    deleteBtns.forEach(btn => {
        btn.addEventListener("click", e => {

            if (!window.confirm("Do you want to delete this post? ")) return;

            const pid = e.target.getAttribute("pid");
            (async() => {
                
                const response = await fetch("/delete", {
                    method : "DELETE", 
                    headers : {
                        "Content-Type" : "application/x-www-form-urlencoded"
                    },
                    body : `pid=${pid}`
                });

                const resp = await response.json();
                
                if (resp.status == "success")
                {
                    alert(resp.msg);
                    e.target.closest(".card").remove();
                }

            })();

        });
    });


})
