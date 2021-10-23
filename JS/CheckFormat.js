{
    //główna część
    const newfile = document.querySelector(".addedfile");
    const addtagsbtn = document.querySelector(".addtagsbtn");
    let setform = document.querySelector(".formtype");

    setform.addEventListener("change",()=>{
        
    });

    const fileSize = ("", () => {
        var fileSize = document.getElementById('file').files[0].size;
        return fileSize;
    });

    newfile.addEventListener("change", (e) => {
        formatCheck(e);
    });


    let tagstable = [];
    const maxtags = 6;
    let currenttags = 0;

    addtagsbtn.addEventListener("click", () => {
        if (currenttags < maxtags && currenttags >= 0) {
            const newTag = document.querySelector(".addtags").value;
            if (newTag === "") {
                document.querySelector(".addtags").focus();
                return;
            }
            AddNewTag(newTag);
            currenttags++;
            document.querySelector(".addtags").value = null;
        }
    });


    const Render = () => {
        let htmlString = "";
        let i = 0;
        for (const tag of tagstable) {
            htmlString += `<li class="tagitem"><input name="tag${i}" class="tag" value="${tag.content}"}><button class="js-remove">X</button></li>`;
            i++
        }
        document.querySelector(".tagslist").innerHTML = htmlString;

        const removeButtons = document.querySelectorAll(".js-remove");
        removeButtons.forEach((removeButton, index) => {
            removeButton.addEventListener("click", () => {
                tagstable.splice(index, 1);
                currenttags--;
                Render();
            })
        });

    };
    //dodawanie tagu
    const AddNewTag = (newTag) => {
        tagstable.push({
            content: newTag,
        })
        Render();
    };
    // dodawanie zdjęcia
    const addimg = (e) => {

        // let addedimg=document.querySelector(".addedfile__img");
        // //addedimg.style.backgroundImage=`url('${fullPath}')`
        // addedimg.src=fullPath;
        var image = document.querySelector('.addedfile__img');
        if (e === undefined) {
            return alert("Jakiś błąd :(");
        }
        else if (e === 1) {
            image.src = `../Photos/Musicimg.jpg`;
        }
        else if (e === 2) {
            image.src = `../Photos/Textimg.png`;
        }
        else {
            image.src = URL.createObjectURL(e.target.files[0]);
        }
    }




    //convertowanie rozmiaru pliku
    const sizeConvert = ("", (filesize) => {
        let i = 0;
        while (filesize / 1024 > 1) {
            filesize /= 1024;
            i++;
        }
        convertRasult(filesize, i);
    });
    //wyświetlanie rozmiaru pliku
    const convertRasult = ("", (filesize, i) => {
        const size = document.querySelector(".size");
        filesize.toFixed(2)
        switch (i) {
            default:
                console.log(filesize.toFixed(2) + " bytes");
                size.innerHTML = `Rozmiar pliku: ${filesize.toFixed(2)} bytes`;
                break;
            case 1:
                console.log(filesize.toFixed(2) + " kb");
                size.innerHTML = `Rozmiar pliku: ${filesize.toFixed(2)} kb`;
                break;
            case 2:
                console.log(filesize.toFixed(2) + " mb");
                size.innerHTML = `Rozmiar pliku: ${filesize.toFixed(2)} mb`;
                break;
            case 3:
                console.log(filesize.toFixed(2) + " gb");
                size.innerHTML = `Rozmiar pliku: ${filesize.toFixed(2)} gb`;
                break;
            case 4:
                console.log(filesize.toFixed(2) + " Tb");
                size.innerHTML = `Rozmiar pliku: ${filesize.toFixed(2)} tb`;
                break;
        }
    });
    //pobieranie nazwy i rozszerzenia pliku
    const formatCheck = ("", (e) => {
        var fullPath = document.querySelector(".addedfile").value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            let fullfilename = filename.substring(1);
            //szukanie wszystkich wystąpień "."
            let indices = [];
            let indicesLenght = 0;
            idx = fullfilename.indexOf(".")
            while (idx != -1) {
                indices.push(idx);
                idx = fullfilename.indexOf(".", idx + 1);
                indicesLenght++;
            }
            let lenght = fullfilename.lenght;
            let roz = fullfilename.substring(indices[indicesLenght - 1], lenght);
            console.log(indices);
            console.log(roz + " ROZ");
            // if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            //     filename = filename.substring(filename.indexOf('.'));
            //     console.log(filename);
            //     console.log(fullfilename);
            // }
            if (checkform(roz, e)) {
                // formatShow(roz);
                // fileNameShow(fullfilename);
                // sizeConvert(fileSize());

            }
        }
    });
    //sprawdzanie poprawności rozszerzenia pliku
    const checkform = ("", (roz, e) => {
        let imageform = [
            { form: ".jpg" },
            { form: ".png" },
            { form: ".jpeg" },
            { form: ".svg" },
        ];
        let musicform = [
            { form: ".mp3" },
            { form: ".acc" },
            { form: ".wma" },
            { form: ".wav" },
        ];
        let textform = [
            { form: ".txt" },
            { form: ".doc" },
            { form: ".docx" },
            { form: ".pdf" },
            // { form: ".odt" },
            // { form: ".wps" },
        ];
        
        let i = 0;
        while (i < 4) {
            if (setform.value === "Zdjęcia") {
                if (roz.toLowerCase() === imageform[i].form) {
                    addimg(e);
                    return true;//alert("Plik poprawny"),
                }
            }
            else if (setform.value === "Efekty") {
                if (roz.toLowerCase() === musicform[i].form) {
                    addimg(1);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Podkłady") {
                if (roz.toLowerCase() === musicform[i].form) {
                    addimg(1);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Słuchowiska") {
                if (roz.toLowerCase() === musicform[i].form) {
                    addimg(1);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Reportaże") {
                if (roz.toLowerCase() === musicform[i].form) {
                    addimg(1);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Felietony") {
                if (roz.toLowerCase() === textform[i].form) {
                    addimg(2);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Opowiadania") {
                if (roz.toLowerCase() === textform[i].form) {
                    addimg(2);
                    return true;//alert("Plik poprawny")
                }
            }
            else if (setform.value === "Poezja") {
                if (roz.toLowerCase() === textform[i].form) {
                    addimg(2);
                    return true;//alert("Plik poprawny")
                }
            }
            else {
                return alert("Złe rozszerzenie!");
            }
            i++;
        }
        if (i === 4) {
            return alert("Zły plik!");
        }
    });
    //wyświetlenie rozszerzenia pliku
    const formatShow = ("", (fileformat) => {
        const format = document.querySelector(".format");
        format.innerHTML = `Rozszerzenie pliku: ${fileformat}`;
        //console.log(filename);
    });
    //wyświetlenie pełnej nazwy pliku
    const fileNameShow = ("", (filename) => {
        const FileName = document.querySelector(".filename");
        FileName.innerHTML = `Nazwa pliku: ${filename}`;
        console.log(filename);
    });
}