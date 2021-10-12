const downloadbtns=document.querySelectorAll(".download");


downloadbtns.forEach((button,index)=>{
  button.addEventListener("click", function() {
    let setid=0;
    let setcategory="";
    const id=document.querySelectorAll(`.id`);
    const category=document.querySelectorAll(`.category`);

    console.log("You clicked button number " + index);
    console.log("You clicked button with class " + this.className);
    console.log("You clicked button with text " + this.innerText);


    console.log(id[index].value);
    console.log(category[index].value);
    $.ajax({
      url: '../SCRIPS/UpdateDownloadCounter.php',
      type: 'post',
      id: { "callFunc1": id[index].value },
      category:{"callFunc2": category[index].value },
      success: function (response) {
          console.log(response);
      }
    })
  })
})