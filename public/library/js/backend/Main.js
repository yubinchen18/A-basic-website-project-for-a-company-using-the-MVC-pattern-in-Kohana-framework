yf.define('backend.Main')
.use('backend.Anchor')
.use('backend.Dialog')
.use('backend.Callback')
.as(function(yf){
	this.init = function()
	{		
		var btn = yf.$.fn.button.noConflict() // reverts $.fn.button to jqueryui btn
		yf.$.fn.btn = btn // assigns bootstrap button functionality to $.fn.btn
		
		// move content down depending on navigation height
		$('.yf-content').css('paddingTop',$('.yf-navigation').height()+10+'px');
		
		// init anchors
		yf.backend.Anchor.init(yf);
	};
});