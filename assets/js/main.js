"Use Strict";

$(document).ready(function(){

  let $sections = $('.card');
  
  $(window).scroll(function(){
    
    let currentScroll = $(this).scrollTop();
    let $currentSection;
    
    $sections.each(function(){
    
      let divPosition = $(this).offset().top;
      
      if( (divPosition - (document.documentElement.clientHeight / 2)) < currentScroll ){
        
        $currentSection = $(this);
        
      }
      
      let id = $currentSection.attr("id");
      $(".card").removeClass("active");
      $("#" + id).addClass("active");

      let previous = document.documentElement.getElementsByClassName("nav-current");
      for(let i = 0; i < previous.length; i++){
        previous[i].classList.remove("nav-current");
      }
    
      let navBtns = document.documentElement.getElementsByClassName("nav-btn");

      switch (id){
        case "home":
          navBtns[0].classList.add("nav-current");
          break;
        case "about":
          navBtns[1].classList.add("nav-current");
          break;
        case "gallery":
          navBtns[2].classList.add("nav-current");
      }  
    })
  });
});



function gotoHome() {

  $("html, body").animate({
    scrollTop: 0
  }, 500);

}


function gotoAbout() {

  let position = $("#about").offset().top - ((document.documentElement.clientHeight - $("#about").height()) / 2);
  //$(window).scrollTop(position);
  $("html, body").animate({
    scrollTop: position
  }, 500);

}


function gotoGallery() {

  let position = $("#gallery").offset().top;
  $("html, body").animate({
    scrollTop: position
  }, 500);

}


document.addEventListener("scroll", function(){

  if(document.documentElement.scrollTop > 2 && document.getElementById("logo").style.marginTop == "2em"){
    $("#logo").stop(true).animate({
      //"width": "5%",
      //"margin-left": "46.5%",
      "margin-top": ".8em",
      "margin-bottom": "-2.5em"
    }, 150);
    //document.getElementById("header").style.boxShadow = "0 5px 15px #aaaaaa";
  }else if(document.documentElement.scrollTop <= 2){
    $("#logo").stop(true).animate({
      //"width": "8%",
      //"margin-left": "45%",
      "margin-top": "2em",
      "margin-bottom": ".5em"
    }, 150);
    //document.getElementById("header").style.boxShadow = "none";
  }
});
