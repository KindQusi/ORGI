const foto = document.querySelector(".container__category--foto");
const music = document.querySelector(".container__category--music");
const text = document.querySelector(".container__category--text");
const categories = document.querySelector(".container__categories");
let lastMouseOverCategories;


foto.addEventListener("mouseover", () => {
    if (lastMouseOverCategories !== 'foto') {
        categories.classList.add("container__categories--active");
        categories.innerHTML = `
    <div class="container__categories--foto">
    <ul class="categories__list">
        <li class="categories__list--item">
        <input class="sendCategory" type="submit" name="sendCategory" value="Zdjęcia">
        </li>
        <li class="categories__list--item">
            Tag2
        </li>
        <li class="categories__list--item">
            Tag3
        </li>
        <li class="categories__list--item">
            Tag4
        </li>
    </ul>
</div>`;
        lastMouseOverCategories = 'foto';
        loadPs();
        console.log("mouseover, foto");
    }
    else{
        console.log("mouseover, but again");
    }
});
// foto.addEventListener("mouseout", () => {
//     categories.innerHTML = ``;
// });


music.addEventListener("mouseover", () => {
    if (lastMouseOverCategories !== 'music') {
        categories.classList.add("container__categories--active");
        categories.innerHTML = `
    <div class="container__categories--music">
        <ul class="categories__list">
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Podkłady">
            </li>
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Efekty">
            </li>
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Słuchowiska">
            </li>
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Reportaże">
            </li>
        </ul>
    </div>`;
        lastMouseOverCategories = 'music';
        loadPs();
        console.log("mouseover, music");
    }
    
    else{categories.style.background="transparent";
        console.log("mouseover, but again");
    }
});
// music.addEventListener("mouseout", () => {
//     // categories.innerHTML = ``;
//     categories.classList.remove("container__categories--active");
// });


text.addEventListener("mouseover", () => {
    if (lastMouseOverCategories !== 'text') {
        categories.classList.add("container__categories--active");
        categories.innerHTML = `
    <div class="container__categories--text">
        <ul class="categories__list">
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Felietony">
            </li>
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Opowiadania">
            </li>
            <li class="categories__list--item">
                <input class="sendCategory" type="submit" name="sendCategory" value="Poezja">
            </li>
        </ul>
    </div>`;
        lastMouseOverCategories = 'text';
        loadPs();
        console.log("mouseover, text");
    }
    else{
        console.log("mouseover, but again");
    }
});

// text.addEventListener("mouseout", () => {
//     categories.innerHTML = ``;
// });

const loadPs = ("", () => {
    const SendValues = document.querySelectorAll(".p");
    for (const SValue of SendValues) {
        SValue.addEventListener("click", () => {
            SetCategoryInForm(SValue.innerHTML)
        });
    }
});
const SetCategoryInForm = ("", (e) => {
    const sendCategory = document.querySelector(".sendCategory");
    sendCategory.value = `${e}`;
    console.log(e.target, "klik");
    console.log(sendCategory.value);
});
