const foto = document.querySelector(".container__category--foto");
const music = document.querySelector(".container__category--music");
const text = document.querySelector(".container__category--text");
const categories = document.querySelector(".container__categories");


foto.addEventListener("mouseover", () => {
    categories.innerHTML = `
    <div class="container__categories--foto">
    <ul class="categories__list">
        <li class="categories__list--item">
        <a class="p">Zdjęcia</a>
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
    loadPs();
});
// foto.addEventListener("mouseout", () => {
//     categories.innerHTML = ``;
// });


music.addEventListener("mouseover", () => {
    categories.innerHTML = `
    <div class="container__categories--music">
        <ul class="categories__list">
            <li class="categories__list--item">
                <a class="p">Muzyka</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Podkłady</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Efekty(sample)</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Słuchowiska + YT</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Reportaże + YT</a>
            </li>
        </ul>
    </div>`;
    loadPs();
});
// music.addEventListener("mouseout", () => {
//     categories.innerHTML = ``;
// });


text.addEventListener("mouseover", () => {
    categories.innerHTML = `
    <div class="container__categories--text">
        <ul class="categories__list">
            <li class="categories__list--item">
                <a class="p">Text</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Felietony</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Opowiadania</a>
            </li>
            <li class="categories__list--item">
                <a class="p">Poezja</a>
            </li>
        </ul>
    </div>`;
    loadPs();
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
