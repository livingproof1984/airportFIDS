$(document).ready(function(){
 $("#bRnd").click(function(){
  $("#rnd").slideDown();
  $("#cat").slideUp();
  $("#date").slideUp();
  $("#tag").slideUp();
  $(this).addClass("bActive");
  $("#bCat").removeClass("bActive");
  $("#bDate").removeClass("bActive");
  $("#bTag").removeClass("bActive");
 });
 $("#bCat").click(function(){
  $("#rnd").slideUp();
  $("#cat").slideDown();
  $("#date").slideUp();
  $("#tag").slideUp();
  $(this).addClass("bActive");
  $("#bDate").removeClass("bActive");
  $("#bRnd").removeClass("bActive");
  $("#bTag").removeClass("bActive");
 });
 $("#bDate").click(function(){
  $("#rnd").slideUp();
  $("#cat").slideUp();
  $("#date").slideDown();
  $("#tag").slideUp();
  $(this).addClass("bActive");
  $("#bCat").removeClass("bActive");
  $("#bRnd").removeClass("bActive");
  $("#bTag").removeClass("bActive");
 });
 $("#bTag").click(function(){
  $("#rnd").slideUp();
  $("#cat").slideUp();
  $("#date").slideUp();
  $("#tag").slideDown();
  $(this).addClass("bActive");
  $("#bCat").removeClass("bActive");
  $("#bRnd").removeClass("bActive");
  $("#bDate").removeClass("bActive");
 });
});