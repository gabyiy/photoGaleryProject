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
  else {
    //asa uploadam o poza avatar
    var formData = new FormData();
    formData.append("avatar",avatarFile);
    var xhr =new XMLHttpRequest();
    xhr.addEventListener("load",avatarloadhandler,false);
    //iar aici cu post trimitem data la avatarhange.php
    xhr.open("POST","avatarchange.php");
    xhr.send(formData)

    //iar aici creem functia care o sa uploadeze

    function avatarloadhandler(evt){
alert(evt.target.responseText);
    }
  }
});


});

