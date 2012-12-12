// remap jQuery to $
(function($){})(window.jQuery);

jQuery.extend( jQuery.easing,{
	easeOutElastic: function (x, t, b, c, d) {
		var s=1.70158;var p=0;var a=c;
		if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
		if (a < Math.abs(c)) { a=c; var s=p/4; }
		else var s = p/(2*Math.PI) * Math.asin (c/a);
		return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
	}
});
/* trigger when page is ready */
$(document).ready(function (){
	var blocks = $('.content article.half');
	
	var content = $('.article-content');
	content.each(function(i){
		$(this).slideDown(500+i*100);
	});
	$('.social-icons div').hide();
	$('.social-icons div').each(function(i){
		$(this).fadeIn(500+i*100);
	});
	
	content.promise().done(function(){
		var maxH = 0;
		blocks.each(function(){
			if($(this).height()>maxH){
				maxH = $(this).height();
			}
		});
		blocks.each(function(){
			$(this).height(maxH);
		});
	});
	/*
	$('nav li a').click(function(){
		$('html, body').animate({
			scrollTop: $($(this).attr('href')).offset().top-50
		}, 1000, 'easeOutElastic');
	
	});
*/

});

