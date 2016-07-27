// Parallax
$(window).scroll(function(){
	var scroll_position = $(this).scrollTop();

	$('#carousel .content').css({'transform':'translate(0px, '+scroll_position / 3+'%)'});
	$('#carousel .content').css({'opacity': ''+(1-(scroll_position*.002))+''});
	//console.log(1-(scroll_position*.001));
});