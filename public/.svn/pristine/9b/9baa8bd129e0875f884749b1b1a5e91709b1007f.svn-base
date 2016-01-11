yf.define('Edit')
.as(function(yf)
{
	this.init = function($el)
	{
		if(param('edit') !== false){
			//  edit links
			$('a').each(function(){
				var href = $(this).attr('href');
				if(href != null && href != '' && href != '#'){
					var glue = '?'
					if(href.indexOf('?') > -1){
						glue = '&';
					} 
					$(this).attr('href',href+glue+'edit')
				}
			});
			
			var url = $el.data('url');
			yf.$.ajax(
				$el.data('url'),
				{
					dataType : 'html',
					type : 'POST',
					data : {
						controller:$el.data('controller'),
						id:$el.data('id')
					}
				}
			).done(function(data){
					if(data !== ''){
						$el.append(data);
					}
			});
		}
	}

	var param = function(name) 
	{
		var regex = new RegExp("[\\?&]" + name + "([^=&#]*)");
		var results = regex.exec(document.location.search);
		return results == null ? false : decodeURIComponent(results[1].replace(/\+/g, " "));
	}
});
