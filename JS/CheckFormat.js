{


    //główna część
    const newfile = document.querySelector(".addedfile");
    const addtagsbtn = document.querySelector(".addtagsbtn");
    const fileSize = ("", () => {
        var fileSize = document.getElementById('file').files[0].size;
        return fileSize;
    });
    newfile.addEventListener("change", (e) => {
        formatCheck(e);
    });


    let tagstable = [];
    addtagsbtn.addEventListener("click", () => {
        const newTag = document.querySelector(".addtags").value;
        if (newTag === "") {
            document.querySelector(".addtags").focus();
            return;
        }
        AddNewTag(newTag);
        document.querySelector(".addtags").value = null;
    });
    const Render = () => {
        let htmlString = "";
        for (const tag of tagstable) {
            htmlString += `<li class="tagitem"><p class="tag"}>${tag.content}</p><button class="js-remove">x</button></li>`;
        }
        document.querySelector(".tagslist").innerHTML = htmlString;

        const removeButtons = document.querySelectorAll(".js-remove");
        removeButtons.forEach((removeButton, index) => {
            removeButton.addEventListener("click", () => {
                tagstable.splice(index, 1);
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
        image.src = URL.createObjectURL(e.target.files[0]);
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
            if (checkform(roz)) {
                // formatShow(roz);
                // fileNameShow(fullfilename);
                // sizeConvert(fileSize());
                addimg(e);
            }
        }
    });
    //sprawdzanie poprawności rozszerzenia pliku
    const checkform = ("", (roz) => {
        let setform = document.querySelector(".formtype");
        let imageform = [
            { form: ".jpg" },
            { form: ".png" },
            { form: ".jpeg" },
        ];
        let movieform = [
            { form: ".mp4" },
            { form: ".avi" },
            { form: ".flv" },
        ];
        let i = 0;
        while (i < 2) {
            if (setform.value === "Zdjęcia") {
                if (roz.toLowerCase() === imageform[i].form) {
                    return alert("Plik poprawny"), true;

                }
                i++;
            }
            else if (setform.value === "Filmy") {
                if (roz.toLowerCase() === movieform[i].form) {
                    return alert("Plik poprawny");
                }
                i++;
            }
            else {
                return alert("Złe rozszerzenie!");
            }
        }
        if (i === 2) {
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