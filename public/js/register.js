window.addEventListener("load", () => {


    const registerBtn = document.getElementById("register-btn");
    registerBtn.addEventListener("click", e => {
        

        (async () => {

            const username = document.getElementById("username");
            const password = document.getElementById("password");
            const repassword = document.getElementById("re-password");

            const response = await fetch("/register", {
                method : "POST",
                headers : {
                    "Content-Type" : "application/x-www-form-urlencoded"
                },
                body : `username=${username.value}&password=${password.value}&repassword=${repassword.value}`
            })

            const resp = await response.json();

            if (resp.status == "success" || resp.status == "error") alert(resp.msg);
            if (resp.status == "success") window.location.reload();
                
        })();

    });


})
