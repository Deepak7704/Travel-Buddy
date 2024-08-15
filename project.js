//responsive navigation menu
const menubtn=document.querySelector(".menu-btn");
const navigation=document.querySelector(".navigation");
menubtn.addEventListener("click",()=>{
    menubtn.classList.toggle("active");
    navigation.classList.toggle("active");
});
//video-slide
const btns=document.querySelectorAll(".nav-btn");
const slides=document.querySelectorAll(".video-slide");
const contents=document.querySelectorAll(".content");

var slidernav=function(manual){
    btns.forEach((btn)=>{
        btn.classList.remove("active");
    });
    slides.forEach((slide)=>{
        slide.classList.remove("active");
    });
    contents.forEach((content)=>{
        content.classList.remove("active");
    });
    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");

}
btns.forEach((btn,i)=>{
    btn.addEventListener("click",()=>{
        slidernav(i);//all buttons will be activated
    });
});
//scroll animation
