
  
function av(){ 
      document.getElementsByClassName("av").style.visibility= "hidden";
      document.getElementsByClassName("på").style.visibility= "visible";
   
} 
    
function på(){
      document.getElementsByClassName("på").style.visibility= "hidden";
      document.getElementsByClassName("av").style.visibility= "visible";
}

function timer(){
      var checkBox = document.getElementById("time");

      if(checkBox.checked == true){
            document.getElementById("start").style.display= "block";
            document.getElementById("slut").style.display= "block";
            document.getElementById("tidSett").style.display= "block";
      }

      else{
            document.getElementById("start").style.display = "none";
            document.getElementById("slut").style.display = "none";
            document.getElementById("tidSett").style.display = "none";
      }
      
}