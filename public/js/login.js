window.addEventListener("load", () => {

    const loginBtn = document.querySelector(".login-btn");

    loginBtn.addEventListener("click", e => {
        const username = document.getElementById("username");
        const password = document.getElementById("password");

        (async() => {
            const response = await fetch("/login", {
                method : "POST", 
                headers : {
                    "Content-Type" : "application/x-www-form-urlencoded"
                },
                body : `username=${username.value}&password=${password.value}`
            });

            const resp = await response.json();

            if (resp.status == "success") window.open("/home", "_self");
            if (resp.status == "error") alert(resp.msg);

        })();
    })


})