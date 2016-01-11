yf.define('backend.form.group.Seo')
.as(function(yf)
{
	this.init = function($el)
	{
		var source = $el.data('source');
		var prefix = $el.data('prefix');
		
		var source = $el.closest('form').find('input[name='+source+']');
		if(source !== null){
			
			var titleField = $el.find('input[name='+prefix+'title]');
			var descriptionField = $el.find('textarea[name='+prefix+'description]');
			var keywordsField = $el.find('input[name='+prefix+'keywords]');
			
			var syncTitle = false;
			var syncDescription = false;
			var syncKeywords = false;
		
			// add autofill functionality
			source.focus(function(){
				
				// get alias
				var title = $(this).val();
				var description = $(this).val();
				var keywords = parse_keywords($(this).val());
				
				// if the alias is the same as the title, or the alias is blank, it's ok to sync
				if( title == titleField.val() || titleField.val() ==''){
					syncTitle = true;
				} else {
					syncTitle = false;
				}
				
				// if the alias is the same as the title, or the alias is blank, it's ok to sync
				if( description == descriptionField.val() || descriptionField.val() ==''){
					syncDescription = true;
				} else {
					syncDescription = false;
				}
				
				// if the alias is the same as the title, or the alias is blank, it's ok to sync
				if( keywords == keywordsField.val() || keywordsField.val() ==''){
					syncKeywords = true;
				} else {
					syncKeywords = false;
				}
			}).focus();
			
			
			source.change(function(){
				
				// get alias
				var title = $(this).val();
				var description = $(this).val();
				var keywords = parse_keywords($(this).val());
				
				if(syncTitle == true){
					titleField.val(title);
				}
						
				if(syncDescription == true){
					descriptionField.val(description);
				}
						
				if(syncKeywords == true){
					keywordsField.val(keywords);
				}
			});
		}
	}
	
	
	var parse_keywords = function(input)
	{
		var split = input.split(" ");
		var filtered = [];
		for(var i=0;i<split.length;i++){
			if(split[i].length > 3){
				filtered.push(split[i]);
			}
		}
		var output = filtered.join(',');
		return output;
	}
});

