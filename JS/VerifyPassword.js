{
    const verifypassword=()=>{
        const password = document.querySelector(".password");
        const repeatedpassword = document.querySelector(".repeatedpassword");
        console.log(password);
        console.log(repeatedpassword);
        repeatedpassword.addEventListener("input",()=>{
            if(repeatedpassword.value!==password.value)
            {
                console.log("Różne hasła!");
            }
            else{
                console.log("Hasła identyczne!");
            }
        });

    }
    const init=()=>{
        verifypassword();
    };
    init();
}