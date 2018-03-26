//Zoom hình sẽ phóng to và hiện bên ngoài
// $("#demo").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'}); 

//Zoom hình sẽ phóng to vào bên trong luôn
$("#zoomdemo").elevateZoom({constrainType:"height", constrainSize:320, zoomType: "lens", containLensZoom: true, gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: "active"});
//pass the images to Fancybox
$("#zoomdemo").bind("click", function(e) {  
  var ez =   $('#zoomdemo').data('elevateZoom'); 
  $.fancybox(ez.getGalleryList());
  return false;
});