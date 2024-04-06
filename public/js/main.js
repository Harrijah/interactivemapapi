$(document).ready(function() {


let menumobile02 = document.getElementById("menumobile02");
let mobilemenulist = document.getElementById("menumobile03");




menumobile02.onclick = function(e){
  if(e){

    if(mobilemenulist.style.display == 'none'){
      mobilemenulist.style.display = "block";
    }else{
      
      mobilemenulist.style.display = "none";
    }
  };
}




});





