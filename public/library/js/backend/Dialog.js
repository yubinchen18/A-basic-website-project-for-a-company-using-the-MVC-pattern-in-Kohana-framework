yf.define('backend.Dialog')
.set({
	/**
	* open a dialog with only an ok button
	*/
	alert: function(message,title,callback,settings)
	{
		// shortcuts
		var yf = this.yf;
		var $ = yf.$;
		
		
		var settings = settings || {};

		// create dialog element
		var dialog = yf.View.make(yf.template('dialog-alert')).render({message:message});
		
		// set the action
		$('.yf-btn',dialog).click(function(){
			dialog.dialog('close');
			if(callback != null){
				callback();
			}
		});
		
		var title = title==null || title=='' ? '' : title;
		var width = settings.width != null ? settings.width : 300;
		var height = settings.height != null ? settings.height : 'auto';
		
		// open the dialog
		dialog.dialog({
			title:title,
			width:width,
			height:height,
			closeText:'&times;',
			modal:true
		});
		return dialog;
	},


	/**
	* open a dialog with an ok and cancel button
	*/
	confirm: function(question,title,callback,settings)
	{		
		// shortcuts
		var yf = this.yf;
		var $ = yf.$;
		
		var settings = settings || {};
		
		// create dialog element
		var dialog = yf.View.make(yf.template('dialog-confirm')).render({question:question});
		
		// set the action
		$(".yf-btn-confirm",dialog).click(function(){
			dialog.dialog('close');
			if(callback != null){
				callback();
			}
		});
		
		$('.yf-btn-cancel',dialog).bind('click',function(){
			dialog.dialog('close');
			return false;
		});
		
		var title = title==null || title=='' ? '' : title;
		var width = settings.width != null ? settings.width : 350;
		var height = settings.height != null ? settings.height : 'auto';

		// open the dialog
		dialog.dialog({
			title:title,
			width:width,
			height:height,
			closeText:'&times;',
			modal:false,
			closeOnEscape:true
		});
		return dialog;
	},




	/**
	* open a dialog with an iframe
	*/
	application : function(src,title,settings)
	{
		// shortcuts
		var yf = this.yf;
		var $ = yf.$;
		
		var settings = settings || {};
		
		// create dialog element
		var dialog = yf.View.make(yf.template('dialog-application')).render({
			src:src,
			name:'dialog_'+Math.random()
		});
		

		// close button
		$('.yf-btn-close',dialog).bind("click",function(){
			dialog.dialog('close');
			return false;
		});
		

		var title = title==null || title=='' ? '' : title;
		var width = settings.width != null ? settings.width : 900;
		var height = settings.height != null ? settings.height : 'auto';
		
		// prevent height bigger than screen
		if(height === 'auto' || height > $(window).height() - 40){
			height = $(window).height() - 40;
		}
		// open the dialog
		dialog.dialog({
			title:title,
			width:width,
			height:height,
			closeText:'close',
			modal:true,
			closeOnEscape:false,
			dialogClass: 'dialog-application',
			close:function(){
				dialog.remove();
			}
		});
		
		// if there is post data, post it to the iframe
		if(settings.post != null){
			var form = $('<form style="display:none" action="'+src+'" method="POST" target="'+name+'"></form>');
			for(var key in settings.post){
				form.append($('<textarea name="'+key+'">'+settings.post[key]+'</textarea>'));
			}
			form.appendTo('body');
			form.submit();
			form.remove();
		} 
		return dialog;
	}
})
.as(function(yf)
{
	this.init = function($el)
	{
		
		var settings = $el.data('settings');
		var data = settings.data != null ? settings.data : null;
		var callback = settings.callback != null ? settings.callback : '';
		var remove = settings.remove != null ? settings.remove : true;
		
		// call callback on parent document
		yf.outer().backend.Callback.call(callback,data,remove);
	}
});