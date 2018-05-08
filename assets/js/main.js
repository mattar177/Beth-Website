"Use Strict";

$(document).ready(function(){

  if(document.documentElement.scrollTop > 3){
    $("#logo").css({
      "margin-top": ".8em",
      "margin-bottom": "-2.5em"
    });
  }

  setActiveState();
  
  $(window).scroll(function(){
    setActiveState();
  });
});


function setActiveState(){

  let $sections = $('.card');
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
        break;
      case "contact":
        navBtns[3].classList.add("nav-current");
    }  
  });
}


function gotoHome() {

  $("html, body").animate({
    scrollTop: 0
  }, 500);

}


function gotoAbout() {

  if(document.documentElement.scrollTop < 5){
    $("html, body").scrollTop(3);
  }

  setTimeout(function(){
    let headerHeight = document.getElementsByTagName("header")[0].offsetHeight;
    //let position = $("#about").offset().top - ((document.documentElement.clientHeight - $("#about").height()) / 2);
    let position = $("#about").offset().top - headerHeight;
    //$(window).scrollTop(position);
    $("html, body").animate({
      scrollTop: position
    }, 500);
  }, 110);

}


function gotoGallery() {

  if(document.documentElement.scrollTop < 5){
    $("html, body").scrollTop(3);
  }

  setTimeout(function(){
    let headerHeight = document.getElementsByTagName("header")[0].offsetHeight;
    //let position = $("#about").offset().top - ((document.documentElement.clientHeight - $("#about").height()) / 2);
    let position = $("#gallery").offset().top - headerHeight;
    //$(window).scrollTop(position);
    $("html, body").animate({
      scrollTop: position
    }, 500);
  }, 100);

}


function gotoContact() {

  if(document.documentElement.scrollTop < 5){
    $("html, body").scrollTop(3);
  }

  setTimeout(function(){
    let headerHeight = document.getElementsByTagName("header")[0].offsetHeight;
    //let position = $("#about").offset().top - ((document.documentElement.clientHeight - $("#about").height()) / 2);
    let position = $("#contact").offset().top - headerHeight;
    //$(window).scrollTop(position);
    $("html, body").animate({
      scrollTop: position
    }, 500);
  }, 100);

}


document.addEventListener("scroll", function(){

  if(document.documentElement.scrollTop > 2){
    $("#logo").stop(true).animate({
      //"width": "5%",
      //"margin-left": "46.5%",
      "margin-top": ".8em",
      "margin-bottom": "-2.5em"
    }, 100);
    //document.getElementById("header").style.boxShadow = "0 5px 15px #aaaaaa";
  }else if(document.documentElement.scrollTop <= 2){
    $("#logo").stop(true).animate({
      //"width": "8%",
      //"margin-left": "45%",
      "margin-top": "2em",
      "margin-bottom": ".5em"
    }, 100);
    //document.getElementById("header").style.boxShadow = "none";
  }
});


document.getElementById("hamburger-menu").addEventListener("click", function(){

  switch (this.classList[0]){
    case "play":
      this.classList.toggle('reverse');
      this.classList.toggle('play');
      break;
    case "reverse":
      this.classList.toggle('play');
      this.classList.toggle('reverse');
      break;
    default:
      this.classList.toggle('play');
  }

});


function openModal(img){
  document.getElementById("modal").style.display = "block";
  document.getElementById("modal-img").src = img.src;
  document.getElementById("caption").innerHTML = img.alt;
}


function closeModal(){
  document.getElementById("modal").style.display = "none";
}