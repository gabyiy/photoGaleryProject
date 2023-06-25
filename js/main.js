jQuery(document).ready(function(){
"use strict";

    $(".rotate").textrotator({
        animation: "flip", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",", // If you don't want commas to be the separator, you can define a new separator (|, &, * etc.) by yourself using this field.
        speed: 2000 // How many milliseconds until the next word show.
      });

$(window).scroll(function(){

  var top =$(window).scrollTop();
  if(top>=70){
    $("header").addClass("transparent-bg");
  }else{
    if($("header").hasClass("transparent-bg")){
  $("header").removeClass("transparent-bg");
    }
  }
})


// aici avem o functie pentru a vedea de ce tip este imaginea din upload_Avatar

$("#user-avatar-upload").on("change",function(){

  var avatarFile = $(this)[0].files[0];

  var type =avatarFile.type;
 // alert (type);
  //asa specificam ca dorim sa selectionam toate caracterele dupa /
  var type1= type.substring(type.indexOf("/")+1);
 // alert(type1);
  var size = avatarFile.size;

  if (type1 !="png" && type1!="jpg"&&  type1!="jpeg"){
    alert ("file type is no suported");
  }else if (size >5000000){
    alert ("file should be less then 500kb");
  }

  //si daca totu est ok incercam sa uploadam poza de avatar
  else {
//creem o instanta formData
    var formData = new FormData();
    //aici facem un append pentru a  urca imaginea care este avatarFile si la inceput ii adaugam denumirea de avatar
    formData.append("avatar",avatarFile);

    //creem un http req
    var xhr =new XMLHttpRequest();
//adaugam un eventListner on load si dupa utilizam functia care o sa uploadeze
    xhr.addEventListener("load",avatarloadhandler,false);
    //iar aici cu post facem un requeste la avatarChange
    xhr.open("POST","avatarchange.php");
    //si aici trimitem data 
    xhr.send(formData)

    //iar aici creem functia care o sa uploadeze in src ce primim in echo de la avatarchange

    function avatarloadhandler(evt){
     $('#avatar-image-id').attr("src",evt.target.responseText); 
    }
  }
});



//folosim in mare acceasi prcedura pentru ca userul poate uploada imagini

$("#new-image").on("change",function(){

  var file = $(this)[0].files[0];

  var type =file.type;
  //alert (type);
  //asa specificam ca dorim sa selectionam toate caracterele dupa /
  var type1= type.substring(type.indexOf("/")+1);
 // alert(type1);
  var size = file.size;

  if (type1 !="png" && type1!="jpg"&&  type1!="jpeg"){
    alert ("file type is no suported");
  }else if (size >5000000){
    alert ("file should be less then 500kb");
  }

  //si daca totu est ok incercam sa uploadam poza de avatar
  else {
//creem o instanta formData
    var formData = new FormData();
    //aici facem un append pentru a  urca imaginea care este avatarFile si la inceput ii adaugam denumirea de avatar
    formData.append("file1",file);

    //creem un http req
    var xhr =new XMLHttpRequest();
//adaugam un eventListner on load si dupa utilizam functia care o sa uploadeze
    xhr.addEventListener("load",loadhandler,false);
    //iar aici cu post facem un requeste la file-upload
    xhr.open("POST","fileupload.php");
    //si aici trimitem data 
    xhr.send(formData)

    //iar aici creem functia care o sa uploadeze in src ce primim in echo de la avatarchange

    function loadhandler(evt){
    alert  (evt.target.responseText); 

    }
  }
});



});

