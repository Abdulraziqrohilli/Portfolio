/*===== start of typing speed=====*/
var typed = new Typed('.name', {
    strings: ["Graphic Designer.","Web Designer.","Web Developer.","freelancer."],
    typeSpeed: 100,
    backspeed:100,
    backDelay:900,
    loop:true
  });
/*===== end of typing speed=====*/



x=document.getElementsByClassName(".sidbar span").addEventListener('click',active);
console.log(x)

function active(){
  document.querySelectorAll("a span").parent("li").className="active"
  this.querySelectorAll("a span").removeClass="active"
}

function lightGallery() {
  $('.st-lightgallery').each(function () {
    $(this).lightGallery({
      selector: '.st-lightbox-item',
      subHtmlSelectorRelative: false,
      thumbnail: false,
      mousewheel: true
    });
  });
}



/*
$( "span" ).hover(function() {
  $(this).parent("a").addClass("hover");
}, function() {
  $("a span").removeClass("hover");
});
*/