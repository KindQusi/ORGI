const downloadbtns=document.querySelectorAll(".downloadFile");
const submit_form=document.querySelectorAll(".main__ItemsWindow--itemBox");

downloadbtns.forEach(function(button,index){
  button.addEventListener("click", function() {
    console.log(downloadbtns);
    console.log(button);
    console.log(submit_form);
    console.log(index);
    console.log(submit_form[index]+" Formularz wysłany");
    submit_form[index].submit();
  })
})