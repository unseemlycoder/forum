(function(){
 
    var preload = document.getElementById("preload");
    var loading = 0;
    var id = setInterval(frame, 64);
   
    function frame(){
     if(loading == 100) {
      clearInterval(id);
      window.open("http://localhost/discussionforum/index.php", "_self");
     }
     else {
      loading = loading + 1;
      if(loading == 86) {
       preload.style.animation = "fadeout 1s ease";
      }
     }
    }
   
   
   })();
   
   