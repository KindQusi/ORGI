const category=document.querySelector(".category");
console.log(category.value);

const browserBody=document.querySelector(".body__Browser");
console.log(browserBody);
if(category.value==="Zdjęcia"){
browserBody.style.backgroundImage = `url("../Photos/fotoBG.png")`;
}
// else if((category.value==="Zdjęcia")||(category.value==="Zdjęcia")||(category.value==="Zdjęcia")){

// }
else{
    browserBody.style.backgroundImage = `url("../Photos/musicBG.png")`;
}