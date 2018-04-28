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

      let previous = "#" + $(".dot-active").attr("id");
      $(previous).removeClass("dot-active");
      $(previous).addClass("dot");

      switch (id){
          case "home":
              $("#dot-1").addClass("dot-active");
              $("#dot-1").removeClass("dot");
              break;
          case "about":
              $("#dot-2").addClass("dot-active");
              $("#dot-2").removeClass("dot");
              break;
          case "gallery":
              $("#dot-3").addClass("dot-active");
              $("#dot-3").removeClass("dot");
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