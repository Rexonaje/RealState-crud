 document.addEventListener('DOMContentLoaded',function(){
    eventListeners();
    darkMode();
 });


 function darkMode(){
    const prefersDarkMode=window.matchMedia('(prefers-color-scheme:dark)');
    if(prefersDarkMode.matches){
        document.body.classList.add("dark-mode");
    }
    else{
        document.body.classList.remove("dark-mode"); 

    }
    prefersDarkMode.addEventListener('change',()=>{
        if(prefersDarkMode.matches){
            document.body.classList.add("dark-mode");
        }
        else{
            document.body.classList.remove("dark-mode");
    
        } 
    });
    const darkMode=document.querySelector('.dark-mode-btn');
    darkMode.addEventListener("click",function(){
        document.body.classList.toggle("dark-mode");
    });

  
};
 function eventListeners(){
    const mobileMenu=document.querySelector(".mobile-menu")

    mobileMenu.addEventListener("click",navegacionResponsive);   
};
function navegacionResponsive(){
    //console.log("desde navres")
    const nav=document.querySelector(".navegacion");
        nav.classList.toggle('mostrar');
     
};