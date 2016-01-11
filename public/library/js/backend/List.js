yf.define('backend.List')
.as({
	show:function($el){
		$el.hide();
		$el.closest('.yf-show-hide').find('.yf-hide').show();
		this.yf.$.ajax($el.attr('href'));
	},
	hide:function($el){
		$el.hide();
		$el.closest('.yf-show-hide').find('.yf-show').show();
		this.yf.$.ajax($el.attr('href'));
	},
	remove:function($el){
		$el.closest('.yf-list-item').remove();
		this.yf.$.ajax($el.attr('href'));
	},
	use:function($el){
		var data = $el.data('item');
		var callback = $el.data('callback_id');
		this.yf.outer().backend.Callback.call(callback,data);
	}
});