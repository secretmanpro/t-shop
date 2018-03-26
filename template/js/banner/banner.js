$('#demo').skdslider();

$('#demo').skdslider({animationType:'sliding'});
$('#demo').skdslider({

  // Delay duration between two slides in ms.
  'delay': 2000,

  // <a href="https://www.jqueryscript.net/animation/">Animation</a> speed
  'animationSpeed': 500,

  // show/hide navigation icon
  'showNav': true,

  // Automatically start slideshow
  'autoSlide': true,

  // show/hide next/prev buttons
  'showNextPrev': false,

  // Pause sliding on mouse hover
  'pauseOnHover': false,

  // If true, navigation will be numeric
  'numericNav': false,

  // If this properties is set, sliding will automatically stop at the specified slide
  'stopSlidingAfter': false,

  // show/hide play button
  'showPlayButton': false,

  // 'fading' or 'sliding'
  'animationType': 'fading' /* fading/sliding */
  
});