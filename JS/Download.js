const downloadbtns=document.querySelectorAll(".download");


downloadbtns.forEach((button,index)=>{
  button.addEventListener("click", function() {
    const id=document.querySelector(`.id${index}`);
    const category=document.querySelector(`.category${index}`);

    console.log("You clicked button number " + index);
    console.log("You clicked button with class " + this.className);
    console.log("You clicked button with text " + this.innerText);


    console.log(id);
    console.log(category);
    $.ajax({
      url: '../SCRIPS/UpdateDownloadCounter.php',
      type: 'post',
      data: { "callFunc1": `${button.id}` },
      success: function (response) {
          console.log(response);
      }
    })
  })
})