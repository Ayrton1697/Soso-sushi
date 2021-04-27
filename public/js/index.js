gsap.registerPlugin(ScrollTrigger);

let sections = gsap.utils.toArray('.menu__item');

gsap.to(sections,{
  xPercent: -100 *(sections.length -1 ),
  ease: "none",
  scrollTrigger:{
    trigger: ".menu",
    pin: true,
    scrub: 1,
    snap :1/(sections.length -1),
    end: "+=4000"
     
    }
   


});

