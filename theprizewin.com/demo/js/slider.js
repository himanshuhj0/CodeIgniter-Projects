function startSlide() {
setTimeout(
function() 
  {
    $("#img1").fadeIn(900).delay(4000).fadeOut(900, function () {
		$("#img2").fadeIn(900).delay(4000).fadeOut(900, function () {
			$("#img3").fadeIn(900).delay(4000).fadeOut(900, startSlide());
		});
		});
}, 6000);
}
$(document).ready(function(e) {startSlide();});