//Ẩn, hiện chat

$("#icon_chat").click(function(){
  ShowHideChat();
});
$(".glyphicon-minus-sign").click(function(){
  ShowHideChat();
});
  $(".glyphicon-remove").click(function CloseChat(){
    var r = confirm("Bạn có muốn tắt chat trực tuyến?");
      if (r == true) {
        $(".nd").css("display","none");
      } 
  });
function ShowHideChat(){

  $(".nd").fadeToggle(400,"swing");
  $("#icon_chat").fadeToggle(400,"swing");

}
